<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

$id = (int) ($_GET["id"] ?? 0);
$erro = "";

// Valores padrão (cadastro novo)
$produto = [
    "nome" => "",
    "categoria_id" => 0,
    "imagem" => null,
    "ativo" => 1,
];

// Categorias para o <select>
$categorias = mysqli_fetch_all(
    mysqli_query($conn, "SELECT id, nome FROM categorias ORDER BY nome"),
    MYSQLI_ASSOC
);

// Edição: carrega o produto
if ($id > 0) {

    $stmt = mysqli_prepare($conn, "SELECT nome, categoria_id, imagem, ativo FROM produtos WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $encontrado = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    mysqli_stmt_close($stmt);

    if (!$encontrado) {
        $_SESSION["erro"] = "Produto não encontrado.";
        header("Location: gerenciarProdutos.php");
        exit;
    }

    $produto = $encontrado;
}

$imagemAtual = $produto["imagem"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $produto["nome"] = trim($_POST["nome"]);
    $produto["categoria_id"] = (int) $_POST["categoria_id"];
    $produto["ativo"] = isset($_POST["ativo"]) ? 1 : 0;

    $categoriasValidas = array_column($categorias, "id");

    $arquivo = $_FILES["imagem"] ?? null;
    $enviouImagem = $arquivo && $arquivo["error"] !== UPLOAD_ERR_NO_FILE;
    $extensao = "";

    if ($produto["nome"] === "" || mb_strlen($produto["nome"]) > 100) {

        $erro = "Informe o nome do produto (até 100 caracteres).";

    } elseif (!in_array($produto["categoria_id"], $categoriasValidas)) {

        $erro = "Escolha uma categoria válida.";

    } elseif ($id === 0 && !$enviouImagem) {

        $erro = "Escolha uma imagem para o produto.";

    } elseif ($enviouImagem) {

        // Valida o upload
        if ($arquivo["error"] !== UPLOAD_ERR_OK) {

            $erro = "Não foi possível enviar a imagem. Tente novamente.";

        } elseif ($arquivo["size"] > 2 * 1024 * 1024) {

            $erro = "A imagem deve ter no máximo 2 MB.";

        } else {

            // Confere o tipo REAL do arquivo (não confia na extensão)
            $tiposPermitidos = [
                "image/jpeg" => "jpg",
                "image/png"  => "png",
                "image/webp" => "webp",
            ];

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($arquivo["tmp_name"]);

            if (!isset($tiposPermitidos[$mime])) {
                $erro = "Envie uma imagem JPG, PNG ou WEBP.";
            } else {
                $extensao = $tiposPermitidos[$mime];
            }
        }
    }

    if ($erro === "") {

        $novaImagem = null;

        // Salva o arquivo enviado (nome aleatório, na pasta imagens/produtos)
        if ($enviouImagem) {

            $pasta = __DIR__ . "/../imagens/produtos/";

            if (!is_dir($pasta)) {
                mkdir($pasta, 0775, true);
            }

            $nomeArquivo = bin2hex(random_bytes(8)) . "." . $extensao;

            if (move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeArquivo)) {
                $novaImagem = "imagens/produtos/" . $nomeArquivo;
            } else {
                $erro = "Não foi possível salvar a imagem no servidor.";
            }
        }

        if ($erro === "") {

            if ($id > 0 && $novaImagem !== null) {

                $sql = "UPDATE produtos SET nome = ?, imagem = ?, categoria_id = ?, ativo = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssiii", $produto["nome"], $novaImagem, $produto["categoria_id"], $produto["ativo"], $id);

            } elseif ($id > 0) {

                $sql = "UPDATE produtos SET nome = ?, categoria_id = ?, ativo = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "siii", $produto["nome"], $produto["categoria_id"], $produto["ativo"], $id);

            } else {

                $sql = "INSERT INTO produtos (nome, imagem, categoria_id, ativo) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssii", $produto["nome"], $novaImagem, $produto["categoria_id"], $produto["ativo"]);
            }

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_close($stmt);

                // Apaga a imagem antiga se foi trocada (só as que vieram de upload)
                if ($novaImagem !== null && $imagemAtual && strpos($imagemAtual, "imagens/produtos/") === 0) {
                    @unlink(__DIR__ . "/../" . $imagemAtual);
                }

                $_SESSION["sucesso"] = $id > 0
                    ? "Produto atualizado com sucesso!"
                    : "Produto cadastrado com sucesso!";

                header("Location: gerenciarProdutos.php");
                exit;

            } else {

                mysqli_stmt_close($stmt);

                // Não deixa arquivo órfão se o banco falhou
                if ($novaImagem !== null) {
                    @unlink(__DIR__ . "/../" . $novaImagem);
                }

                $erro = "Não foi possível salvar o produto.";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Produto</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">
    
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

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">

                    <a class="nav-link" href="painelAdmin.php">

                        <i class="bi bi-speedometer2"></i>

                        Painel

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link active" href="gerenciarProdutos.php">

                        <i class="bi bi-box-seam"></i>

                        Produtos

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="../includes/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- CONTEÚDO -->

<div class="container">

    <div class="card-formulario">

        <h2>

            <i class="bi bi-box-seam-fill"></i>

            <?= $id > 0 ? "Editar Produto" : "Adicionar Produto" ?>

        </h2>

        <p class="mb-4">

            Preencha as informações do produto.
        </p>

        <?php if ($erro != ""): ?>
            <div class="alert alert-danger"><?= v($erro) ?></div>
        <?php endif; ?>

        <form method="POST" action="produtoFormulario.php<?= $id > 0 ? '?id=' . $id : '' ?>" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6">

                    <label class="form-label">

                        Nome

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="nome"
                        value="<?= v($produto['nome']) ?>"
                        maxlength="100"
                        required
                        placeholder="Ex.: Gás P13">

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Categoria

                    </label>

                    <select class="form-select" name="categoria_id" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($categorias as $c): ?>
                            <option
                                value="<?= (int) $c["id"] ?>"
                                <?= (int) $c["id"] === (int) $produto["categoria_id"] ? "selected" : "" ?>>
                                <?= v($c["nome"]) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>

            </div>

            <div class="mt-3">

                <label class="form-label">

                    Imagem do Produto

                </label>

                <?php if ($imagemAtual): ?>
                    <div class="mb-2">
                        <img src="../<?= v($imagemAtual) ?>" class="img-produto" alt="Imagem atual">
                        <small class="text-muted d-block">
                            Imagem atual. Envie outra apenas se quiser trocá-la.
                        </small>
                    </div>
                <?php endif; ?>

                <input
                    type="file"
                    class="form-control"
                    name="imagem"
                    accept="image/jpeg,image/png,image/webp">
                <small class="text-muted">JPG, PNG ou WEBP, até 2 MB.</small>

            </div>

            <div class="form-check form-switch mt-4">
                <input
                    class="form-check-input"
                    type="checkbox"
                    role="switch"
                    id="ativo"
                    name="ativo"
                    <?= $produto["ativo"] ? "checked" : "" ?>>
                <label class="form-check-label" for="ativo">
                    Produto ativo (aparece no site)
                </label>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-5">

                <a
                    href="gerenciarProdutos.php"
                    class="btn btn-secondary">

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="btn btn-admin">

                    <i class="bi bi-floppy-fill"></i>

                    Salvar Produto

                </button>

            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>