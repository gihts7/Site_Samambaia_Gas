<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visualizar Usuário</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-admin">

    <div class="container">

        <a class="navbar-brand" href="painelAdmin.php">

            <img src="../imagens/Logo_sem_fundo.png" class="logo-menu">

            Samambaia Gás

        </a>

        <button class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="painelAdmin.php">
                        <i class="bi bi-speedometer2"></i>
                        Painel
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="gerenciarProdutos.php">
                        <i class="bi bi-box-seam"></i>
                        Produtos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="gerenciarUsuarios.php">
                        <i class="bi bi-people-fill"></i>
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container">

    <div class="login-box">

        <h2 class="text-center mb-2">

            <i class="bi bi-person-circle"></i>

            Visualizar Usuário

        </h2>

        <p class="subtitulo text-center mb-4">

            Informações cadastrais do cliente.

        </p>

        <hr>

        <h5 class="mb-3">

            <i class="bi bi-person-fill"></i>

            Dados Pessoais

        </h5>

        <label>Nome Completo</label>

        <input
            class="form-control mb-3"
            value="João da Silva"
            readonly>

        <label>Email</label>

        <input
            class="form-control mb-3"
            value="joao@email.com"
            readonly>

        <div class="row">

            <div class="col-md-6">

                <label>Telefone</label>

                <input
                    class="form-control mb-3"
                    value="(51) 99999-9999"
                    readonly>

            </div>

            <div class="col-md-6">

                <label>Data de nascimento</label>

                <input
                    class="form-control mb-3"
                    value="01/01/2000"
                    readonly>

            </div>

        </div>

        <hr>

        <h5 class="mb-3">

            <i class="bi bi-geo-alt-fill"></i>

            Endereço

        </h5>

        <div class="row">

            <div class="col-md-8">

                <label>Rua</label>

                <input
                    class="form-control mb-3"
                    value="Rua Exemplo"
                    readonly>

            </div>

            <div class="col-md-4">

                <label>Número</label>

                <input
                    class="form-control mb-3"
                    value="123"
                    readonly>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6">

                <label>Bairro</label>

                <input
                    class="form-control mb-3"
                    value="Centro"
                    readonly>

            </div>

            <div class="col-md-6">

                <label>Cidade</label>

                <input
                    class="form-control mb-4"
                    value="Santo Antônio da Patrulha"
                    readonly>

            </div>

        </div>

        <div class="d-flex justify-content-end gap-3">

            <a
                href="gerenciarUsuarios.php"
                class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>

                Voltar

            </a>

            <button
                class="btn btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#modalExcluir">

                <i class="bi bi-trash-fill"></i>

                Excluir Usuário

            </button>

        </div>

    </div>

</div>

<!-- Modal -->

<div class="modal fade" id="modalExcluir" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Excluir Usuário

                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                Tem certeza que deseja excluir este usuário?

                <br><br>

                Esta ação não poderá ser desfeita.

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <a
                    href="gerenciarUsuarios.php"
                    class="btn btn-danger">

                    Excluir

                </a>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>