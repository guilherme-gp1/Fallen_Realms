$(document).ready(function () {

    $("#ligar_vermelho").click(function () {
        $.ajax({
            url: "http://10.122.41.191/led/ligarvermelho",
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
            url: "http://10.122.41.191/led/ligarverde",
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
            url: "http://10.122.41.191/led/ligaramarelo",
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
            url: "http://10.122.41.191/led/desligarvermelho",
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
            url: "http://10.122.41.191/led/desligarverde",
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
            url: "http://10.122.41.191/led/desligaramarelo",
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