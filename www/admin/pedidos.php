<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

// LEFT JOIN: se a conta do cliente foi excluída, usuario_id fica NULL
$sql = "SELECT p.id, p.tipo_entrega, p.forma_pagamento, p.criado_em, u.nome AS cliente
        FROM pedidos p
        LEFT JOIN usuarios u ON u.id = p.usuario_id
        ORDER BY p.id DESC";

$pedidos = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedidos</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-admin">

    <div class="container">

        <a class="navbar-brand" href="painelAdmin.php">

            <img src="../imagens/logo_sem_fundo.png" class="logo-menu">

            Samambaia Gás

        </a>

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a href="painelAdmin.php" class="nav-link">

                        <i class="bi bi-arrow-left"></i>

                        Voltar ao painel

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container">

    <div class="cabecalho-produtos">

        <div>

            <h2>Pedidos Recebidos</h2>

            <p>Visualize os pedidos enviados pelo site.</p>
        </div>
    </div>

    <?php if (isset($_SESSION["erro"])): ?>
        <div class="alert alert-danger"><?= v($_SESSION["erro"]) ?></div>
        <?php unset($_SESSION["erro"]); ?>
    <?php endif; ?>


    <div class="table-responsive">

        <table class="table align-middle text-center">

            <thead>

                <tr>

                    <th>#</th>
                    <th>Data</th>

                    <th>Cliente</th>

                    <th>Entrega</th>

                    <th>Pagamento</th>

                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>

                <?php if (mysqli_num_rows($pedidos) === 0): ?>
                    <tr>
                        <td colspan="6">Nenhum pedido recebido ainda.</td>
                    </tr>
                <?php endif; ?>

                <?php while ($p = mysqli_fetch_assoc($pedidos)): ?>

                <tr>
                    <td><?= str_pad($p["id"], 3, "0", STR_PAD_LEFT) ?></td>
                    <td><?= v(dataBr($p["criado_em"])) ?></td>
                    <td><?= $p["cliente"] ? v($p["cliente"]) : "Conta excluída" ?></td>
                    <td><?= $p["tipo_entrega"] === "entrega" ? "Entrega" : "Retirada" ?></td>
                    <td><?= v($p["forma_pagamento"]) ?></td>
                    <td>
                        <a href="visualizarPedido.php?id=<?= (int) $p["id"] ?>"
                           class="btn btn-warning">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                </tr>

                <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>