$(document).ready(function () {
    $('#criar_raca').click(function () {

        console.log('Dados enviados:');

        $.ajax({
            url: 'api/cadastro_raca',
            type: 'POST',
            data: {
                nome: $('#nome').val(),
                descricao: $('#descricao').val(),
                vida_base: $('#vida_base').val(),
                bonus_forca: $('#bonus_forca').val(),
                bonus_vigor: $('#bonus_vigor').val(),
                bonus_agilidade: $('#bonus_agilidade').val(),
                bonus_magia: $('#bonus_magia').val(),
                bonus_inteligencia: $('#bonus_inteligencia').val(),
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Raça cadastrada com sucesso!',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: response['mensagem'],
                    });
                }
            }
        });
    });
});