<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criação de Classes</title>

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

    @vite(['resources/js/cadastro_classe.js'])
</head>

<body class="bg-light">

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center p-3">

        <div class="row bg-white rounded-4 shadow-sm w-100"
            style="max-width: 650px;">

            <div class="col-12 p-4 p-md-5">

                <!-- Título -->
                <h2 class="text-center fw-bold mb-4">
                    Criação de Classe
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

                <!-- Vida Base -->
                <div class="mb-3">
                    <label for="vida_base" class="form-label fw-semibold">
                        Vida Base
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="vida_base"
                        name="vida_base">
                </div>

                <!-- Bônus de Força -->
                <div class="mb-3">
                    <label for="bonus_forca" class="form-label fw-semibold">
                        Bônus de Força
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="bonus_forca"
                        name="bonus_forca">
                </div>

                <!-- Bônus de Vigor -->
                <div class="mb-3">
                    <label for="bonus_vigor" class="form-label fw-semibold">
                        Bônus de Vigor
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="bonus_vigor"
                        name="bonus_vigor">
                </div>

                <!-- Bônus de Agilidade -->
                <div class="mb-3">
                    <label for="bonus_agilidade" class="form-label fw-semibold">
                        Bônus de Agilidade
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="bonus_agilidade"
                        name="bonus_agilidade">
                </div>

                <!-- Bônus de Magia -->
                <div class="mb-3">
                    <label for="bonus_magia" class="form-label fw-semibold">
                        Bônus de Magia
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="bonus_magia"
                        name="bonus_magia">
                </div>

                <!-- Bônus de Inteligência -->
                <div class="mb-3">
                    <label for="bonus_inteligencia" class="form-label fw-semibold">
                        Bônus de Inteligência
                    </label>

                    <input type="number"
                        class="form-control rounded-3"
                        id="bonus_inteligencia"
                        name="bonus_inteligencia">
                </div>

                <!-- Botão -->
                <div class="d-flex justify-content-center mt-4">
                    <button id="criar_classe"
                        type="button"
                        class="btn btn-warning text-dark rounded-5 px-4 py-2 fw-bold">
                        Criar Classe
                    </button>
                </div>

            </div>

        </div>

    </div>

</body>

</html>