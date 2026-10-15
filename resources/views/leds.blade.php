<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Luzes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/luzes.js'])
</head>

<body>


    <body>

        <h2 class="text-center my-4">Luzes</h2>

        <div class="container">
            <div class="row justify-content-center g-3">

                <div class="col-12 col-md-4">
                    <button id="ligar_vermelho" class="btn btn-danger w-100">
                        Ligar Luz Vermelha
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="ligar_verde" class="btn btn-success w-100">
                        Ligar Luz Verde
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="ligar_amarela" class="btn btn-warning w-100">
                        Ligar Luz Amarela
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="desligar_vermelho" class="btn btn-outline-danger w-100">
                        Desligar Luz Vermelha
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="desligar_verde" class="btn btn-outline-success w-100">
                        Desligar Luz Verde
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="desligar_amarela" class="btn btn-outline-warning w-100">
                        Desligar Luz Amarela
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="ligar_todas" class="btn btn-outline-secondary w-100">
                        Ligar Todas
                    </button>
                </div>

                <div class="col-12 col-md-4">
                    <button id="desligar_todas" class="btn btn-outline-secondary w-100">
                        Desligar Todas
                    </button>
                </div>

            </div>
        </div>

    </body>

</body>

</html>