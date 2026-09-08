$(document).ready(function() {

    $('#login_usuario').click(function() {
        $.ajax({
            url: 'api/login',
            type: 'POST',
            data: {
                email: $('#email').val(),
                senha: $('#senha').val(),
            },
            success: function(response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Login realizado com sucesso!',
                    }).then(() => {
                        window.location.href = '/menu_principal';
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