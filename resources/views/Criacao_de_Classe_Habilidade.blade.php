```html
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Classes e Habilidades</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="container py-5">

    <h1 class="mb-4">
        Configuração de Classes
    </h1>


    <!-- ========================= -->
    <!-- ESCOLHER CLASSE -->
    <!-- ========================= -->

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <h4 class="mb-3">
                Selecione uma classe
            </h4>

            <select
                id="classe_id"
                name="classe_id"
                class="form-select">

                <option value="">
                    Selecione uma classe
                </option>

                @foreach($classes as $classe)

                    <option value="{{ $classe->id }}">
                        {{ $classe->nome }}
                    </option>

                @endforeach

            </select>

        </div>

    </div>


    <!-- ========================= -->
    <!-- HABILIDADES -->
    <!-- ========================= -->

    <div class="card shadow-sm">

        <div class="card-body">

            <h4 class="mb-4">
                Habilidades
            </h4>


            <div class="row g-3">

                @foreach($habilidades as $habilidade)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100">

                            <div class="card-body">

                                <div class="form-check">

                                    <input
                                        class="form-check-input habilidade"
                                        type="checkbox"
                                        value="{{ $habilidade->id }}"
                                        id="habilidade_{{ $habilidade->id }}"
                                        name="habilidades[]">

                                    <label
                                        class="form-check-label"
                                        for="habilidade_{{ $habilidade->id }}">

                                        <strong>
                                            {{ $habilidade->nome }}
                                        </strong>

                                    </label>

                                </div>


                                <p class="text-muted mt-2 mb-2">
                                    {{ $habilidade->descricao }}
                                </p>


                                <small>

                                    <strong>Tipo:</strong>
                                    {{ $habilidade->tipo }}

                                    <br>

                                    <strong>Valor:</strong>
                                    {{ $habilidade->valor }}

                                    <br>

                                    <strong>Custo:</strong>
                                    {{ $habilidade->custo }}

                                    <br>

                                    <strong>Cooldown:</strong>
                                    {{ $habilidade->cooldown }} segundos

                                </small>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <!-- ========================= -->
            <!-- BOTÃO -->
            <!-- ========================= -->

            <button
                type="button"
                id="salvar"
                class="btn btn-primary mt-4">

                Salvar habilidades da classe

            </button>

        </div>

    </div>

</div>


<script>

$('#salvar').click(function() {

    let classe_id = $('#classe_id').val();

    let habilidades = [];

    $('.habilidade:checked').each(function() {

        habilidades.push($(this).val());

    });


    console.log('Classe:', classe_id);

    console.log('Habilidades:', habilidades);

});

</script>


</body>

</html>
```
