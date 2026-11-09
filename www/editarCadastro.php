<?php

require_once("includes/verificaLogin.php");
exigeLogin();

require_once("includes/conecta.php");
require_once("includes/funcoes.php");

$idUsuario = $_SESSION["id_usuario"];
$erro = "";

// Busca os dados atuais do usuário logado
$sql = "SELECT nome, email, data_nascimento, telefone, rua, numero, bairro, cidade
        FROM usuarios
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idUsuario);
mysqli_stmt_execute($stmt);

$dados = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

mysqli_stmt_close($stmt);

// Usuário não existe mais (ex.: foi excluído): encerra a sessão
if (!$dados) {
    header("Location: includes/logout.php");
    exit;
}

if (isset($_POST["enviar"])) {

    // Sobrescreve $dados com o que foi digitado,
    // assim, se der erro, o formulário não perde o que a pessoa preencheu
    $dados["nome"]            = trim($_POST["nome"]);
    $dados["email"]           = trim($_POST["email"]);
    $dados["data_nascimento"] = $_POST["dataNascimento"];
    $dados["telefone"]        = trim($_POST["telefone"]);
    $dados["rua"]             = trim($_POST["rua"]);
    $dados["numero"]          = trim($_POST["numero"]);
    $dados["bairro"]          = trim($_POST["bairro"]);

    $senha          = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    if (!filter_var($dados["email"], FILTER_VALIDATE_EMAIL)) {

        $erro = "Digite um e-mail válido.";

    } elseif ($senha !== $confirmarSenha) {

        $erro = "As senhas não coincidem.";

    } elseif ($senha !== "" && strlen($senha) < 6) {

        $erro = "A nova senha deve ter pelo menos 6 caracteres.";

    } else {

        // O e-mail já pertence a OUTRA conta?
        $sql = "SELECT id FROM usuarios WHERE email = ? AND id <> ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $dados["email"], $idUsuario);
        mysqli_stmt_execute($stmt);

        $emailEmUso = mysqli_num_rows(mysqli_stmt_get_result($stmt)) > 0;

        mysqli_stmt_close($stmt);

        if ($emailEmUso) {

            $erro = "Este e-mail já está sendo usado por outra conta.";

        } else {

            $dataNascimento = $dados["data_nascimento"] !== ""
                ? $dados["data_nascimento"]
                : null;

            if ($senha !== "") {

                // Trocou a senha
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = "UPDATE usuarios
                        SET nome = ?, email = ?, data_nascimento = ?, telefone = ?,
                            rua = ?, numero = ?, bairro = ?, senha_hash = ?
                        WHERE id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param(
                    $stmt, "ssssssssi",
                    $dados["nome"], $dados["email"], $dataNascimento, $dados["telefone"],
                    $dados["rua"], $dados["numero"], $dados["bairro"], $senhaHash,
                    $idUsuario
                );

            } else {

                // Senha em branco: mantém a atual
                $sql = "UPDATE usuarios
                        SET nome = ?, email = ?, data_nascimento = ?, telefone = ?,
                            rua = ?, numero = ?, bairro = ?
                        WHERE id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param(
                    $stmt, "sssssssi",
                    $dados["nome"], $dados["email"], $dataNascimento, $dados["telefone"],
                    $dados["rua"], $dados["numero"], $dados["bairro"],
                    $idUsuario
                );
            }

            if (mysqli_stmt_execute($stmt)) {

                $_SESSION["nome"] = $dados["nome"];
                $_SESSION["sucesso"] = "Cadastro atualizado com sucesso!";

                mysqli_stmt_close($stmt);

                header("Location: minhaConta.php");
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

    <title>Editar Cadastro</title>

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

        <form method="POST" action="editarCadastro.php">

            <img src="imagens/logo_sem_fundo.png" alt="Logo" class="logo">

            <h1>Editar Cadastro</h1>

            <p class="subtitulo">
                Atualize suas informações pessoais.
            </p>

            <?php if ($erro != ""): ?>

                <div class="alert alert-danger">
                    <?= v($erro) ?>
                </div>

            <?php endif; ?>

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
                    value="<?= v($dados['nome']) ?>"
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
                    value="<?= v($dados['email']) ?>"
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
                            name="dataNascimento" required
                    value="<?= v($dados['data_nascimento']) ?>">  

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
                    value="<?= v($dados['telefone']) ?>"
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
                    value="<?= v($dados['rua']) ?>"
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
                    value="<?= v($dados['numero']) ?>"
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
                    value="<?= v($dados['bairro']) ?>"
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
                            value="<?= v($dados['cidade']) ?>"
                            readonly>

                    </div>

                </div>

            </div>

            <!-- Senha -->

            <label>Nova senha (opcional)</label>

            <div class="input-group mb-3">

                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input
                    id="senha"
                    class="form-control"
                    type="password"
                    name="senha"
                    autocomplete="new-password"
                    placeholder="Nova senha (deixe em branco para manter)">

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
                    name="confirmarSenha"
                    autocomplete="new-password"
                    placeholder="Confirme a nova senha">

                <span class="input-group-text olho">
                    <i class="bi bi-eye-fill"></i>
                </span>

            </div>

            <!-- Botão -->

            <input
                class="btn btn-login w-100"
                type="submit"
                name="enviar"
                value="Salvar Alterações">

            <div class="divisor">

                <span>ou</span>

            </div>

            <div class="links">

                <a href="minhaConta.php">

                    <i class="bi bi-box-arrow-in-right"></i>

                    Voltar

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