<?php

require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");

// Só aceita POST (um simples link não exclui nada)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: gerenciarProdutos.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);

// Pega a imagem antes de apagar o registro
$stmt = mysqli_prepare($conn, "SELECT imagem FROM produtos WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$produto = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

mysqli_stmt_close($stmt);

if (!$produto) {

    $_SESSION["erro"] = "Produto não encontrado.";

} else {

    // O histórico de pedidos continua: pedido_itens guarda o nome do produto
    // e a FK produto_id é ON DELETE SET NULL
    $stmt = mysqli_prepare($conn, "DELETE FROM produtos WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Só apaga o arquivo se veio de upload (as imagens originais do site ficam)
    if ($produto["imagem"] && strpos($produto["imagem"], "imagens/produtos/") === 0) {
        @unlink(__DIR__ . "/../" . $produto["imagem"]);
    }

    $_SESSION["sucesso"] = "Produto excluído com sucesso.";
}

header("Location: gerenciarProdutos.php");
exit;
