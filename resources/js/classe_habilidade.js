$(document).ready(function () {
    $('#salvar').click(function () {

        let habilidades = []

        $('.habilidade:checked').each(function () {
            habilidades.push($(this).val());
        });
        $.ajax({
            url: 'api/cadastro_classe_habilidade',
            type: 'POST',
            data: {
                classe_id: $('#classe_id').val(),
                habilidades: habilidades
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: response['mensagem'],
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: response['mensagem'],
                    });
                }
            }
        })
    });
});