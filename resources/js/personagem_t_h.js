$(document).ready(function () {
    $('#btn_salvar').click(function () {
        let habilidades = []
        let tecnicas = []

        $('.habilidade:checked').each(function () {
            habilidades.push($(this).val());
        });

        $('.tecnica:checked').each(function () {
            tecnicas.push($(this).val());
        });

        $.ajax({
            url: 'api/salvar_personagem_t_h',
            method: 'POST',
            data: {
                personagem_id: $('#personagem_id').val(),
                habilidades: habilidades,
                tecnicas: tecnicas
            },
            success: function (response) {
                if (response.erro === 'n') {
                    alert(response.mensagem);
                } else {
                    alert(response.mensagem);
                }
            },
            error: function () {
                alert('Erro ao salvar personagem.');
            }
    });
    })
})