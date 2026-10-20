<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallen Realms - Criação de Personagem</title>

    <!-- Fontes: Cinzel (títulos) + Source Sans 3 (texto) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Source+Sans+3:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>
    @vite(['resources/js/criacao_personagem.js'])

    <style>
        :root {
            --fr-gold: #e0a526;
            --fr-bg: #0e0e10;
            --fr-surface: #17171a;
            --fr-surface-2: #212126;
            --fr-border: #34343b;
            --bs-body-bg: var(--fr-bg);
            --bs-body-font-family: 'Source Sans 3', system-ui, -apple-system, 'Segoe UI', sans-serif;
            --bs-body-font-size: 1.05rem;
            --bs-body-line-height: 1.55;
        }

        body {
            background: var(--fr-bg);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .fr-title {
            font-family: 'Cinzel', Georgia, serif;
            letter-spacing: .02em;
        }

        /* Cards padronizados */
        .fr-card {
            background: var(--fr-surface);
            border: 1px solid var(--fr-border);
            border-radius: 1rem;
        }

        .fr-card .card-body {
            padding: 1.5rem;
        }

        .fr-section-title {
            color: var(--fr-gold);
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
        }

        /* Campos */
        .form-label {
            font-weight: 600;
            margin-bottom: .35rem;
        }

        .form-control,
        .form-select {
            background-color: var(--fr-surface-2);
            border-color: var(--fr-border);
            border-radius: .65rem;
            padding: .6rem .85rem;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: var(--fr-surface-2);
            border-color: var(--fr-gold);
            box-shadow: 0 0 0 .2rem rgba(224, 165, 38, .25);
        }

        /* Preview do personagem */
        .fr-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: var(--fr-surface-2);
            border: 2px solid var(--fr-gold);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fr-avatar i {
            font-size: 5rem;
            color: var(--fr-gold);
        }

        /* Habilidades */
        .fr-skill {
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .85rem;
        }

        .fr-stat {
            background: var(--fr-surface);
            border: 1px solid var(--fr-border);
            border-radius: .6rem;
            padding: .5rem .25rem;
        }

        .fr-stat-label {
            font-size: .8rem;
            color: var(--bs-secondary-color);
        }

        .fr-stat-value {
            font-weight: 700;
        }
    </style>
</head>

<body>


    <main class="container py-4 py-lg-5">

        <!-- ================= TÍTULO ================= -->
        <header class="text-center mb-5">
            <h1 class="text-warning fw-bold mb-2">Fallen Realms</h1>
            <h2 class="h4 mb-2">Criação de Personagem</h2>
            <p class="text-body-secondary mb-0">Crie seu personagem e prepare-se para sua jornada.</p>
        </header>

        <!-- ================= LINHA PRINCIPAL (3 colunas de mesma altura) ================= -->
        <div class="row g-4">

            <!-- IDENTIDADE -->
            <div class="col-12 col-lg-4">
                <div class="card fr-card h-100">
                    <div class="card-body">

                        <h3 class="fr-section-title">Identidade</h3>

                        <div class="mb-3">
                            <label for="nome_personagem" class="form-label">Nome do personagem</label>
                            <input type="text" id="nome_personagem" class="form-control" placeholder="Digite o nome"
                                maxlength="40" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="raca" class="form-label">Raça</label>
                            <select id="raca" class="form-select">
                                <option value="Escolha_r">Escolha uma raça</option>
                                @foreach ($racas as $raca)
                                <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="classe" class="form-label">Classe</label>
                            <select id="classe" class="form-select">
                                <option value="Escolha">Escolha uma classe</option>
                                @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <!-- PERSONAGEM -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card fr-card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">

                        <h3 id="nome_visual" class="h4 mb-4">Seu personagem</h3>

                        <div class="fr-avatar mb-4">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <h4 id="classe_visual" class="text-warning fw-bold mb-1">Escolha uma classe</h4>
                        <p id="raca_visual" class="text-body-secondary mb-3">Escolha uma raça</p>

                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fs-6">Nível 1</span>

                    </div>
                </div>
            </div>

            <!-- ATRIBUTOS -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card fr-card h-100">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="text-warning fw-bold mb-0">
                                Atributos
                            </h4>

                            <span class="badge bg-warning text-dark rounded-5">
                                Pontos:
                                <span id="pontos">
                                    5
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
                                <button id="menos_forca" class="btn btn-danger rounded-circle">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span id="forca" class="fw-bold fs-5">
                                    10
                                </span>
                                <button id="mais_forca" class="btn btn-success rounded-circle">
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
                                <button id="menos_vigor" class="btn btn-danger rounded-circle">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span id="vigor" class="fw-bold fs-5">
                                    10
                                </span>
                                <button id="mais_vigor" class="btn btn-success rounded-circle">
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
                                <button id="menos_agilidade" class="btn btn-danger rounded-circle">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span id="agilidade" class="fw-bold fs-5">
                                    10
                                </span>
                                <button id="mais_agilidade" class="btn btn-success rounded-circle">
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
                                <button id="menos_magia" class="btn btn-danger rounded-circle">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span id="magia" class="fw-bold fs-5">
                                    10
                                </span>
                                <button id="mais_magia" class="btn btn-success rounded-circle">
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
                                <button id="menos_inteligencia" class="btn btn-danger rounded-circle">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span id="inteligencia" class="fw-bold fs-5">
                                    10
                                </span>
                                <button id="mais_inteligencia" class="btn btn-success rounded-circle">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <hr class="border-secondary">

                        <!-- CRIAR -->
                        <button id="btn_criar" class="btn btn-warning rounded-5 w-100 py-3 fw-bold mt-2">
                            <i class="bi bi-check-circle me-2"></i>
                            CRIAR PERSONAGEM
                        </button>

                        <!-- VOLTAR -->
                        <button id="btn_voltar" class="btn btn-outline-secondary rounded-5 w-100 mt-3">
                            Voltar
                        </button>

                    </div>
                </div>
            </div>

        </div>

    </main>

</body>

</html>