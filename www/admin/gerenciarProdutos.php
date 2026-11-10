<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

$sql = "SELECT p.id, p.nome, p.imagem, p.ativo, c.nome AS categoria
        FROM produtos p
        JOIN categorias c ON c.id = p.categoria_id
        ORDER BY c.nome, p.nome";

$produtos = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciar Produtos</title>
    
    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-admin">

    <div class="container">

        <a class="navbar-brand" href="painelAdmin.php">

            <img src="../imagens/logo_sem_fundo.png">

            Samambaia Gás

        </a>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a href="painelAdmin.php" class="nav-link">

                        <i class="bi bi-arrow-left"></i>

                        Voltar ao painel

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container py-5">

    <div class="cabecalho-produtos">

    <div>

        <h2>Gerenciar Produtos</h2>

        <p>Adicione, edite ou remova produtos do catálogo.</p>

    </div>

    <a href="produtoFormulario.php" class="btn btn-admin">

        <i class="bi bi-plus-circle"></i>

        Adicionar Produto

    </a>

    </div>

    <?php if (isset($_SESSION["sucesso"])): ?>
        <div class="alert alert-success"><?= v($_SESSION["sucesso"]) ?></div>
        <?php unset($_SESSION["sucesso"]); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION["erro"])): ?>
        <div class="alert alert-danger"><?= v($_SESSION["erro"]) ?></div>
        <?php unset($_SESSION["erro"]); ?>
    <?php endif; ?>

    <div class="card-admin">
        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Imagem</th>

                    <th>Produto</th>

                    <th>Categoria</th>
                    <th>Status</th>

                    <th class="text-center">Ações</th>

                </tr>

            </thead>

            <tbody>

                <?php if (mysqli_num_rows($produtos) === 0): ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            Nenhum produto cadastrado.
                        </td>
                    </tr>
                <?php endif; ?>

                <?php while ($p = mysqli_fetch_assoc($produtos)): ?>

                <tr>
                    <td>
                        <?php if ($p["imagem"]): ?>
                            <img src="../<?= v($p["imagem"]) ?>" class="img-produto">
                        <?php endif; ?>
                    </td>
                    <td><?= v($p["nome"]) ?></td>
                    <td><?= v($p["categoria"]) ?></td>
                    <td>
                        <?php if ($p["ativo"]): ?>
                            <span class="badge text-bg-success">Ativo</span>
                        <?php else: ?>
                            <span class="badge text-bg-secondary">Inativo</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="produtoFormulario.php?id=<?= (int) $p["id"] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluirProduto"
                            data-id="<?= (int) $p["id"] ?>"
                            data-nome="<?= v($p["nome"]) ?>">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>

                <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- Modal Excluir Produto -->

<div class="modal fade" id="modalExcluirProduto" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-trash-fill text-danger"></i>

                    Excluir produto

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                Tem certeza que deseja excluir o produto <strong id="nomeExcluir"></strong>?

                <br><br>

                <strong>Esta ação não poderá ser desfeita.</strong>

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <form method="POST" action="excluirProduto.php" class="d-inline">
                    <input type="hidden" name="id" id="idExcluir">
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Passa o id e o nome do produto clicado para o modal de exclusão
document.getElementById("modalExcluirProduto").addEventListener("show.bs.modal", function (e) {
    const botao = e.relatedTarget;
    document.getElementById("idExcluir").value = botao.dataset.id;
    document.getElementById("nomeExcluir").textContent = botao.dataset.nome;
});
</script>

</body>

</html>