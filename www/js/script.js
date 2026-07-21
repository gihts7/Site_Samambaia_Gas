const olhos = document.querySelectorAll(".olho");

olhos.forEach((botao) => {

    botao.addEventListener("click", () => {

        // Procura o input dentro do mesmo input-group
        const grupo = botao.closest(".input-group");
        const input = grupo.querySelector("input");

        const icone = botao.querySelector("i");

        if (input.type === "password") {

            input.type = "text";

            icone.classList.remove("bi-eye-fill");
            icone.classList.add("bi-eye-slash-fill");

        } else {

            input.type = "password";

            icone.classList.remove("bi-eye-slash-fill");
            icone.classList.add("bi-eye-fill");

        }

    });

});