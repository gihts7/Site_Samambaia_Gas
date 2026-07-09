<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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

    <form method="POST" action="telaPrincipal.php">

        <img src="Imagens/Logo_sem_fundo.png" alt="Logo" class="logo">

        <h1>Login</h1>

        <p class="subtitulo">
            Acesse sua conta para ter acesso completo ao site
        </p>

        <label>Email</label>

        <div class="input-group mb-3">

            <span class="input-group-text">

                <i class="bi bi-envelope-fill"></i>

            </span>

            <input
                class="form-control"
                type="email"
                name="email"
                placeholder="Digite seu email">

        </div>

        <label>Senha</label>

        <div class="input-group mb-4">

            <span class="input-group-text">

                <i class="bi bi-lock-fill"></i>

            </span>

            <input
                id="senha"
                class="form-control"
                type="password"
                name="senha"
                placeholder="Digite sua senha">

            <span class="input-group-text olho">

                <i id="olho" class="bi bi-eye-fill"></i>

            </span>

        </div>

        <input
            class="btn btn-login w-100"
            type="submit"
            name="enviar"
            value="Entrar">

        <div class="divisor">

            <span>ou</span>

        </div>

        <div class="links">

            <a href="Cadastro.php">

                <i class="bi bi-person"></i>

                Criar conta

            </a>

            <a href="RecuperaSenha.php">

                <i class="bi bi-shield-lock"></i>

                Esqueci minha senha

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
