<?php
session_start();

require_once("includes/conecta.php");
require_once("includes/funcoes.php");

$categorias = mysqli_fetch_all(
    mysqli_query($conn, "SELECT id, nome FROM categorias ORDER BY id"),
    MYSQLI_ASSOC
);

// Só produtos ativos, na ordem em que foram cadastrados
$produtos = mysqli_fetch_all(
    mysqli_query($conn, "SELECT id, nome, imagem, categoria_id
                         FROM produtos
                         WHERE ativo = 1
                         ORDER BY categoria_id, id"),
    MYSQLI_ASSOC
);

// Ícone de cada categoria (as novas usam um ícone padrão)
$icones = [
    "GLPs"       => "bi-fire",
    "Água"       => "bi-droplet-fill",
    "Acessórios" => "bi-tools",
    "Cascos"     => "bi-tools",
];

?>

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

                <?php if (!isset($_SESSION["id_usuario"])): ?>

                    <!-- Visitante -->
                    <a href="login.php" class="btn btn-login-menu">

                        <i class="bi bi-box-arrow-in-right"></i>

                        Entrar

                    </a>

                <?php elseif ($_SESSION["tipo"] === "admin"): ?>

                    <!-- Administrador -->
                    <a href="admin/painelAdmin.php" class="btn btn-login-menu">

                        <i class="bi bi-person-gear"></i>

                        Área Administrativa

                    </a>

                <?php else: ?>

                    <!-- Cliente -->
                    <a href="minhaConta.php" class="btn btn-login-menu">

                        <i class="bi bi-person-circle"></i>

                        Minha conta

                    </a>

                <?php endif; ?>

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

            Monte seu pedido

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

        <h2>Monte seu pedido</h2>

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
            <a href="https://wa.me/5551989212294" target="_blank">
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
                    value="entrega"
                    checked>

                <i class="bi bi-truck"></i>

                <h4>Entrega</h4>

                <span>Receba seu pedido em casa.</span>

            </label>

            <label class="card-entrega">

                <input
                    type="radio"
                    name="tipoEntrega"
                    value="retirada">

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
                    id="cidade"
                    type="text"
                    class="form-control"
                    value="Santo Antônio da Patrulha"
                    readonly>

            </div>

        </div>

        <p>*Entregas no interior, conferir disponibilidade de entrega.</p> 

    </div>

                <!-- Categorias -->

        <div class="categorias">

            <button class="categoria ativa" data-categoria="todos">
                <i class="bi bi-grid-fill"></i>
                Todos
            </button>

            <?php foreach ($categorias as $c): ?>

                <button class="categoria" data-categoria="<?= (int) $c["id"] ?>">
                    <i class="bi <?= $icones[$c["nome"]] ?? "bi-tag-fill" ?>"></i>
                    <?= v($c["nome"]) ?>
                </button>

            <?php endforeach; ?>

        </div>

        <!-- Produtos -->

        <div class="cards-produtos">

            <?php if (count($produtos) === 0): ?>
                <p>Nenhum produto disponível no momento.</p>
            <?php endif; ?>

            <?php foreach ($produtos as $p): ?>

            <div class="produto"
                data-nome="<?= v($p["nome"]) ?>"
                data-categoria="<?= (int) $p["categoria_id"] ?>">

                <img src="<?= v($p["imagem"]) ?>" alt="<?= v($p["nome"]) ?>">

                <h3><?= v($p["nome"]) ?></h3>

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

            <?php endforeach; ?>

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

    <?php if (!isset($_SESSION["id_usuario"])): ?>
        <div class="alert alert-warning">
            Para finalizar o pedido, <a href="login.php" class="alert-link">entre na sua conta</a>
            ou <a href="cadastro.php" class="alert-link">cadastre-se</a>.
        </div>
    <?php endif; ?>

    <button
    type="button"
    id="btnEnviar"
    class="btn-enviar">

    <i class="bi bi-whatsapp"></i>
    Enviar pedido pelo WhatsApp
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
                produtos de qualidade e atendimento para Santo Antônio
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
                        <span>Entrega rápida para Santo Antônio. Conferir disponibilidade de entrega para interior.</span>
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

    <!-- Rodapé com infos -->
    <footer>

        © 2026 Samambaia Gás. Todos os direitos reservados.

    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/principal.js"></script>

</body>
</html>