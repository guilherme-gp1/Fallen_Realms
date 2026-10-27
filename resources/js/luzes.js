$(document).ready(function () {

    $.ajax({
        url: "http://10.122.41.198/led/status",
        method: 'GET',
        success: function (response) {
            alert(
                "vermelho: " + response.vermelho + "\n" +
                "verde: " + response.verde + "\n" +
                "amarela: " + response.amarelo
            );
            console.log(response);
        },
        error: function (error) {
            console.error(error);
        }
    });

    $("#desligar_todas").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/desligartodos",
            method: "POST",
            success: function (response) {
                alert("Todas as luzes desligadas com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#ligar_todas").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/ligartodos",
            method: "POST",
            success: function (response) {
                alert("Todas as luzes ligadas com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });


    $("#ligar_vermelho").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/ligarvermelho",
            method: "POST",
            success: function (response) {
                alert("Luz vermelha ligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#ligar_verde").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/ligarverde",
            method: "POST",
            success: function (response) {
                alert("Luz verde ligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#ligar_amarela").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/ligaramarelo",
            method: "POST",
            success: function (response) {
                alert("Luz amarela ligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#desligar_vermelho").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/desligarvermelho",
            method: "POST",
            success: function (response) {
                alert("Luz vermelha desligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#desligar_verde").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/desligarverde",
            method: "POST",
            success: function (response) {
                alert("Luz verde desligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $("#desligar_amarela").click(function () {
        $.ajax({
            url: "http://10.122.41.198/led/desligaramarelo",
            method: "POST",
            success: function (response) {
                alert("Luz amarela desligada com sucesso!");
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $

});