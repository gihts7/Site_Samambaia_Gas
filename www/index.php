<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Samambaia Gás</title>

    <!-- Ícone -->
    <link rel="icon" type="image/png" href="imagens/iconeLogo.png">

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

                <img src="imagens/logo_sem_fundo.png" class="logo-menu">

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

                <a href="minhaConta.php" class="btn btn-login-menu">

                    <i class="bi bi-person-circle"></i>

                    Minha conta

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
            oferecendo atendimento rápido, segurança e qualidade para área urbana e rural de
            Santo Antônio da Patrulha.

        </p>

        <a href="#produtos" class="btn-conhecer">

            Faça seu pedido

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
                Atendemos toda a cidade de Santo Antônio da Patrulha rapidez e compromisso.
            </p>

        </div>

    </div>

    </section>



    <!-- Produtos -->
    <section id="produtos" class="produtos">

    <div class="container">

        <h2>Faça seu pedido</h2>

        <p class="subtitulo-produtos">
            Visualize e adicione os produtos ao seu pedido.
        </p>

        <p class="obs-produtos">
            OBS: Selecione a opção gás de cozinha se você já tiver um casco. Se não tiver,
            adicione o gás de cozinha e o casco vazio ao seu pedido. Em caso de dúvidas,
            entre em contato pelo WhatsApp. <br> <br>

            Para realizar um pedido utilizando o programa gás do povo, entre em contato com um vendedor pelo whattsapp para mais informações
        </p>

        <div class="whatsapp-contato">
            <a href="https://wa.me/555194226636" target="_blank">
                <i class="bi bi-whatsapp"></i>
                Entre em contato
            </a>
        </div>

        <!-- Seleção do tipo de entrega -->
        <section class="tipo-entrega">
        <h3>Como deseja receber seu pedido?</h3>

        <p class="texto-entrega">
            Escolha uma opção antes de selecionar os produtos.
        </p>

        <div class="opcoes-entrega">

            <label class="card-entrega">

                <input
                    type="radio"
                    name="tipoEntrega"
                    value="entrega">

                <i class="bi bi-truck"></i>

                <h4>Entrega</h4>

                <span>Receba seu pedido em casa.</span>

            </label>

            <label class="card-entrega">

                <input
                    type="radio"
                    name="tipoEntrega"
                    value="retirada"
                    checked>

                <i class="bi bi-shop"></i>

                <h4>Retirada</h4>

                <span>Retire diretamente na loja.</span>

            </label>

        </div>

    </section>
            
        <div id="enderecoEntrega" class="endereco-entrega">

        <h3>Endereço para entrega</h3>

        <div class="row">

            <div class="col-md-8 mb-3">

                <label>Rua</label>

                <input id="rua"
                    class="form-control"
                    type="text"
                    placeholder="Digite sua rua" required>

            </div>

            <div class="col-md-4 mb-3">

                <label>Número</label>

                <input id="numero"
                    class="form-control"
                    type="text"
                    placeholder="Número" required>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label>Bairro</label>

                <input id="bairro"
                    class="form-control"
                    type="text"
                    placeholder="Digite seu bairro" required>

            </div>

            <div class="col-md-6 mb-3">

                <label>Cidade</label>

                <input
                    type="text"
                    class="form-control"
                    value="Santo Antônio da Patrulha"
                    readonly>

            </div>

        </div>

        <p>*Entregas no interior sujeito a mudanças de valor e disponibilidade de entrega</p> 

    </div>

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

            <button class="categoria">
                <i class="bi bi-tools"></i>
                Cascos
            </button>

        </div>

        <!-- Produtos -->

        <div class="cards-produtos">

            <!-- Gás P5 -->
            <div class="produto"
                data-nome="Gás de cozinha P5"
                data-retirada="110"
                data-entrega="110">

                <img src="imagens/p5.png">

                <h3>Gás de cozinha P5</h3>

                <p class="preco">
                    R$ <span class="valor-produto">110,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Gás P13 -->
            <div class="produto"
                data-nome="Gás de cozinha P13"
                data-retirada="110"
                data-entrega="110">

                <img src="imagens/p13.png">

                <h3>Gás de cozinha P13</h3>

                <p class="preco">
                    R$ <span class="valor-produto">110,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Gás P20 -->
            <div class="produto"
                data-nome="Gás de cozinha P20"
                data-retirada="200"
                data-entrega="200">

                <img src="imagens/p20.png">

                <h3>Gás de cozinha P20</h3>

                <p class="preco">
                    R$ <span class="valor-produto">200,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Gás P45 -->
            <div class="produto"
                data-nome="Gás de cozinha P45"
                data-retirada="420"
                data-entrega="420">

                <img src="imagens/p45.png">

                <h3>Gás de cozinha P45</h3>

                <p class="preco">
                    R$ <span class="valor-produto">420,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Água 500ml -->
            <div class="produto"
                data-nome="Água mineral 500ml"
                data-retirada="5"
                data-entrega="5">

                <img src="imagens/500ml.png">

                <h3>Água mineral 500ml</h3>

                <p class="preco">
                    R$ <span class="valor-produto">5,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Água com gás -->
            <div class="produto"
                data-nome="Água mineral com gás 500ml"
                data-retirada="5"
                data-entrega="5">

                <img src="imagens/500mlgas.png">

                <h3>Água mineral com gás 500ml</h3>

                <p class="preco">
                    R$ <span class="valor-produto">5,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Água 20L -->
            <div class="produto"
                data-nome="Água mineral 20L"
                data-retirada="18"
                data-entrega="18">

                <img src="imagens/agua20l.png">

                <h3>Água mineral 20L</h3>

                <p class="preco">
                    R$ <span class="valor-produto">18,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Regulador -->
            <div class="produto"
                data-nome="Regulador"
                data-retirada="35"
                data-entrega="35">

                <img src="imagens/regulador.png">

                <h3>Regulador</h3>

                <p class="preco">
                    R$ <span class="valor-produto">35,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Kit Mangueira -->
            <div class="produto"
                data-nome="KitMangueira"
                data-retirada="25"
                data-entrega="25">

                <img src="imagens/kitMangueira.png">

                <h3>Kit regulador + Mangueira</h3>

                <p class="preco">
                    R$ <span class="valor-produto">25,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Casco P5 -->
            <div class="produto"
                data-nome="Casco vazio P5"
                data-retirada="110"
                data-entrega="110">

                <img src="imagens/p5.png">

                <h3>Casco vazio P5</h3>

                <p class="preco">
                    R$ <span class="valor-produto">110,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Casco P13 -->
            <div class="produto"
                data-nome="Casco vazio P13"
                data-retirada="110"
                data-entrega="110">

                <img src="imagens/p13.png">

                <h3>Casco vazio P13</h3>

                <p class="preco">
                    R$ <span class="valor-produto">110,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Casco P20 -->
            <div class="produto"
                data-nome="Casco vazio P20"
                data-retirada="200"
                data-entrega="200">

                <img src="imagens/p20.png">

                <h3>Casco vazio P20</h3>

                <p class="preco">
                    R$ <span class="valor-produto">200,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

            <!-- Casco P45 -->
            <div class="produto"
                data-nome="Casco vazio P45"
                data-retirada="420"
                data-entrega="470">

                <img src="imagens/p45.png">

                <h3>Casco vazio P45</h3>

                <p class="preco">
                    R$ <span class="valor-produto">420,00</span>
                </p>

                <div class="quantidade">
                    <button class="menos">-</button>
                    <span class="qtd">1</span>
                    <button class="mais">+</button>
                </div>

                <button class="btn-adicionar">
                    <i class="bi bi-cart-plus"></i>
                    Adicionar
                </button>

            </div>

        </div>

    </div>

    <section id="resumoPedido" class="resumo-pedido">

    <h2>Resumo do Pedido</h2>

    <div id="infoEntregaResumo" class="info-entrega-resumo" style="display:none;">

        <h5>

            <i class="bi bi-geo-alt-fill"></i>

            Endereço de entrega

        </h5>

        <p id="textoEndereco"></p>

        <hr>

    </div>

    <h5>
        <i class="bi bi-basket-fill"></i>
        Produtos do seu pedido
    </h5>

    <div id="listaProdutos">
        <!-- produtos adicionados pelo JavaScript -->
    </div>

    <hr>

    <h5>
        <i class="bi bi-credit-card-fill"></i>
        Forma de pagamento
    </h5>

    <select id="formaPagamento" class="form-select" required>

        <option value="">Selecione...</option>
        <option>PIX</option>
        <option>Dinheiro</option>
        <option>Cartão de Débito</option>
        <option>Cartão de Crédito</option>

    </select>

    <div id="enderecoResumo">

    </div>

    <div class="total">

        <span>Total</span>

        <strong id="valorTotal">
            R$ 0,00
        </strong>

    </div>

    <button id="btnEnviar" class="btn-enviar">

        <i class="bi bi-whatsapp"></i>

        Enviar pedido

    </button>

    </section>

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
                da Patrulha.
            </p>

            <p>
                Nosso compromisso é garantir segurança, comodidade e um
                atendimento próximo aos nossos clientes, sempre buscando
                oferecer a melhor experiência em cada entrega.
            </p>


        </div>

    </div>

    </section>

    <section id="contato" class="contato">

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
                        <span>Entrega rápida para Santo Antônio. Conferir disponibilidade de entrega para interior e município Caraá</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>Segunda à domigo das 7:00 às 22:00, incluindo feriados</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-credit-card"></i>
                        <span>Aceitamos como forma de pagamento: Gás do povo, pix, dinheiro, cartões de débito e crédito em até x sem juros</span>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-item">
                        <i class="bi bi-whatsapp"></i>

                        <a href="https://wa.me/555194226636" class="link-email">

                            Pedidos e informações pelo WhatsApp (51)9422-6636

                        </a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-telephone"></i>

                        <a href="tel:+553662-1451" class="link-email">
                        Pedidos e informações pelo telefone/celular 3662-1451
                        </a>

                    </div>

                    <div class="info-item">
                        <i class="bi bi-instagram"></i>
                        
                        <a href="https://www.instagram.com/samambaia_gas?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="link-email">

                            @samambaia_gas

                        </a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope"></i>
                        
                        <a href="mailto:divino.samambaiagas@gmail.com" class="link-email">

                            divino.samambaiagas@gmail.com

                        </a>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="modalTrocaEntrega" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-exclamation-triangle-fill"></i>
                        Alterar tipo de entrega

                    </h5>

                </div>

                <div class="modal-body">

                    Você já adicionou produtos ao pedido.

                    <br><br>

                    Ao alterar o tipo de entrega, todos os produtos serão removidos.

                    <br><br>

                    Deseja continuar?

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-cancelar"
                        data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button
                        type="button"
                        id="confirmarTroca"
                        class="btn btn-confirmar">

                        Continuar

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Rodapé com infos -->
    <footer>

        © 2026 Samambaia Gás. Todos os direitos reservados.

    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/principal.js"></script>

</body>
</html>