<?php

session_start();

require_once("includes/conecta.php");

header("Content-Type: application/json; charset=utf-8");

class PedidoInvalido extends Exception {}

function responde($ok, $dados = [], $status = 200) {
    http_response_code($status);
    echo json_encode(array_merge(["ok" => $ok], $dados), JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    responde(false, ["erro" => "Método inválido."], 405);
}

// ===== Só usuários logados podem fazer pedido =====

if (!isset($_SESSION["id_usuario"])) {
    responde(false, ["erro" => "Faça login para finalizar o pedido."], 401);
}

$usuarioId = (int) $_SESSION["id_usuario"];

// A conta pode ter sido excluída enquanto a sessão ainda estava aberta
$stmt = mysqli_prepare($conn, "SELECT id FROM usuarios WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $usuarioId);
mysqli_stmt_execute($stmt);

$contaExiste = mysqli_num_rows(mysqli_stmt_get_result($stmt)) > 0;

mysqli_stmt_close($stmt);

if (!$contaExiste) {
    session_destroy();
    responde(false, ["erro" => "Sua sessão expirou. Entre novamente."], 401);
}

// O JS envia JSON
$dados = json_decode(file_get_contents("php://input"), true);

if (!is_array($dados)) {
    responde(false, ["erro" => "Pedido inválido."], 400);
}

$tipoEntrega = $dados["tipoEntrega"] ?? "";
$pagamento   = trim((string) ($dados["pagamento"] ?? ""));
$itens       = $dados["itens"] ?? [];

// ===== Validações (nunca confie só no que o navegador validou) =====

if (!in_array($tipoEntrega, ["entrega", "retirada"], true)) {
    responde(false, ["erro" => "Tipo de entrega inválido."], 400);
}

// Mesmas opções do <select id="formaPagamento"> do index.php
$formasValidas = ["PIX", "Dinheiro", "Cartão de Débito", "Cartão de Crédito"];

if (!in_array($pagamento, $formasValidas, true)) {
    responde(false, ["erro" => "Forma de pagamento inválida."], 400);
}

if (!is_array($itens) || count($itens) < 1 || count($itens) > 50) {
    responde(false, ["erro" => "Adicione pelo menos um produto ao pedido."], 400);
}

$rua = $numero = $bairro = $cidade = null;

if ($tipoEntrega === "entrega") {

    $rua    = trim((string) ($dados["rua"] ?? ""));
    $numero = trim((string) ($dados["numero"] ?? ""));
    $bairro = trim((string) ($dados["bairro"] ?? ""));
    $cidade = trim((string) ($dados["cidade"] ?? ""));

    if ($rua === "" || $numero === "" || $bairro === "" || $cidade === "") {
        responde(false, ["erro" => "Preencha todos os campos do endereço de entrega."], 400);
    }

    if (mb_strlen($rua) > 100 || mb_strlen($numero) > 10 ||
        mb_strlen($bairro) > 80 || mb_strlen($cidade) > 80) {
        responde(false, ["erro" => "Algum campo do endereço está muito longo."], 400);
    }
}

// ===== Grava tudo ou nada (transação) =====

try {

    mysqli_begin_transaction($conn);

    $sql = "INSERT INTO pedidos
                (usuario_id, tipo_entrega, forma_pagamento, rua, numero, bairro, cidade)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt, "issssss",
        $usuarioId, $tipoEntrega, $pagamento, $rua, $numero, $bairro, $cidade
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $pedidoId = mysqli_insert_id($conn);

    // Statements reutilizados para cada item
    $busca = mysqli_prepare($conn, "SELECT id, nome FROM produtos WHERE nome = ? AND ativo = 1 LIMIT 1");
    mysqli_stmt_bind_param($busca, "s", $nomeBusca);

    $insere = mysqli_prepare(
        $conn,
        "INSERT INTO pedido_itens (pedido_id, produto_id, produto_nome, quantidade) VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($insere, "iisi", $pedidoId, $produtoId, $produtoNome, $quantidade);

    foreach ($itens as $item) {

        $nomeBusca = trim((string) ($item["nome"] ?? ""));
        $quantidade = filter_var($item["quantidade"] ?? null, FILTER_VALIDATE_INT);

        if ($nomeBusca === "" || $quantidade === false || $quantidade < 1 || $quantidade > 99) {
            throw new PedidoInvalido("Há um item inválido no pedido.");
        }

        mysqli_stmt_execute($busca);
        $produto = mysqli_fetch_assoc(mysqli_stmt_get_result($busca));

        // Produto apagado ou desativado enquanto o cliente montava o pedido
        if (!$produto) {
            throw new PedidoInvalido(
                "O produto \"" . $nomeBusca . "\" não está mais disponível. Atualize a página e tente de novo."
            );
        }

        $produtoId = (int) $produto["id"];
        $produtoNome = $produto["nome"];   // nome oficial do banco

        mysqli_stmt_execute($insere);
    }

    mysqli_stmt_close($busca);
    mysqli_stmt_close($insere);

    mysqli_commit($conn);

    responde(true, ["id" => $pedidoId]);

} catch (PedidoInvalido $e) {

    mysqli_rollback($conn);
    responde(false, ["erro" => $e->getMessage()], 400);

} catch (Throwable $e) {

    mysqli_rollback($conn);
    responde(false, ["erro" => "Não foi possível registrar o pedido."], 500);
}