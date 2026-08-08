<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Minha Conta - Admin</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="fundo">

    <!-- Fundos decorativos -->

    <img
        src="../imagens/bg-top.svg"
        class="bg-top"
        alt="">

    <img
        src="../imagens/bg-bottom.svg"
        class="bg-bottom"
        alt="">


    <!-- ============================= -->
    <!-- CARD -->
    <!-- ============================= -->

    <div class="login-box">

        <form>

            <!-- Logo -->

            <img
                src="../imagens/logo_sem_fundo.png"
                class="logo"
                alt="Logo Samambaia Gás">


            <!-- Ícone de perfil -->

            <div class="perfil">

                <i class="bi bi-person-circle"></i>

            </div>


            <!-- Título -->

            <h1>Minha Conta</h1>

            <p class="subtitulo">

                Visualize suas informações administrativas.

            </p>


            <hr>


            <!-- ============================= -->
            <!-- DADOS DA CONTA -->
            <!-- ============================= -->

            <h5 class="titulo-secao">

                <i class="bi bi-person-badge-fill"></i>

                Dados da conta

            </h5>


            <!-- Usuário -->

            <label>Usuário</label>

            <div class="input-group mb-3">

                <span class="input-group-text">

                    <i class="bi bi-person-fill"></i>

                </span>

                <input
                    class="form-control"
                    type="text"
                    value="Admin"
                    readonly>

            </div>


            <!-- Senha -->

            <label>Senha</label>

            <div class="input-group mb-4">

                <span class="input-group-text">

                    <i class="bi bi-lock-fill"></i>

                </span>

                <input
                    class="form-control"
                    type="password"
                    value="123"
                    readonly>

            </div>


            <!-- ============================= -->
            <!-- BOTÕES -->
            <!-- ============================= -->

            <div class="d-grid gap-3">


                <!-- Editar cadastro -->

                <a
                    href="editarContaAdmin.php"
                    class="btn btn-editar">

                    <i class="bi bi-pencil-square"></i>

                    Editar Cadastro

                </a>


                <!-- Sair -->

                <button
                    type="button"
                    class="btn btn-sair"
                    data-bs-toggle="modal"
                    data-bs-target="#modalSair">

                    <i class="bi bi-box-arrow-right"></i>

                    Sair da conta admin

                </button>

            </div>

        </form>

    </div>


    <!-- ============================= -->
    <!-- RODAPÉ -->
    <!-- ============================= -->

    <footer>

        © 2026 Samambaia Gás. Todos os direitos reservados.

    </footer>

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
                    href="../index.php"
                    class="btn btn-danger">

                    Sair

                </a>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>