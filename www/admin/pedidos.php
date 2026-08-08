<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedidos</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="../imagens/iconeLogo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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

            <h2>Pedidos Recebidos</h2>

            <p>Visualize os pedidos enviados pelo site.</p>

        </div>

    </div>


    <div class="table-responsive">

        <table class="table align-middle text-center">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Cliente</th>

                    <th>Entrega</th>

                    <th>Pagamento</th>

                    <th>Total</th>

                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>

                <tr>

                    <td>001</td>

                    <td>João da Silva</td>

                    <td>Entrega</td>

                    <td>PIX</td>

                    <td>R$ 220,00</td>

                    <td>

                        <a href="visualizarPedido.php"
                           class="btn btn-warning">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                    </td>

                </tr>


                <tr>

                    <td>002</td>

                    <td>Maria Oliveira</td>

                    <td>Retirada</td>

                    <td>Cartão</td>

                    <td>R$ 110,00</td>

                    <td>

                        <a href="visualizarPedido.php"
                           class="btn btn-warning">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>