$(document).ready(function () {
    $('#btn_criar').click(function () {
        alert('Botão Criar Personagem clicado!');
    });

    let pontos = 10

    let atributos = {
        forca: 10,
        inteligencia: 10,
        vigor: 10,
        agilidade: 10,
        magia: 10,
    }

    function atualizarAtributos() {
        $('#forca').text(atributos.forca);
        $('#inteligencia').text(atributos.inteligencia);
        $('#vigor').text(atributos.vigor);
        $('#agilidade').text(atributos.agilidade);
        $('#magia').text(atributos.magia);
        $('#pontos').text(pontos);
    }

    $('#mais_forca').click(function () {
        if (pontos <= 0) {
            return;
        }

        atributos[atributos.forca]++;
        pontos--;

        atualizarAtributos();
    });

    $('#mais_inteligencia').click(function () {
        if (pontos <= 0) {
            return;
        }

        atributos[atributos.inteligencia]++;
        pontos--;

        atualizarAtributos();
    });

    $('#mais_vigor').click(function () {
        if (pontos <= 0) {
            return;
        }

        atributos[atributos.vigor]++;
        pontos--;

        atualizarAtributos();
    });

    $('#mais_agilidade').click(function () {
        if (pontos <= 0) {
            return;
        }

        atributos[atributos.agilidade]++;
        pontos--;

        atualizarAtributos();
    });

    $('#mais_magia').click(function () {
        if (pontos <= 0) {
            return;
        }

        atributos[atributos.magia]++;
        pontos--;

        atualizarAtributos();
    });
});