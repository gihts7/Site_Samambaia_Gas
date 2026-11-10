<?php
require_once("../includes/verificaLogin.php");
exigeAdmin();

require_once("../includes/conecta.php");
require_once("../includes/funcoes.php");

// Lista só clientes (admin não aparece, então não dá para excluí-lo aqui)
$sql = "SELECT id, nome, email, telefone, rua, numero, bairro
        FROM usuarios
        WHERE tipo = 'cliente'
        ORDER BY nome";

$usuarios = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciar Usuários</title>

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

            <img src="../imagens/logo_sem_fundo.png" class="logo-menu">

            Samambaia Gás

        </a>

        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

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

<div class="container">

    <div class="cabecalho-produtos">

        <div>

            <h2>Gerenciar Usuários</h2>

            <p>Visualize e gerencie os usuários cadastrados.</p>
        </div>
    </div>

    <?php if (isset($_SESSION["sucesso"])): ?>
        <div class="alert alert-success"><?= v($_SESSION["sucesso"]) ?></div>
        <?php unset($_SESSION["sucesso"]); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION["erro"])): ?>
        <div class="alert alert-danger"><?= v($_SESSION["erro"]) ?></div>
        <?php unset($_SESSION["erro"]); ?>
    <?php endif; ?>

    <table class="table align-middle">

        <thead>

            <tr>

                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th class="text-center">Ações</th>

            </tr>

        </thead>

        <tbody>

            <?php if (mysqli_num_rows($usuarios) === 0): ?>

                <tr>
                    <td colspan="5" class="text-center">
                        Nenhum usuário cadastrado.
                    </td>
                </tr>

            <?php endif; ?>

            <?php while ($u = mysqli_fetch_assoc($usuarios)): ?>

            <?php
                // Monta "Rua, número - Bairro", ignorando partes vazias
                $endereco = trim($u["rua"] . ($u["numero"] ? ", " . $u["numero"] : ""));

                if ($u["bairro"]) {
                    $endereco .= ($endereco !== "" ? " - " : "") . $u["bairro"];
                }
            ?>

            <tr>
                <td><?= v($u["nome"]) ?></td>
                <td><?= v($u["email"]) ?></td>
                <td><?= v($u["telefone"]) ?></td>
                <td><?= v($endereco) ?></td>
                <td>
                    <div class="acoes">
                        <a
                            href="visualizarUsuario.php?id=<?= (int) $u["id"] ?>"
                            class="btn btn-warning">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluir"
                            data-id="<?= (int) $u["id"] ?>"
                            data-nome="<?= v($u["nome"]) ?>">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

</div>

<!-- Modal -->

<div class="modal fade" id="modalExcluir" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Excluir usuário

                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                Tem certeza que deseja excluir o usuário <strong id="nomeExcluir"></strong>?

                <br><br>

                Esta ação não poderá ser desfeita.

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <form method="POST" action="excluirUsuario.php" class="d-inline">
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
// Passa o id e o nome do usuário clicado para o modal de exclusão
document.getElementById("modalExcluir").addEventListener("show.bs.modal", function (e) {
    const botao = e.relatedTarget;
    document.getElementById("idExcluir").value = botao.dataset.id;
    document.getElementById("nomeExcluir").textContent = botao.dataset.nome;
});
</script>

</body>

</html>