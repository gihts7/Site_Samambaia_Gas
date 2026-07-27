const radios = document.querySelectorAll('input[name="tipoEntrega"]');

const endereco = document.getElementById("enderecoEntrega");

const cards = document.querySelectorAll(".card-entrega");

radios.forEach(function(radio){

    radio.addEventListener("change", function(){

        cards.forEach(function(card){
            card.classList.remove("ativo");
        });

        radio.closest(".card-entrega").classList.add("ativo");

        if(radio.value == "entrega"){

            endereco.style.display = "block";

        }

        else{

            endereco.style.display = "none";

        }

    });

});

let carrinho = [];

function atualizarResumo(){

    const resumo = document.getElementById("resumoPedido");

    if(carrinho.length == 0){

        resumo.style.display = "none";
        return;

    }

    resumo.style.display = "block";

}

document.querySelector('input[value="retirada"]')
        .closest(".card-entrega")
        .classList.add("ativo");