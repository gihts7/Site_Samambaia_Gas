<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

$id = (int) ($_GET["id"] ?? 0);

$sql = "SELECT p.id, p.tipo_entrega, p.forma_pagamento, p.rua, p.numero, p.bairro,
               p.cidade, p.criado_em,
               u.nome AS cliente_nome, u.telefone AS cliente_telefone
        FROM pedidos p
        LEFT JOIN usuarios u ON u.id = p.usuario_id
        WHERE p.id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$pedido = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

mysqli_stmt_close($stmt);

if (!$pedido) {
    $_SESSION["erro"] = "Pedido não encontrado.";
    header("Location: pedidos.php");
    exit;
}

// Itens do pedido
$stmt = mysqli_prepare($conn, "SELECT produto_nome, quantidade FROM pedido_itens WHERE pedido_id = ? ORDER BY id");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$itens = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);

mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visualizar Pedido</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-admin">

    <div class="container">

        <a class="navbar-brand" href="painelAdmin.php">

            <img src="../imagens/logo_sem_fundo.png" class="logo-menu">

        </a>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a href="pedidos.php" class="nav-link">

                        <i class="bi bi-arrow-left"></i>

                        Voltar

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container py-4">

    <h2 class="mb-4 fw-bold">

        Pedido #<?= str_pad($pedido["id"], 3, "0", STR_PAD_LEFT) ?>
    </h2>

    <p class="text-muted">
        Recebido em <?= v(dataBr($pedido["criado_em"])) ?>
    </p>

    <div class="row g-4">

        <!-- Cliente -->

        <div class="col-md-6">

            <div class="card shadow-sm h-100">

                <div class="card-header card-header-pedido">

                    <strong>

                        <i class="bi bi-person-fill"></i>

                        Cliente

                    </strong>

                </div>

                <div class="card-body">

                    <p class="mb-2">

                        <strong><?= $pedido["cliente_nome"] ? v($pedido["cliente_nome"]) : "Conta excluída" ?></strong>

                    </p>

                    <?php if ($pedido["cliente_telefone"]): ?>
                    <p class="text-muted mb-0">
                        <i class="bi bi-telephone-fill"></i>
                        <?= v($pedido["cliente_telefone"]) ?>
                    </p>
                    <?php elseif (!$pedido["cliente_nome"]): ?>
                    <p class="text-muted mb-0">
                        Esta conta foi excluída pelo cliente depois do pedido.
                    </p>
                    <?php endif; ?>

                </div>

            </div>

        </div>

        <!-- Pagamento -->

        <div class="col-md-6">

            <div class="card shadow-sm h-100">

                <div class="card-header card-header-pedido">

                    <strong>

                        <i class="bi bi-credit-card-fill"></i>

                        Pagamento

                    </strong>

                </div>

                <div class="card-body">

                    <span class="badge bg-success fs-6">

                        <?= v($pedido["forma_pagamento"]) ?>

                    </span>

                </div>

            </div>

        </div>

        <!-- Endereço -->

        <div class="col-12">

            <div class="card shadow-sm">

                <div class="card-header card-header-pedido">

                    <strong>

                        <i class="bi bi-geo-alt-fill"></i>

                        Endereço

                    </strong>

                </div>

                <div class="card-body">

                    <?php if ($pedido["tipo_entrega"] === "entrega"): ?>
                    <?= v($pedido["rua"]) ?>, <?= v($pedido["numero"]) ?>
                    <br>
                    <?= v($pedido["bairro"]) ?> - <?= v($pedido["cidade"]) ?>
                    <?php else: ?>
                    <strong>Retirada na loja</strong> (sem endereço de entrega)
                    <?php endif; ?>

                </div>

            </div>

        </div>

        <!-- Produtos -->

        <div class="col-12">

            <div class="card shadow-sm">

                <div class="card-header card-header-pedido">

                    <strong>

                        <i class="bi bi-box-seam"></i>

                        Produtos

                    </strong>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Produto</th>

                                <th class="text-center">Qtd.</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php foreach ($itens as $item): ?>
                            <tr>
                                <td><?= v($item["produto_nome"]) ?></td>
                                <td class="text-center"><?= (int) $item["quantidade"] ?>x</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- Botão -->

        <div class="col-12 text-end">

            <a href="pedidos.php" class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>

                Voltar

            </a>

        </div>

    </div>

</div>

</body>

</html>