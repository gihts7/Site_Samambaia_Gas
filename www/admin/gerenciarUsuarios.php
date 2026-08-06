<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciar Usuários</title>

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

    <table class="table align-middle">

        <thead>

            <tr>

                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th class="text-center">Ações</th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>João da Silva</td>

                <td>joao@email.com</td>

                <td>(51) 99999-9999</td>

                <td>Santo Antônio da Patrulha</td>

                <td>

                    <div class="acoes">

                        <a
                            href="visualizarUsuario.php"
                            class="btn btn-warning">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                        <button
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluir">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </div>

                </td>

            </tr>

            <tr>

                <td>Maria Oliveira</td>

                <td>maria@email.com</td>

                <td>(51) 98888-8888</td>

                <td>Caraá</td>

                <td>

                    <div class="acoes">

                        <a
                            href="visualizarUsuario.php"
                            class="btn btn-warning">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                        <button
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluir">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </div>

                </td>

            </tr>

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

                Tem certeza que deseja excluir este usuário?

                <br><br>

                Esta ação não poderá ser desfeita.

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <button
                    class="btn btn-danger"
                    data-bs-dismiss="modal">

                    Excluir

                </button>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>