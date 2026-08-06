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

                    <a class="nav-link" href="../index.php">

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

            Adicionar Produto - Na opção de editar os campos vão estar preenchidos para serem editados -

            <!-- Para edição basta trocar para "Editar Produto" -->

        </h2>

        <p class="mb-4">

            Preencha as informações do produto.

        </p>

        <form>

            <div class="row">

                <div class="col-md-6">

                    <label class="form-label">

                        Nome

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Ex.: Gás P13">

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Categoria

                    </label>

                    <select class="form-select">

                        <option>GLP</option>

                        <option>Água</option>

                        <option>Acessórios</option>

                        <option>Casco</option>

                    </select>

                </div>

            </div>

            <div class="row mt-3">

                <div class="col-md-6">

                    <label class="form-label">

                        Preço Retirada

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            R$

                        </span>

                        <input
                            type="number"
                            step="0.01"
                            class="form-control">

                    </div>

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Preço Entrega

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            R$

                        </span>

                        <input
                            type="number"
                            step="0.01"
                            class="form-control">

                    </div>

                </div>

            </div>

            <div class="mt-3">

                <label class="form-label">

                    Imagem do Produto

                </label>

                <input
                    type="file"
                    class="form-control">

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