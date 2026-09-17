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

<body
    style="
        background-image: url('{{ asset('img/background-login.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    ">

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center p-3">

        <div class="row bg-dark bg-opacity-75 justify-content-center w-100 shadow-lg rounded-4 overflow-hidden"
            style="max-width: 450px;">

            <div class="col-12 text-center p-4 p-md-5">

                <!-- Título -->
                <h1 class="text-warning fw-bold mb-4 display-6">
                    FALLEN REALMS
                </h1>

                <!-- Linha decorativa -->
                <div class="border-bottom border-warning mb-4"></div>

                <!-- Botões do menu -->
                <div class="d-flex flex-column gap-3">

                    <button id="btn_jogar" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-controller me-2"></i>
                        JOGAR
                    </button>

                    <button id="btn_personagem" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-person-fill me-2"></i>
                        PERSONAGEM
                    </button>

                    <button id="btn_perfil" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-person-circle me-2"></i>
                        PERFIL
                    </button>

                    <button id="btn_ranking" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-trophy-fill me-2"></i>
                        RANKING
                    </button>

                    <button id="btn_treinamento" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-shield-fill me-2"></i>
                        TREINAMENTO
                    </button>

                    <button id="btn_configuracoes" type="button"
                        class="btn btn-warning text-dark rounded-3 w-100 py-3 fw-bold">
                        <i class="bi bi-gear-fill me-2"></i>
                        CONFIGURAÇÕES
                    </button>

                    <hr class="border-warning my-2">

                    <button id="btn_sair" type="button"
                        class="btn btn-outline-danger rounded-3 w-100 py-2 fw-bold">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        SAIR
                    </button>

                </div>

            </div>

        </div>

    </div>

</body>

</html>