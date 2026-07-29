let tipoEntregaAnterior = document.querySelector('input[name="tipoEntrega"]:checked').value;

const radios = document.querySelectorAll('input[name="tipoEntrega"]');

const endereco = document.getElementById("enderecoEntrega");

const cards = document.querySelectorAll(".card-entrega");

let carrinho = [];

const modalTroca = new bootstrap.Modal(
    document.getElementById("modalTrocaEntrega")
);

let radioSelecionado = null;

// Resumo
function atualizarResumo(){

    const resumo = document.getElementById("resumoPedido");

    const lista = document.getElementById("listaProdutos");

    lista.innerHTML = "";

    let total = 0;

    if(carrinho.length === 0){

        resumo.style.display = "none";

        return;

    }

    resumo.style.display = "block";

    carrinho.forEach(function(produto){

        lista.innerHTML += `

            <div class="item-resumo">

                <span>
                    ${produto.quantidade}x ${produto.nome}
                </span>

                <div>

                    <strong>

                        R$ ${(produto.preco * produto.quantidade).toFixed(2).replace(".", ",")}

                    </strong>

                    <button class="btn-remover" data-nome="${produto.nome}">

                        <i class="bi bi-trash-fill"></i>

                    </button>

                </div>

            </div>

        `;

        total += produto.preco * produto.quantidade;

    });

    document.getElementById("valorTotal").textContent =
    "R$ " + total.toFixed(2).replace(".", ",");

    const botoesRemover = document.querySelectorAll(".btn-remover");

    botoesRemover.forEach(function(botao){

        botao.addEventListener("click", function(){

            const nome = botao.dataset.nome;

            carrinho = carrinho.filter(function(produto){

                return produto.nome !== nome;

            });

            atualizarResumo();

        });

    });

}

// Botões de adicionar
const botoesAdicionar = document.querySelectorAll(".btn-adicionar");

botoesAdicionar.forEach(function(botao){

    botao.addEventListener("click", function(){

        const card = botao.closest(".produto");

        const nome = card.dataset.nome;

        const quantidade = Number(card.querySelector(".qtd").textContent);

        const tipoEntrega = document.querySelector('input[name="tipoEntrega"]:checked').value;

        const preco = tipoEntrega === "entrega"
            ? Number(card.dataset.entrega)
            : Number(card.dataset.retirada);

        const produtoExistente = carrinho.find(function(produto){

                return produto.nome === nome;

            });

            if(produtoExistente){

                produtoExistente.quantidade += quantidade;

            }else{

                carrinho.push({

                    nome: nome,

                    preco: preco,

                    quantidade: quantidade

                });

            }

        atualizarResumo();

    });

});

// Botões de quantidade
const produtos = document.querySelectorAll(".produto");

produtos.forEach(function(produto){

    const btnMais = produto.querySelector(".mais");
    const btnMenos = produto.querySelector(".menos");
    const quantidade = produto.querySelector(".qtd");

    btnMais.addEventListener("click", function(){

        quantidade.textContent = Number(quantidade.textContent) + 1;

    });

    btnMenos.addEventListener("click", function(){

        if(Number(quantidade.textContent) > 1){

            quantidade.textContent = Number(quantidade.textContent) - 1;

        }

    });

});

radios.forEach(function(radio){

    radio.addEventListener("change", function(){

        if(carrinho.length > 0){

            radioSelecionado = radio;

            modalTroca.show();

            document.querySelector(`input[value="${tipoEntregaAnterior}"]`).checked = true;

            return;

        }

        tipoEntregaAnterior = radio.value;

        atualizarPrecos();

    });

});

function atualizarPrecos(){

    const tipoEntrega = document.querySelector('input[name="tipoEntrega"]:checked').value;

    cards.forEach(function(card){

        card.classList.remove("ativo");

    });

    document.querySelector(`input[value="${tipoEntrega}"]`)
        .closest(".card-entrega")
        .classList.add("ativo");

    if(tipoEntrega === "entrega"){

        endereco.style.display = "block";

    }else{

        endereco.style.display = "none";

    }

    atualizarEnderecoResumo();

    const produtos = document.querySelectorAll(".produto");

    produtos.forEach(function(produto){

        const preco = tipoEntrega === "entrega"
            ? Number(produto.dataset.entrega)
            : Number(produto.dataset.retirada);

        produto.querySelector(".valor-produto").textContent =
            preco.toFixed(2).replace(".", ",");

    });

}

atualizarPrecos();

document.getElementById("confirmarTroca").addEventListener("click", function(){

    carrinho = [];

    atualizarResumo();

    if(radioSelecionado){
    radioSelecionado.checked = true;

    tipoEntregaAnterior = radioSelecionado.value;

    atualizarPrecos();
   }

    modalTroca.hide();

});

function atualizarEnderecoResumo(){

    const tipoEntrega = document.querySelector('input[name="tipoEntrega"]:checked').value;

    const infoEntrega = document.getElementById("infoEntregaResumo");

    const texto = document.getElementById("textoEndereco");

    if(tipoEntrega === "retirada"){

        infoEntrega.style.display = "none";

        return;

    }

    infoEntrega.style.display = "block";

    const rua = document.getElementById("rua").value;

    const numero = document.getElementById("numero").value;

    const bairro = document.getElementById("bairro").value;

    const cidade = document.getElementById("cidade").value;

    texto.innerHTML = `
        <strong>Rua:</strong> ${rua}<br>
        <strong>Número:</strong> ${numero}<br>
        <strong>Bairro:</strong> ${bairro}<br>
        <strong>Cidade:</strong> ${cidade}
    `;

}

document.getElementById("modalTrocaEntrega")
.addEventListener("hidden.bs.modal", function(){

    document.querySelector(`input[value="${tipoEntregaAnterior}"]`).checked = true;

    atualizarPrecos();
    atualizarEnderecoResumo();

});

document.getElementById("rua").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("numero").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("bairro").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("cidade").addEventListener("change", atualizarEnderecoResumo);


document.getElementById("btnEnviar").addEventListener("click", function () {

    //Número de telefone para onde vai a mensagem do pedido
    const telefone = "5551989212294";

    const tipoEntrega =
        document.querySelector('input[name="tipoEntrega"]:checked').value;

    const pagamento =
        document.getElementById("formaPagamento").value;

    let mensagem = "*Novo Pedido*%0A%0A";

    mensagem += "👤 Cliente: João da Silva%0A%0A";

    mensagem += "📦 Produtos:%0A";

    carrinho.forEach(function(produto){

        mensagem +=
            `• ${produto.quantidade}x ${produto.nome} - R$ ${(produto.preco * produto.quantidade).toFixed(2).replace(".", ",")}%0A`;

    });

    mensagem += "%0A";

    mensagem +=
        "💰 Total: " +
        document.getElementById("valorTotal").textContent +
        "%0A%0A";

    mensagem += "🚚 Tipo de entrega: ";

    mensagem += tipoEntrega == "entrega"
        ? "Entrega"
        : "Retirada";

    mensagem += "%0A";

    if(tipoEntrega == "entrega"){

        mensagem += "%0A📍 Endereço:%0A";

        mensagem +=
            document.getElementById("rua").value + ", ";

        mensagem +=
            document.getElementById("numero").value + "%0A";

        mensagem +=
            document.getElementById("bairro").value + "%0A";

        mensagem +=
            document.getElementById("cidade").value + "%0A";

    }

    mensagem += "%0A";

    mensagem +=
        "💳 Forma de pagamento: " +
        pagamento;

    window.open(
        "https://wa.me/" + telefone + "?text=" + mensagem,
        "_blank"
    );

});