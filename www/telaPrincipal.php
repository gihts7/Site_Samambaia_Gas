<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Samambaia Gás</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/principal.css">

</head>

<body>


    <!-- Cabeçalho -->
    <header>

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="#inicio">

                <img src="Imagens/Logo_sem_fundo.png" class="logo-menu">

            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Início</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#produtos">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>

                </ul>

                <a href="login.php" class="btn btn-login-menu">

                    <i class="bi bi-person-circle"></i>

                    Entrar

                </a>

            </div>

        </div>

    </nav>

    </header>



    <!-- Carrossel e história da empresa -->
    <section id="inicio">

        <div id="carouselPrincipal"
            class="carousel slide"
            data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">

                <img src="imagens/imgFachada3.jpeg"
                     class="d-block w-100"
                     alt="Banner 1">

            </div>

            <div class="carousel-item">

                <img src="imagens/imgFachada2.jpeg"
                     class="d-block w-100"
                     alt="Banner 2">

            </div>

            <div class="carousel-item">

                <img src="imagens/imgFachada1.jpeg"
                     class="d-block w-100"
                     alt="Banner 3">

            </div>

        </div>

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselPrincipal"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#carouselPrincipal"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

    <!-- Sobre -->

    <div class="sobre">

        <h2>Bem-vindo à Samambaia Gás</h2>

        <p>

            A Samambaia Gás atua na venda de gás de cozinha e água mineral,
            oferecendo atendimento rápido, segurança e qualidade para
            Santo Antônio da Patrulha e Caraá.

        </p>

        <a href="#produtos" class="btn-conhecer">

            Conheça nossos produtos

        </a>

    </div>

    <div class="diferenciais">

        <div class="diferencial">

            <i class="bi bi-truck"></i>

            <h4>Entrega rápida</h4>

            <p>
                Entregamos seu gás com agilidade para que você não fique sem abastecimento.
            </p>

        </div>

        <div class="diferencial">

            <i class="bi bi-shield-check"></i>

            <h4>Compra segura</h4>

            <p>
                Atendimento confiável, produtos de qualidade e pagamento com total segurança.
            </p>

        </div>

        <div class="diferencial">

            <i class="bi bi-geo-alt-fill"></i>

            <h4>Atendimento local</h4>

            <p>
                Atendemos Santo Antônio da Patrulha e Caraá com rapidez e compromisso.
            </p>

        </div>

    </div>

    </section>



    <!-- Produtos -->
    <section id="produtos">

        <p>b</p>

    </section>



    <!-- Diferenciais -->
    <section id="infos">

        <p>c</p>

    </section>



    <!-- Rodapé com infos -->
    <footer>

        <p>d</p>

    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>