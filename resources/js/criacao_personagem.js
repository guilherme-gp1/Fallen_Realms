$(document).ready(function () {

    var pontos = 5;
    var forca = 10;
    var vigor = 10;
    var agilidade = 10;
    var magia = 10;
    var inteligencia = 10;

    $('#menos_forca').click(function () {
        if (forca > 0) {
            forca = forca - 1;
            pontos = pontos + 1;
            $('#forca').text(forca);
            $('#pontos').text(pontos);
        }
    });

    $('#menos_vigor').click(function () {
        if (vigor > 0) {
            vigor = vigor - 1;
            pontos = pontos + 1;
            $('#vigor').text(vigor);
            $('#pontos').text(pontos);
        }
    });

    $('#menos_agilidade').click(function () {
        if (agilidade > 0) {
            agilidade = agilidade - 1;
            pontos = pontos + 1;
            $('#agilidade').text(agilidade);
            $('#pontos').text(pontos);
        }
    });

    $('#menos_magia').click(function () {
        if (magia > 0) {
            magia = magia - 1;
            pontos = pontos + 1;
            $('#magia').text(magia);
            $('#pontos').text(pontos);
        }
    });

    $('#menos_inteligencia').click(function () {
        if (inteligencia > 0) {
            inteligencia = inteligencia - 1;
            pontos = pontos + 1;
            $('#inteligencia').text(inteligencia);
            $('#pontos').text(pontos);
        }
    });

    $('#mais_forca').click(function () {
        if (pontos > 0) {
            forca = forca + 1;
            pontos = pontos - 1;
            $('#forca').text(forca);
            $('#pontos').text(pontos);
        }
    });

    $('#mais_vigor').click(function () {
        if (pontos > 0) {
            vigor = vigor + 1;
            pontos = pontos - 1;
            $('#vigor').text(vigor);
            $('#pontos').text(pontos);
        }
    });

    $('#mais_agilidade').click(function () {
        if (pontos > 0) {
            agilidade = agilidade + 1;
            pontos = pontos - 1;
            $('#agilidade').text(agilidade);
            $('#pontos').text(pontos);
        }
    });

    $('#mais_magia').click(function () {
        if (pontos > 0) {
            magia = magia + 1;
            pontos = pontos - 1;
            $('#magia').text(magia);
            $('#pontos').text(pontos);
        }
    });

    $('#mais_inteligencia').click(function () {
        if (pontos > 0) {
            inteligencia = inteligencia + 1;
            pontos = pontos - 1;
            $('#inteligencia').text(inteligencia);
            $('#pontos').text(pontos);
        }
    });

    $('#btn_criar').click(function () {
        var vida_maxima = 100 + (vigor * 5);
        var vida_atual = vida_maxima;
        $.ajax({
            url: 'api/cadastro_personagem_status',
            type: 'POST',
            data: {
                nome: $('#nome_personagem').val(),
                classe_id: $('#classe').val(),
                raca_id: $('#raca').val(),
                nivel: 1,
                user_id: $.cookie('user_id'),
                experiencia: 0,
                pontos: pontos,
                forca: forca,
                vigor: vigor,
                agilidade: agilidade,
                magia: magia,
                inteligencia: inteligencia,
                vida_atual: vida_atual,
                vida_maxima: vida_maxima
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Personagem criado com sucesso!',
                    })

                    setTimeout(function () {
                        window.location.href = '/menu_principal';
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: response['mensagem'],
                    });

                }
            },
            error: function (xhr) {
                console.log('Status:', xhr.status);
                console.log('Erros de validação:', xhr.responseJSON?.errors);
                console.log('Resposta completa:', xhr.responseJSON);
            }
        });
    });
});