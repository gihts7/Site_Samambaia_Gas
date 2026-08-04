<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Painel Administrativo</title>

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

                        Minha Conta

                    </a>

                </li>

                <li class="nav-item">

                    <a class="btn btn-sair"
                       href="../index.php">

                        <i class="bi bi-box-arrow-right"></i>

                        Sair

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

        Bem-vindo, Administrador.

    </p>

    <div class="row g-4 mt-3">

        <div class="col-md-4">

            <div class="card-admin">

                <i class="bi bi-box-seam"></i>

                <h3>Produtos</h3>

                <p>

                    Cadastre, edite ou exclua produtos.

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

                </p>

                <a href="pedidos.php"
                   class="btn btn-admin">

                    Visualizar

                </a>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card-admin">

                <i class="bi bi-house-door"></i>

                <h3>Site</h3>

                <p>

                    Retornar para a página principal.

                </p>

                <a href="../index.php"
                   class="btn btn-admin">

                    Abrir Site

                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>