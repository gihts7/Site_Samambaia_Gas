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
    <section id="produtos" class="produtos">

    <div class="container">

        <h2>Nossos Produtos</h2>

        <p class="subtitulo-produtos">
            Escolha uma categoria e adicione os produtos ao seu pedido.
        </p>

        <!-- Categorias -->

        <div class="categorias">

            <button class="categoria ativa">
                <i class="bi bi-grid-fill"></i>
                Todos
            </button>

            <button class="categoria">
                <i class="bi bi-fire"></i>
                GLPs
            </button>

            <button class="categoria">
                <i class="bi bi-droplet-fill"></i>
                Água
            </button>

            <button class="categoria">
                <i class="bi bi-tools"></i>
                Acessórios
            </button>

        </div>

        <!-- Produtos -->

        <div class="cards-produtos">

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/p5.png">

                <h3>Botijão P5</h3>

                <p class="preco">
                    R$ 110,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/p13.png">

                <h3>Botijão P13</h3>

                <p class="preco">
                    R$ 110,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/p20.png">

                <h3>Botijão P20</h3>

                <p class="preco">
                    R$ 200,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/p45.png">

                <h3>Botijão P45</h3>

                <p class="preco">
                    R$ 420,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button class="mais">+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/500ml.png">

                <h3>Água mineral 500ml</h3>

                <p class="preco">
                    R$ 5,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/500mlgas.png">

                <h3>Água mineral com gás 500ml</h3>

                <p class="preco">
                    R$ 5,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/agua20l.png">

                <h3>Água mineral 20L</h3>

                <p class="preco">
                    R$ 18,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/regulador.png">

                <h3>Regulador</h3>

                <p class="preco">
                    R$ 35,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

            <!-- Produto -->

            <div class="produto">

                <img src="imagens/mangueira.png">

                <h3>Mangueira</h3>

                <p class="preco">
                    R$ 25,00
                </p>

                <div class="quantidade">

                    <button>-</button>

                    <span>1</span>

                    <button>+</button>

                </div>

                <button class="btn-adicionar">

                    <i class="bi bi-cart-plus"></i>

                    Adicionar

                </button>

            </div>

        </div>

    </div>

    </section>


    <!--infos -->

    <section id="sobre" class="sobre">

    <div class="container">

        <div class="texto-sobre">

            <span class="titulo-menor">
                SOBRE A SAMAMBAIA GÁS
            </span>

            <h2>
                Há anos levando qualidade e segurança para sua família
            </h2>

            <p>
                A <strong>Samambaia Gás</strong> atua na revenda de GLP, água
                mineral e acessórios, oferecendo atendimento rápido,
                produtos de qualidade e preços justos para Santo Antônio
                da Patrulha e Caraá.
            </p>

            <p>
                Nosso compromisso é garantir segurança, comodidade e um
                atendimento próximo aos nossos clientes, sempre buscando
                oferecer a melhor experiência em cada entrega.
            </p>

            <a href="#produtos" class="btn btn-laranja">
                Faça seu pedido
            </a>

        </div>

        <div class="card-atendimento">

            <h3>Informações sobre nosso atendimento</h3>

            <div class="row">

                <div class="col-md-6">

                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>

                        <span>R. Cap. José Machado da Silva, 148 - Menino Deus, Santo Antônio da Patrulha - RS</span>

                        <a href="https://maps.app.goo.gl/StxQxMfcGpcHGpZx7"
                        target="_blank"
                        class="link-mapa">

                            Ver no Google Maps

                        </a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-truck"></i>
                        <span>Entrega rápida para Santo Antônio e Caraá. Conferir disponibilidade de entrega para interior e município Caraá</span>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-item">
                        <i class="bi bi-whatsapp"></i>
                        <span>Pedidos e informações pelo WhatsApp (51)9422-6636 ou pelo telefone 3662-1451</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>Segunda à domigo das 7:00 às 22:00, incluindo feriados</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope-fill"></i>
                        
                        <a href="mailto:divino.samambaiagas@gmail.com" class="link-email">

                            divino.samambaiagas@gmail.com

                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

    </section>



    <!-- Rodapé com infos -->
    <footer>

        <p>d</p>

    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>