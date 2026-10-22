$(document).ready(function(){
    $('#btn_salvar').click(function(){
        let habilidades = []
        let tecnicas = []

        $('.habilidade:checked').each(function(){
            habilidades.push($(this).val());
        });

        $('.tecnica:checked').each(function(){
            tecnicas.push($(this).val());
        });

        $.ajax([
            
        ])
    })
})