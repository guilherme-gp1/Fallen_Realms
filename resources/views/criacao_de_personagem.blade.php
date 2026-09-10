<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallen Realms - Criação de Personagem</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/criacao_personagem.js'])
</head>


<body class="bg-dark text-light">


    <!-- =========================================
         TÍTULO
    ========================================== -->

    <div class="container py-4">

        <div class="text-center">

            <h1 class="text-warning fw-bold">
                FALLEN REALMS
            </h1>

            <h3 class="mt-3">
                Criação de Personagem
            </h3>

            <p class="text-secondary">
                Crie seu personagem e prepare-se para sua jornada.
            </p>

        </div>


        <!-- =========================================
             CONTAINER PRINCIPAL
        ========================================== -->

        <div class="container mt-4">

            <div class="row g-4 justify-content-center">


                <!-- =================================
                     INFORMAÇÕES
                ================================== -->

                <div class="col-lg-4">


                    <!-- NOME -->

                    <div class="card bg-black border-secondary rounded-5 mb-4">

                        <div class="card-body p-4">

                            <label for="nome_personagem"
                                class="form-label text-warning fw-bold">

                                Nome do personagem

                            </label>

                            <input type="text"
                                id="nome_personagem"
                                class="form-control rounded-5"
                                placeholder="Digite o nome">

                        </div>

                    </div>



                    <!-- RAÇA -->

                    <div class="card bg-black border-secondary rounded-5 mb-4">

                        <div class="card-body p-4">

                            <label for="raca"
                                class="form-label text-warning fw-bold">

                                Raça

                            </label>

                            <select id="raca"
                                class="form-select rounded-5">

                                <option value="Escolha_r">
                                    Escolha Uma Raça
                                </option>

                                @foreach($racas as $raca)

                                <option value="{{ $raca->id }}">
                                    {{ $raca->nome }}
                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>



                    <!-- CLASSE -->

                    <div class="card bg-black border-secondary rounded-5">

                        <div class="card-body p-4">

                            <label for="classe"
                                class="form-label text-warning fw-bold">

                                Classe

                            </label>

                            <select id="classe"
                                class="form-select rounded-5">


                                <option value="Escolha">
                                    Escolha Uma Classe
                                </option>

                                @foreach($classes as $classe)

                                <option value="{{ $classe->id }}">
                                    {{ $classe->nome }}
                                </option>

                                @endforeach
                            </select>

                        </div>

                    </div>

                    <!-- Habilidade -->

                    <div class="card bg-black border-secondary rounded-5 mt-4">

                        <div class="card-body p-4">

                            <h4 class="text-warning fw-bold mb-3">
                                Habilidades da Classe
                            </h4>

                            <div id="habilidades_classe">
                                <p class="text-secondary">
                                    Escolha uma classe para ver suas habilidades.
                                </p>
                            </div>

                        </div>

                    </div>


                </div>



                <!-- =================================
                     PERSONAGEM
                ================================== -->

                <div class="col-lg-4">

                    <div class="card bg-black border-secondary rounded-5 h-100">

                        <div class="card-body d-flex flex-column align-items-center justify-content-center">


                            <!-- NOME -->

                            <div class="bg-secondary text-dark
                                        rounded-5
                                        px-4 py-2
                                        mb-4">

                                <h4 class="mb-0">
                                    Seu Personagem
                                </h4>

                            </div>


                            <!-- AVATAR -->

                            <div class="rounded-circle
                                        bg-secondary
                                        d-flex
                                        align-items-center
                                        justify-content-center
                                        p-5
                                        mb-4">

                                <i class="bi bi-person-fill text-dark display-1"></i>

                            </div>


                            <!-- CLASSE -->

                            <h4 id="classe_visual"
                                class="text-warning fw-bold">

                                Escolha uma classe

                            </h4>


                            <!-- RAÇA -->

                            <p id="raca_visual"
                                class="text-secondary">

                                Escolha uma raça

                            </p>


                            <!-- NÍVEL -->

                            <span class="badge bg-warning text-dark rounded-5 px-3 py-2">

                                Nível 1

                            </span>


                        </div>

                    </div>

                </div>



                <!-- =================================
                     ATRIBUTOS
                ================================== -->

                <div class="col-lg-4">

                    <div class="card bg-black border-secondary rounded-5 h-100">

                        <div class="card-body p-4">


                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <h4 class="text-warning fw-bold mb-0">
                                    Atributos
                                </h4>

                                <span class="badge bg-warning text-dark rounded-5">
                                    Pontos:
                                    <span id="pontos">
                                        10
                                    </span>
                                </span>

                            </div>



                            <!-- FORÇA -->

                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>

                                    <i class="bi bi-lightning-fill text-warning me-2"></i>

                                    Força

                                </div>

                                <div class="d-flex align-items-center gap-2">

                                    <button id="menos_forca"
                                        class="btn btn-danger rounded-circle">

                                        <i class="bi bi-dash"></i>

                                    </button>

                                    <span id="forca"
                                        class="fw-bold fs-5">

                                        10

                                    </span>

                                    <button id="mais_forca"
                                        class="btn btn-success rounded-circle">

                                        <i class="bi bi-plus"></i>

                                    </button>

                                </div>

                            </div>



                            <!-- VIGOR -->

                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>

                                    <i class="bi bi-shield-fill text-warning me-2"></i>

                                    VIGOR

                                </div>

                                <div class="d-flex align-items-center gap-2">

                                    <button id="menos_vigor"
                                        class="btn btn-danger rounded-circle">

                                        <i class="bi bi-dash"></i>

                                    </button>

                                    <span id="vigor"
                                        class="fw-bold fs-5">

                                        10

                                    </span>

                                    <button id="mais_vigor"
                                        class="btn btn-success rounded-circle">

                                        <i class="bi bi-plus"></i>

                                    </button>

                                </div>

                            </div>



                            <!-- AGILIDADE -->

                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>

                                    <i class="bi bi-wind text-warning me-2"></i>

                                    Agilidade

                                </div>

                                <div class="d-flex align-items-center gap-2">

                                    <button id="menos_agilidade"
                                        class="btn btn-danger rounded-circle">

                                        <i class="bi bi-dash"></i>

                                    </button>

                                    <span id="agilidade"
                                        class="fw-bold fs-5">

                                        10

                                    </span>

                                    <button id="mais_agilidade"
                                        class="btn btn-success rounded-circle">

                                        <i class="bi bi-plus"></i>

                                    </button>

                                </div>

                            </div>



                            <!-- MAGIA -->

                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>

                                    <i class="bi bi-stars text-warning me-2"></i>

                                    Magia

                                </div>

                                <div class="d-flex align-items-center gap-2">

                                    <button id="menos_magia"
                                        class="btn btn-danger rounded-circle">

                                        <i class="bi bi-dash"></i>

                                    </button>

                                    <span id="magia"
                                        class="fw-bold fs-5">

                                        10

                                    </span>

                                    <button id="mais_magia"
                                        class="btn btn-success rounded-circle">

                                        <i class="bi bi-plus"></i>

                                    </button>

                                </div>

                            </div>

                            <!-- INTELIGÊNCIA -->

                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>

                                    <i class="bi bi-stars text-warning me-2"></i>

                                    Inteligência

                                </div>

                                <div class="d-flex align-items-center gap-2">

                                    <button id="menos_inteligencia"
                                        class="btn btn-danger rounded-circle">

                                        <i class="bi bi-dash"></i>

                                    </button>

                                    <span id="inteligencia"
                                        class="fw-bold fs-5">

                                        10

                                    </span>

                                    <button id="mais_inteligencia"
                                        class="btn btn-success rounded-circle">

                                        <i class="bi bi-plus"></i>

                                    </button>

                                </div>

                            </div>



                            <hr class="border-secondary">


                            <!-- CRIAR -->

                            <button id="btn_criar"
                                class="btn btn-warning
                                       rounded-5
                                       w-100
                                       py-3
                                       fw-bold
                                       mt-2">

                                <i class="bi bi-check-circle me-2"></i>

                                CRIAR PERSONAGEM

                            </button>


                            <!-- VOLTAR -->

                            <button id="btn_voltar"
                                class="btn btn-outline-secondary
                                       rounded-5
                                       w-100
                                       mt-3">

                                Voltar

                            </button>


                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>


</body>

</html>