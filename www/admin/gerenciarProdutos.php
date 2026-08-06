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

    <div class="card-admin">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Imagem</th>

                    <th>Produto</th>

                    <th>Categoria</th>

                    <th>Retirada</th>

                    <th>Entrega</th>

                    <th class="text-center">Ações</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>

                        <img src="../imagens/p13.png" class="img-produto">

                    </td>

                    <td>Gás de cozinha P13</td>

                    <td>GLPs</td>

                    <td>R$100,00</td>

                    <td>R$110,00</td>

                    <td class="text-center">

                        <a href="produtoFormulario.php" class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-fill"></i>

                        </a>

                        <button
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalExcluirProduto">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </td>

                </tr>

                <tr>

                    <td>

                        <img src="../imagens/agua20l.png" class="img-produto">

                    </td>

                    <td>Água Mineral 20L</td>

                    <td>Água</td>

                    <td>R$18,00</td>

                    <td>R$20,00</td>

                    <td class="text-center">

                        <div class="acoes">

                            <a href="produtoFormulario.php" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <button
                                class="btn btn-danger"
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

                Tem certeza que deseja excluir este produto?

                <br><br>

                <strong>Esta ação não poderá ser desfeita.</strong>

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <button class="btn btn-danger">

                    Excluir

                </button>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>