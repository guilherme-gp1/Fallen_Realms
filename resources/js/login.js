$(document).ready(function () {

    console.log($.cookie('token_usuario'));

    $('#login_usuario').click(function () {
        $.ajax({
            url: 'api/login',
            type: 'POST',
            data: {
                email: $('#email').val(),
                senha: $('#senha').val(),
            },
            success: function (response) {
                if (response['erro'] == 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Login realizado com sucesso!',
                    })
                    
                    $.cookie("token_usuario", response['token'], { expires: 7, path: '/' });

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
            }
        });
    });

});