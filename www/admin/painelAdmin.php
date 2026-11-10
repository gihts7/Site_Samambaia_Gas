<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

// Totais exibidos nos cards
$sql = "SELECT
            (SELECT COUNT(*) FROM produtos) AS produtos,
            (SELECT COUNT(*) FROM usuarios WHERE tipo = 'cliente') AS usuarios,
            (SELECT COUNT(*) FROM pedidos) AS pedidos";

$totais = mysqli_fetch_assoc(mysqli_query($conn, $sql));

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel Administrativo</title>

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

            <img src="../imagens/logo_sem_fundo.png"  class="logo-menu">

        </a>

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menuAdmin">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="menuAdmin">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">

                    <a class="nav-link"
                       href="minhaContaAdmin.php">

                        <i class="bi bi-person-circle"></i>

                        Minha Conta Admin

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="../index.php">

                        <i class="bi bi-box-arrow-right"></i>

                        Vizualizar página principal do site

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>

<div class="container py-5">

    <h1 class="titulo-admin">

        <i class="bi bi-speedometer2"></i>

        Painel Administrativo

    </h1>

    <p class="subtitulo-admin">

        Bem-vindo, <?= v($_SESSION["nome"]) ?>.

    </p>

    <div class="row g-4 mt-3">

        <div class="col-md-4">

            <div class="card-admin">

                <i class="bi bi-box-seam"></i>

                <h3>Produtos</h3>

                <p>

                    Cadastre, edite ou exclua produtos.
                    <br><strong><?= (int) $totais["produtos"] ?> cadastrado(s)</strong>

                </p>

                <a href="gerenciarProdutos.php"
                   class="btn btn-admin">

                    Gerenciar

                </a>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card-admin">

                <i class="bi bi-person"></i>

                <h3>Usuários</h3>

                <p>

                    Visualize ou exclua os usuários cadastrados.
                    <br><strong><?= (int) $totais["usuarios"] ?> cadastrado(s)</strong>

                </p>

                <a href="gerenciarUsuarios.php"
                   class="btn btn-admin">

                    Gerenciar

                </a>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card-admin">

                <i class="bi bi-receipt"></i>

                <h3>Pedidos</h3>

                <p>

                    Visualize os pedidos recebidos.
                    <br><strong><?= (int) $totais["pedidos"] ?> recebido(s)</strong>

                </p>

                <a href="pedidos.php"
                   class="btn btn-admin">

                    Visualizar

                </a>

            </div>

        </div>

    </div>

</div>

<!-- ============================= -->
<!-- MODAL SAIR -->
<!-- ============================= -->

<div
    class="modal fade"
    id="modalSair"
    tabindex="-1"
    aria-labelledby="modalSairLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <!-- Cabeçalho -->

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="modalSairLabel">

                    Sair da Conta

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Fechar">

                </button>

            </div>


            <!-- Corpo -->

            <div class="modal-body">

                Tem certeza que deseja sair da conta admin?

            </div>


            <!-- Botões -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <a
                    href="../includes/logout.php"
                    class="btn btn-danger">
                    Sair

                </a>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>