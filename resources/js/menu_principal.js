$(document).ready(function () {
    $('#btn_personagem').click(function () {
        window.location.href = '/criar_personagem';
    });

    $('.btn').hover(
        function () {
            $(this).css('transform', 'scale(1.1)');
        },
        function () {
            $(this).css('transform', 'scale(1)');
        }
    );
});