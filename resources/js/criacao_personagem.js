$(document).ready(function () {
    let pontos = 5;


    let forca = 10;
    let vigor = 10;
    let agilidade = 10;
    let magia = 10;
    let inteligencia = 10;


    function atualizarAtributos() {
        $('#forca').text(forca);
        $('#vigor').text(vigor);
        $('#agilidade').text(agilidade);
        $('#magia').text(magia);
        $('#inteligencia').text(inteligencia);
        $('#pontos').text(pontos);
    };

    $("#mais_forca").click(function () {
        if (pontos > 0) {
            forca++;
            pontos--;
            atualizarAtributos();
        } else {
            alert("Você não tem mais pontos para distribuir.");
        }
    });

    $("#mais_vigor").click(function () {
        if (pontos > 0) {
            vigor++;
            pontos--;
            atualizarAtributos();
        } else {
            alert("Você não tem mais pontos para distribuir.");
        }
    });

    $("#mais_agilidade").click(function () {
        if (pontos > 0) {
            agilidade++;
            pontos--;
            atualizarAtributos();
        } else {
            alert("Você não tem mais pontos para distribuir.");
        }
    });

    $("#mais_magia").click(function () {
        if (pontos > 0) {
            magia++;
            pontos--;
            atualizarAtributos();
        } else {
            alert("Você não tem mais pontos para distribuir.");
        }
    });

    $("#mais_inteligencia").click(function () {
        if (pontos > 0) {
            inteligencia++;
            pontos--;
            atualizarAtributos();
        } else {
            alert("Você não tem mais pontos para distribuir.");
        }
    });

    $("#menos_forca").click(function () {
        if (forca > 0) {
            forca--;
            pontos++;
            atualizarAtributos();
        }
    });

    $("#menos_vigor").click(function () {
        if (vigor > 0) {
            vigor--;
            pontos++;
            atualizarAtributos();
        }
    });

    $("#menos_agilidade").click(function () {
        if (agilidade > 0) {
            agilidade--;
            pontos++;
            atualizarAtributos();
        }
    });

    $("#menos_magia").click(function () {
        if (magia > 0) {
            magia--;
            pontos++;
            atualizarAtributos();
        }
    });

    $("#menos_inteligencia").click(function () {
        if (inteligencia > 0) {
            inteligencia--;
            pontos++;
            atualizarAtributos();
        }
    });

    let vidaMaxima = 50 + (vigor * 5);
    let vidaAtual = vidaMaxima;

    atualizarAtributos();

    function lerCookie(nome) {
        let cookies = document.cookie.split(";");

        for (let cookie of cookies) {
            let partes = cookie.trim().split("=");

            if (partes[0] === nome) {
                return decodeURIComponent(partes.slice(1).join("="));
            }
        }

        return null;
    }

    console.log("ID do usuário:", lerCookie("user_id"));

    $("#btn_criar").click(function () {
        $.ajax({
            url: 'api/cadastro_personagem',
            method: 'POST',
            data: {
                user_id: lerCookie("user_id"),
                nome: $('#nome_personagem').val(),
                raca_id: $('#raca').val(),
                classe_id: $('#classe').val(),
                forca: forca,
                vigor: vigor,
                agilidade: agilidade,
                magia: magia,
                inteligencia: inteligencia,
                nivel: 1,
                experiencia: 0,
                vida_atual: vidaAtual,
                vida_maxima: vidaMaxima,
                pontos: pontos
            },
            success: function (response) {
                alert("Personagem criado com sucesso!");
            },
            error: function (xhr) {
                console.log("Status:", xhr.status);
                console.log("Resposta:", xhr.responseJSON);

                if (xhr.status === 422) {
                    let erros = xhr.responseJSON.errors;

                    for (let campo in erros) {
                        console.log(campo + ": " + erros[campo][0]);
                    }

                    alert("Verifique os campos obrigatórios do personagem.");
                } else {
                    alert("Erro ao criar personagem.");
                }
            }
        });
    });
});