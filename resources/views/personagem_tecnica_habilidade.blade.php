<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallen Realms - Habilidades</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --fr-gold: #e0a526;
            --fr-bg: #0e0e10;
            --fr-surface: #17171a;
            --fr-surface-2: #212126;
            --fr-border: #34343b;
        }

        body {
            background: var(--fr-bg);
            color: #f5f5f5;
            font-family: 'Source Sans 3', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        .fr-title {
            font-family: 'Cinzel', Georgia, serif;
        }

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
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .fr-gold {
            color: var(--fr-gold);
        }

        .form-select {
            background-color: var(--fr-surface-2);
            color: #f5f5f5;
            border-color: var(--fr-border);
            border-radius: .65rem;
            padding: .7rem;
        }

        .form-select:focus {
            border-color: var(--fr-gold);
            box-shadow: 0 0 0 .2rem rgba(224, 165, 38, .2);
        }

        .fr-choice {
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .8rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .fr-badge {
            background: rgba(224, 165, 38, .14);
            color: var(--fr-gold);
            border: 1px solid rgba(224, 165, 38, .4);
        }

        .btn-warning {
            background: var(--fr-gold);
            border-color: var(--fr-gold);
            color: #17130b;
        }

        .btn-outline-warning {
            border-color: var(--fr-gold);
            color: var(--fr-gold);
        }

        .btn-outline-warning:hover {
            background: var(--fr-gold);
            color: #17130b;
        }
    </style>
</head>

<body>
    <main class="container py-4 py-lg-5">

        <header class="text-center mb-5">
            <h1 class="fr-gold fw-bold">Fallen Realms</h1>
            <h2 class="h4 mb-2">Habilidades e Técnicas</h2>
            <p class="text-secondary">Prepare seu personagem para a jornada.</p>
        </header>

        <!-- Informações do personagem -->
        <section class="card fr-card mb-4">
            <div class="card-body">
                <div class="row align-items-center g-3">
                    <div class="col-md">
                        <span class="text-secondary">PERSONAGEM</span>
                        <input type="hidden" value="{{$personagem->id}}">
                        <h3 class="fr-gold mb-2">{{ $personagem->nome }}</h3>
                        <span class="badge fr-badge me-2">{{ $personagem->classe }}</span>
                        <span class="badge fr-badge">{{ $personagem->raca }}</span>
                    </div>
                    <div class="col-md-auto">
                        <span class="badge bg-warning text-dark fs-6">
                            Nível
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <form id="form_habilidades">

            <div class="row g-4">
                <!-- Habilidades disponíveis -->
                <div class="col-12 col-lg-6">
                    <section class="card fr-card h-100">
                        <div class="card-body">
                            <h3 class="fr-section-title">
                                <i class="bi bi-stars me-2"></i>
                                Habilidades da sua classe
                            </h3>

                            <p class="text-secondary">
                                Estas são as habilidades que seu personagem pode aprender.
                            </p>


                            @foreach ($habilidades as $habilidade)
                            <div class="fr-choice">
                                <input
                                    class="form-check-input habilidade"
                                    type="checkbox"
                                    value="{{$habilidade->habilidade_id}}"
                                    id="habilidade_{{ $habilidade->habilidade_id }}"
                                    name="habilidades[]">
                                <div class="fw-bold fr-gold">
                                    {{ $habilidade->nome }}
                                </div>

                                <p class="text-secondary mb-0 mt-1">
                                    {{ $habilidade->descricao ?? 'Sem descrição cadastrada.' }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                <!-- Escolha das combinações -->
                <div class="col-12 col-lg-6">
                    <section class="card fr-card h-100">
                        <div class="card-body">
                            <h3 class="fr-section-title">
                                <i class="bi bi-lightning-charge me-2"></i>
                                Suas combinações
                            </h3>

                            <p class="text-secondary">
                                Escolha uma habilidade da classe e uma técnica para cada combinação.
                                As técnicas são compartilhadas entre todas as classes e raças.
                            </p>

                            <div id="lista_combinacoes"></div>

                            <button type="button" id="btn_adicionar"
                                class="btn btn-outline-warning w-100 mt-2">
                                <i class="bi bi-plus-circle me-1"></i>
                                Adicionar combinação
                            </button>

                            <hr class="border-secondary my-4">

                            <button type="submit" id="btn_salvar"
                                class="btn btn-warning w-100 py-3 fw-bold">
                                <i class="bi bi-check-circle me-2"></i>
                                SALVAR ESCOLHAS
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </main>

</body>

</html>