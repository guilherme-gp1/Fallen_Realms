<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criação de Técnicas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/js/cadastro_tecnica.js'])
</head>

<body class="bg-light">

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center p-3">

        <div class="row bg-white rounded-4 shadow-sm w-100"
            style="max-width: 650px;">

            <div class="col-12 p-4 p-md-5">

                <!-- Título -->
                <h2 class="text-center fw-bold mb-4">
                    Criação de Técnica
                </h2>

                <!-- Círculo -->
                <div class="d-flex justify-content-center mb-4">
                    <div class="circulo"></div>
                </div>

                <!-- Nome -->
                <div class="mb-3">
                    <label for="nome" class="form-label fw-semibold">
                        Nome
                    </label>

                    <input type="text"
                        class="form-control rounded-3"
                        id="nome"
                        name="nome">
                </div>

                <!-- Descrição -->
                <div class="mb-3">
                    <label for="descricao" class="form-label fw-semibold">
                        Descrição
                    </label>

                    <input type="text"
                        class="form-control rounded-3"
                        id="descricao"
                        name="descricao">
                </div>

                <!-- Tipo -->
                <div class="mb-3">
                    <label for="tipo" class="form-label fw-semibold">
                        Tipo
                    </label>

                    <input type="text"
                        class="form-control rounded-3"
                        id="tipo"
                        name="tipo">
                </div>

                <!-- Dano -->
                <div class="mb-3">
                    <label for="dano" class="form-label fw-semibold">
                        Dano
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="dano"
                        name="dano">
                </div>

                <!-- Custo -->
                <div class="mb-3">
                    <label for="custo" class="form-label fw-semibold">
                        Custo da Habilidade
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="custo"
                        name="custo">
                </div>

                <!-- Nível mínimo -->
                <div class="mb-3">
                    <label for="nivel_minimo" class="form-label fw-semibold">
                        Nível Mínimo
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="nivel_minimo"
                        name="nivel_minimo">
                </div>

                <!-- Cooldown -->
                <div class="mb-3">
                    <label for="cooldown" class="form-label fw-semibold">
                        Cooldown
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="cooldown"
                        name="cooldown">
                </div>

                <!-- Botão -->
                <div class="d-flex justify-content-center mt-3">
                    <button id="criar_tecnica"
                        type="button"
                        class="btn btn-warning text-dark rounded-5 px-4 py-2 fw-bold">
                        Criar Técnica
                    </button>
                </div>

            </div>

        </div>

    </div>

</body>

</html>