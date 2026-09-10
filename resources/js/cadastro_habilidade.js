$(document).ready(function () {
    $('#criar_habilidade').click(function () {

        console.log('Dados enviados:');

        $.ajax({
            url: 'api/cadastro_habilidade',
            type: 'POST',
            data: {
                nome: $('#nome').val(),
                descricao: $('#descricao').val(),
                tipo: $('#tipo').val(),
                valor: $('#valor').val(),
                custo: $('#custo').val(),
                cooldown: $('#cooldown').val(),
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Usuário cadastrado com sucesso!',
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