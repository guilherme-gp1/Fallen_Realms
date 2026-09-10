$(document).ready(function () {
    $('#criar_tecnica').click(function () {

        console.log('Dados enviados:');

        $.ajax({
            url: 'api/cadastro_tecnica',
            type: 'POST',
            data: {
                nome: $('#nome').val(),
                descricao: $('#descricao').val(),
                tipo: $('#tipo').val(),
                dano: $('#dano').val(),
                custo: $('#custo').val(),
                cooldown: $('#cooldown').val(),
                nivel_minimo: $('#nivel_minimo').val(),
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Técnica cadastrada com sucesso!',
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