<?php

require_once("includes/conecta.php");

$erro = "";
$sucesso = "";

if (isset($_POST["enviar"])) {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $dataNascimento = $_POST["dataNascimento"];
    $telefone = trim($_POST["telefone"]);
    $rua = trim($_POST["rua"]);
    $numero = trim($_POST["numero"]);
    $bairro = trim($_POST["bairro"]);
    $cidade = trim($_POST["cidade"]);
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    if ($senha !== $confirmarSenha) {

        $erro = "As senhas não coincidem.";

    } else {

        // Verifica se o email já está cadastrado
        $sql = "SELECT id FROM usuarios WHERE email = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);

        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {

            $erro = "Este e-mail já está cadastrado.";

        } else {

            // Criptografa a senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Cadastra o usuário
            $sql = "INSERT INTO usuarios
                    (nome, email, data_nascimento, telefone,
                     rua, numero, bairro, cidade, senha_hash, tipo)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'cliente')";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "sssssssss",
                $nome,
                $email,
                $dataNascimento,
                $telefone,
                $rua,
                $numero,
                $bairro,
                $cidade,
                $senhaHash
            );

            if (mysqli_stmt_execute($stmt)) {

                $sucesso = "Cadastro realizado com sucesso! Você já pode fazer login.";

            } else {

                $erro = "Não foi possível realizar o cadastro.";

            }
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro</title>

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

        <form method="POST" action="cadastro.php">

            <img src="imagens/logo_sem_fundo.png" alt="Logo" class="logo">

            <h1>Cadastro</h1>

            <?php if ($erro != ""): ?>

                <div class="alert alert-danger">
                    <?= htmlspecialchars($erro) ?>
                </div>

            <?php endif; ?>

            <?php if ($sucesso != ""): ?>

                <div class="alert alert-success">
                    <?= htmlspecialchars($sucesso) ?>
                    <a href="login.php">Entrar</a>
                </div>

            <?php endif; ?>

            <p class="subtitulo">
                Crie uma conta para ter acesso completo ao site <br>
                Obs. Preencha todos os campos
            </p>

            <!-- Nome -->

            <label>Nome Completo</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>

                <input
                    class="form-control"
                    type="text"
                    name="nome" required
                    placeholder="Digite seu nome completo">

            </div>

            <!-- Email -->

            <label>Email</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-envelope-fill"></i>
                </span>

                <input
                    class="form-control"
                    type="email"
                    name="email" required
                    placeholder="Digite seu email">

            </div>

            <!-- Data e Telefone -->

            <div class="row">

                <div class="col-md-6">

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

                </div>

                <div class="col-md-6">

                    <label>Telefone</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-telephone-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="tel"
                            name="telefone" required
                            placeholder="(51) 99999-9999">

                    </div>

                </div>

            </div>

            <!-- Rua e Número -->

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
                            name="rua" required
                            placeholder="Digite sua rua">

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
                            type="number"
                            name="numero" required
                            placeholder="123">

                    </div>

                </div>

            </div>

            <!-- Bairro e Cidade -->

            <div class="row">

                <div class="col-md-5">

                    <label>Bairro</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-geo-alt-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            name="bairro" required
                            placeholder="Digite seu bairro">

                    </div>

                </div>

                <div class="col-md-7">

                    <label>Cidade</label>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-buildings-fill"></i>
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            value="Santo Antônio da Patrulha"
                            readonly>

                        <input
                            type="hidden"
                            name="cidade"
                            value="Santo Antônio da Patrulha">


                    </div>

                </div>

            </div>

            <!-- Senha -->

            <label>Senha</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input
                    id="senha"
                    class="form-control"
                    type="password"
                    name="senha" required
                    placeholder="Digite sua senha">

                <span class="input-group-text olho">
                    <i class="bi bi-eye-fill"></i>
                </span>

            </div>

            <!-- Confirmar Senha -->

            <label>Confirmar senha</label>

            <div class="input-group mb-4">

                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input
                    id="confirmarSenha"
                    class="form-control"
                    type="password"
                    name="confirmarSenha" required
                    placeholder="Digite novamente sua senha">

                <span class="input-group-text olho">
                    <i class="bi bi-eye-fill"></i>
                </span>

            </div>

            <!-- Botão -->

            <input
                class="btn btn-login w-100"
                type="submit"
                name="enviar" required
                value="Cadastrar">

            <div class="divisor">

                <span>ou</span>

            </div>

            <div class="links">

                <a href="login.php">

                    <i class="bi bi-box-arrow-in-right"></i>

                    Entrar

                </a>

            </div>

        </form>

    </div>

    <footer>

        © 2026 Samambaia Gás. Todos os direitos reservados.

    </footer>

</div>

<script src="js/script.js"></script>

</body>
</html>