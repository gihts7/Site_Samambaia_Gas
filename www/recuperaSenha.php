<?php

session_start();

require_once("includes/conecta.php");
require_once("includes/funcoes.php");

$erro = "";
$sucesso = "";
$email = "";

if (isset($_POST["enviar"])) {

    $email = trim($_POST["email"]);
    $dataNascimento = $_POST["dataNascimento"];
    $novaSenha = $_POST["novaSenha"];
    $confirmaNovaSenha = $_POST["confirmaNovaSenha"];

    // Estas duas checagens não dependem do usuário existir,
    // então podem ter mensagens próprias sem revelar nada
    if ($novaSenha !== $confirmaNovaSenha) {

        $erro = "As senhas não coincidem.";

    } elseif (strlen($novaSenha) < 6) {

        $erro = "A nova senha deve ter pelo menos 6 caracteres.";

    } else {

        // Só clientes: a senha do admin NÃO pode ser redefinida só com
        // e-mail + data de nascimento
        $sql = "SELECT id FROM usuarios
                WHERE email = ? AND data_nascimento = ? AND tipo = 'cliente'";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $dataNascimento);
        mysqli_stmt_execute($stmt);

        $usuario = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        mysqli_stmt_close($stmt);

        if (!$usuario) {

            // Mesma mensagem para e-mail inexistente OU data errada
            $erro = "Não foi possível redefinir a senha. Verifique os dados informados.";

        } else {

            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios SET senha_hash = ? WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $senhaHash, $usuario["id"]);

            if (mysqli_stmt_execute($stmt)) {
                $sucesso = "Senha atualizada com sucesso! Você já pode entrar.";
                $email = "";
            } else {
                $erro = "Não foi possível redefinir a senha. Tente novamente.";
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

    <title>Recuperação de senha</title>
    
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

    <form method="POST" action="recuperaSenha.php">

        <img src="imagens/logo_sem_fundo.png" alt="Logo" class="logo">

        <h1>Recuperar senha</h1>

        <p class="subtitulo">
            Informe seu e-mail e sua data de nascimento para criar uma nova senha
        </p>

        <?php if ($erro != ""): ?>
            <div class="alert alert-danger"><?= v($erro) ?></div>
        <?php endif; ?>

        <?php if ($sucesso != ""): ?>
            <div class="alert alert-success">
                <?= v($sucesso) ?>
                <a href="login.php" class="alert-link">Ir para o login</a>
            </div>
        <?php endif; ?>

        <label>Email</label>

        <div class="input-group mb-3">

            <span class="input-group-text">

                <i class="bi bi-envelope-fill"></i>

            </span>

            <input
                class="form-control"
                type="email"
                name="email" required
                value="<?= v($email) ?>"
                placeholder="Digite seu email">

        </div>

        <label>Data de nascimento</label>

        <div class="input-group mb-3">

            <span class="input-group-text">
                <i class="bi bi-calendar-date-fill"></i>
            </span>

            <input
                class="form-control"
                type="date"
                name="dataNascimento" required>  

            </div>

        <label>Nova senha</label>

        <div class="input-group mb-4">

            <span class="input-group-text">

                <i class="bi bi-lock-fill"></i>

            </span>

            <input
                id="senha"
                class="form-control"
                type="password"
                name="novaSenha" required autocomplete="new-password"
                placeholder="Digite sua nova senha">

            <span class="input-group-text olho">

                <i class="bi bi-eye-fill"></i>

            </span>

        </div>

        <label>Confirmação da nova senha</label>

        <div class="input-group mb-4">

            <span class="input-group-text">

                <i class="bi bi-lock-fill"></i>

            </span>

            <input
                id="confirmaSenha"
                class="form-control"
                type="password"
                name="confirmaNovaSenha" required autocomplete="new-password"
                placeholder="Confirma sua nova senha">

            <span class="input-group-text olho">

                <i class="bi bi-eye-fill"></i>

            </span>

        </div>


        <input
            class="btn btn-login w-100"
            type="submit"
            name="enviar"
            value="Atualizar senha">

        <div class="divisor">

            <span>ou</span>

        </div>

        <div class="links">

            <a href="login.php">

                <i class="bi bi-person"></i>

                Entrar

            </a>

        </div>
    </form>
</div>

<footer>

    © 2026 Samambaia Gás. Todos os direitos reservados.

</footer>

</div>

<!-- JavaScript -->
<script src="js/script.js"></script>

</body>
</html>