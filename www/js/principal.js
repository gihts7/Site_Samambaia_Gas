const radios = document.querySelectorAll('input[name="tipoEntrega"]');

const endereco = document.getElementById("enderecoEntrega");

const cards = document.querySelectorAll(".card-entrega");

let carrinho = [];

// Resumo
function atualizarResumo(){

    const resumo = document.getElementById("resumoPedido");

    const lista = document.getElementById("listaProdutos");

    lista.innerHTML = "";

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

                    <button class="btn-remover" data-nome="${produto.nome}">

                        <i class="bi bi-trash-fill"></i>

                    </button>

                </div>

            </div>

        `;

    });

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

        const produtoExistente = carrinho.find(function(produto){

                return produto.nome === nome;

            });

            if(produtoExistente){

                produtoExistente.quantidade += quantidade;

            }else{

                carrinho.push({
                    nome: nome,
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

radios.forEach(function(radio) {

    radio.addEventListener("change", function() {

        atualizarTipoEntrega();

    });

});

function atualizarTipoEntrega() {

    const tipoEntrega = document.querySelector(
        'input[name="tipoEntrega"]:checked'
    ).value;

    cards.forEach(function(card) {
        card.classList.remove("ativo");
    });

    document.querySelector(`input[value="${tipoEntrega}"]`)
        .closest(".card-entrega")
        .classList.add("ativo");

    if (tipoEntrega === "entrega") {
        endereco.style.display = "block";
    } else {
        endereco.style.display = "none";
    }

    atualizarEnderecoResumo();
}

atualizarTipoEntrega();

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

document.getElementById("rua").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("numero").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("bairro").addEventListener("input", atualizarEnderecoResumo);

document.getElementById("cidade").addEventListener("change", atualizarEnderecoResumo);



document.getElementById("btnEnviar").addEventListener("click", function () {

    const telefone = "5551989212294";

    const tipoEntrega = document.querySelector(
        'input[name="tipoEntrega"]:checked'
    ).value;

    const pagamento = document.getElementById("formaPagamento").value;

    // Verifica se existem produtos no pedido
    if (carrinho.length === 0) {
        alert("Adicione pelo menos um produto ao pedido.");
        return;
    }

    // Verifica se a forma de pagamento foi selecionada
    if (pagamento === "") {
        alert("Selecione a forma de pagamento.");
        return;
    }

    // Verifica os campos do endereço somente para entrega
    if (tipoEntrega === "entrega") {

        const rua = document.getElementById("rua").value.trim();
        const numero = document.getElementById("numero").value.trim();
        const bairro = document.getElementById("bairro").value.trim();
        const cidade = document.getElementById("cidade").value.trim();

        if (!rua || !numero || !bairro || !cidade) {
            alert("Preencha todos os campos do endereço de entrega.");
            return;
        }
    }

    let mensagem = "*Novo Pedido*%0A%0A";

    mensagem += "📦 Produtos:%0A";

    carrinho.forEach(function (produto) {

        mensagem +=
            `• ${produto.quantidade}x ${produto.nome}%0A`;

    });

    mensagem += "%0A";

    mensagem += "🚚 Tipo de entrega: ";

    mensagem += tipoEntrega === "entrega"
        ? "Entrega"
        : "Retirada";

    mensagem += "%0A";

    if (tipoEntrega === "entrega") {

        mensagem += "%0A📍 Endereço:%0A";

        mensagem +=
            encodeURIComponent(document.getElementById("rua").value.trim()) + ", ";

        mensagem +=
            encodeURIComponent(document.getElementById("numero").value.trim()) + "%0A";

        mensagem +=
            encodeURIComponent(document.getElementById("bairro").value.trim()) + "%0A";

        mensagem +=
            encodeURIComponent(document.getElementById("cidade").value.trim()) + "%0A";
    }

    mensagem += "%0A";

    mensagem +=
        "💳 Forma de pagamento: " +
        encodeURIComponent(pagamento);

    window.open(
        "https://wa.me/" + telefone + "?text=" + mensagem,
        "_blank"
    );

});