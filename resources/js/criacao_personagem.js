$(document).ready(function () {

    $('#classe').change(function () {

        let classe_id = $(this).val();

        $('#habilidades_classe').html(`
            <p class="text-secondary">
                Carregando habilidades...
            </p>
        `);

        $.ajax({

            url: '/api/habilidades_classe/' + classe_id,

            type: 'GET',

            success: function (habilidades) {

                $('#habilidades_classe').empty();

                if (habilidades.length === 0) {

                    $('#habilidades_classe').html(`
                        <p class="text-secondary">
                            Essa classe não possui habilidades cadastradas.
                        </p>
                    `);

                    return;
                }

                habilidades.forEach(function (habilidade) {

                    $('#habilidades_classe').append(`
                    
                        <div class="card bg-dark border-secondary mb-3">
                            
                            <div class="card-body">

                                <h5 class="text-warning">
                                    ${habilidade.nome}
                                </h5>

                                <p class="text-secondary">
                                    ${habilidade.descricao}
                                </p>

                                <small>

                                    <strong>Tipo:</strong>
                                    ${habilidade.tipo}

                                    <br>

                                    <strong>Valor:</strong>
                                    ${habilidade.valor}

                                    <br>

                                    <strong>Custo:</strong>
                                    ${habilidade.custo}

                                    <br>

                                    <strong>Cooldown:</strong>
                                    ${habilidade.cooldown} segundos

                                </small>

                            </div>

                        </div>

                    `);

                });

            },

            error: function (xhr) {

                console.log(xhr.responseJSON);

                $('#habilidades_classe').html(`
                    <p class="text-danger">
                        Erro ao carregar as habilidades.
                    </p>
                `);

            }

        });

    });

});