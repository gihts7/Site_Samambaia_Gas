<?php

require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

$idUsuario = $_SESSION["id_usuario"];
$erro = "";

// Dados atuais (confere também que continua sendo admin)
$sql = "SELECT email FROM usuarios WHERE id = ? AND tipo = 'admin'";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idUsuario);
mysqli_stmt_execute($stmt);

$admin = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

mysqli_stmt_close($stmt);

if (!$admin) {
    header("Location: ../includes/logout.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $admin["email"] = trim($_POST["usuario"]);

    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    if (!filter_var($admin["email"], FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um e-mail válido.";

    } elseif ($senha !== $confirmarSenha) {

        $erro = "As senhas não coincidem.";

    } elseif ($senha !== "" && strlen($senha) < 6) {

        $erro = "A nova senha deve ter pelo menos 6 caracteres.";

    } else {

        // O e-mail já pertence a OUTRA conta?
        $sql = "SELECT id FROM usuarios WHERE email = ? AND id <> ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $admin["email"], $idUsuario);
        mysqli_stmt_execute($stmt);

        $emailEmUso = mysqli_num_rows(mysqli_stmt_get_result($stmt)) > 0;

        mysqli_stmt_close($stmt);

        if ($emailEmUso) {

            $erro = "Este e-mail já está sendo usado por outra conta.";

        } else {

            if ($senha !== "") {

                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = "UPDATE usuarios SET email = ?, senha_hash = ?
                        WHERE id = ? AND tipo = 'admin'";

                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssi", $admin["email"], $senhaHash, $idUsuario);

            } else {

                $sql = "UPDATE usuarios SET email = ?
                        WHERE id = ? AND tipo = 'admin'";

                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "si", $admin["email"], $idUsuario);
            }

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_close($stmt);

                $_SESSION["sucesso"] = "Conta atualizada com sucesso!";

                header("Location: minhaContaAdmin.php");
                exit;

            } else {

                $erro = "Não foi possível salvar as alterações.";
            }

            mysqli_stmt_close($stmt);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Conta - Admin</title>

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

        <form method="POST" action="editarContaAdmin.php" id="formEditarAdmin">

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

            <h1>Editar Conta</h1>

            <p class="subtitulo">

                Altere os dados da sua conta administrativa.
            </p>

            <?php if ($erro != ""): ?>

                <div class="alert alert-danger">
                    <?= v($erro) ?>
                </div>

            <?php endif; ?>


            <hr>


            <!-- ============================= -->
            <!-- USUÁRIO -->
            <!-- ============================= -->

            <label>Usuário (e-mail de login)</label>

            <div class="input-group mb-3">

                <span class="input-group-text">

                    <i class="bi bi-person-fill"></i>

                </span>

                <input
                    class="form-control"
                    type="email"
                    name="usuario"
                    value="<?= v($admin['email']) ?>"
                    required>

            </div>


            <!-- ============================= -->
            <!-- NOVA SENHA -->
            <!-- ============================= -->

            <label>Nova senha</label>

            <div class="input-group mb-3">

                <span class="input-group-text">

                    <i class="bi bi-lock-fill"></i>

                </span>

                <input
                    class="form-control"
                    type="password"
                    name="senha"
                    autocomplete="new-password"
                    placeholder="Nova senha (deixe em branco para manter)">

                <span class="input-group-text olho">

                    <i class="bi bi-eye-fill"></i>

                </span>

            </div>


            <!-- ============================= -->
            <!-- CONFIRMAR SENHA -->
            <!-- ============================= -->

            <label>Confirmar nova senha</label>

            <div class="input-group mb-4">

                <span class="input-group-text">

                    <i class="bi bi-lock-fill"></i>

                </span>

                <input
                    class="form-control"
                    type="password"
                    name="confirmarSenha"
                    autocomplete="new-password"
                    placeholder="Digite a senha novamente">

                <span class="input-group-text olho">

                    <i class="bi bi-eye-fill"></i>

                </span>

            </div>


            <!-- ============================= -->
            <!-- BOTÕES -->
            <!-- ============================= -->

            <div class="d-grid gap-3">

                <!-- Salvar -->

            <button
                type="button"
                class="btn btn-editar"
                data-bs-toggle="modal"
                data-bs-target="#modalSalvar">

                <i class="bi bi-check-lg"></i>

                Salvar Alterações

            </button>


                <!-- Cancelar -->

                <a
                    href="minhaContaAdmin.php"
                    class="btn btn-sair">

                    <i class="bi bi-arrow-left"></i>

                    Cancelar

                </a>

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


<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>

<!-- ============================= -->
<!-- MODAL SALVAR ALTERAÇÕES -->
<!-- ============================= -->

<div
    class="modal fade"
    id="modalSalvar"
    tabindex="-1"
    aria-labelledby="modalSalvarLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <!-- Cabeçalho -->

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="modalSalvarLabel">

                    Salvar Alterações

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

                Tem certeza que deseja salvar as alterações
                da sua conta administrativa?

            </div>


            <!-- Botões -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <button
                    type="submit"
                    form="formEditarAdmin"
                    class="btn btn-danger">
                    Salvar
                </button>

            </div>

        </div>

    </div>

</div>

<!-- JavaScript -->

<script src="../js/script.js"></script>

<script>
// Se o navegador barrar o envio (ex.: e-mail inválido), fecha o modal
// para a pessoa ver o campo com problema
document.getElementById("formEditarAdmin").addEventListener("invalid", function () {
    const modal = bootstrap.Modal.getInstance(document.getElementById("modalSalvar"));
    if (modal) modal.hide();
}, true);
</script>

</body>

</html>