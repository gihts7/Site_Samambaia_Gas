<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Minha Conta</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="imagens/iconeLogo.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="fundo">

    <img src="imagens/bg-top.svg" class="bg-top" alt="">
    <img src="imagens/bg-bottom.svg" class="bg-bottom" alt="">

    <div class="login-box">

        <form>

            <img src="imagens/logo_sem_fundo.png" class="logo" alt="Logo">

            <div class="perfil">

                <i class="bi bi-person-circle"></i>

            </div>

            <h1>Minha Conta</h1>

            <p class="subtitulo">
                Visualize suas informações cadastrais.
            </p>

            <hr>

            <h5 class="mb-3">
                <i class="bi bi-person-circle"></i>
                Dados Pessoais
            </h5>

            <label>Nome Completo</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>

                <input
                    class="form-control"
                    type="text"
                    value="João da Silva"
                    readonly>

            </div>

            <label>Email</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                </span>

                <input
                    class="form-control"
                    type="email"
                    value="joao@email.com"
                    readonly>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <label>Telefone</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-telephone-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="(51) 99999-9999"
                            readonly>

                    </div>

                </div>

                <div class="col-md-6">

                    <label>Data de nascimento</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-calendar-date-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="01/01/2000"
                            readonly>

                    </div>

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

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-signpost-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="Rua Exemplo"
                            readonly>

                    </div>

                </div>

                <div class="col-md-4">

                    <label>Número</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-house-door-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="123"
                            readonly>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <label>Bairro</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-pin-map-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="Centro"
                            readonly>

                    </div>

                </div>

                <div class="col-md-6">

                    <label>Cidade</label>

                    <div class="input-group mb-4">

                        <span class="input-group-text">
                            <i class="bi bi-buildings-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="Santo Antônio da Patrulha"
                            readonly>

                    </div>

                </div>

            </div>

            <div class="d-grid gap-3">

                <a href="editarCadastro.php" class="btn btn-editar">

                    <i class="bi bi-pencil-square"></i>

                    Editar Cadastro

                </a>

                <a href="sairConta.php" class="btn btn-secondary"> 

                    <i class="bi bi-box-arrow-right"></i>

                    Sair da sua conta

                </a>

                <button
                    type="button"
                    class="btn btn-outline-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#modalExcluir">

                    <i class="bi bi-trash-fill"></i>

                    Excluir Conta

                </button>

                <a href="admin/painelAdmin.php" class="btn btn-secondary"> 

                    <i class="bi bi-box-arrow-right"></i>

                    Painel administrativo (apenas para vizualização)

                </a>

                <a href="login.php" class="btn btn-secondary"> 

                    <i class="bi bi-box-arrow-right"></i>

                    Tela de login (apenas para vizualização)

                </a>

            </div>

        </form>

    </div>

    <footer>

        © 2026 Samambaia Gás. Todos os direitos reservados.

    </footer>

</div>

<!-- Modal -->

<div class="modal fade" id="modalExcluir" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Excluir Conta

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                Tem certeza que deseja excluir sua conta?
                <br><br>
                Todos os seus dados serão removidos permanentemente.

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <a href="excluirConta.php" class="btn btn-danger">

                    Excluir

                </a>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>