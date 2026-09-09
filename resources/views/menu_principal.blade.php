<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallen Realms - Menu</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/menu_principal.js'])
</head>

<body class="bg-dark">

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">

        <div class="text-center">

            <h1 class="text-warning fw-bold mb-5">
                FALLEN REALMS
            </h1>

            <div class="d-flex flex-column gap-3">

                <button id="btn_jogar" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    JOGAR
                </button>

                <button id="btn_personagem" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    PERSONAGEM
                </button>

                <button id="btn_perfil" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    PERFIL
                </button>

                <button id="btn_ranking" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    RANKING
                </button>

                <button id="btn_treinamento" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    TREINAMENTO
                </button>

                <button id="btn_configuracoes" type="button" class="btn btn-warning rounded-4 px-5 py-2 fw-bold">
                    CONFIGURAÇÕES
                </button>

                <button id="btn_sair" type="button" class="btn btn-danger rounded-4 px-5 py-2 fw-bold">
                    SAIR
                </button>

            </div>

        </div>

    </div>

</body>

</html>