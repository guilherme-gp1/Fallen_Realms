<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallen Realms - Jogo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Source+Sans+3:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        :root {
            --fr-gold: #e0a526;
            --fr-bg: #0e0e10;
            --fr-surface: #17171a;
            --fr-surface-2: #212126;
            --fr-border: #34343b;
            --fr-hp: #c0392b;
            --fr-mana: #2e86de;
            --fr-xp: #8e44ad;
            --bs-body-bg: var(--fr-bg);
            --bs-body-font-family: 'Source Sans 3', system-ui, -apple-system, 'Segoe UI', sans-serif;
            --bs-body-font-size: 1rem;
            --bs-body-line-height: 1.5;
        }

        body {
            background: var(--fr-bg);
        }

        h1, h2, h3, h4, h5, h6, .fr-title {
            font-family: 'Cinzel', Georgia, serif;
            letter-spacing: .02em;
        }

        .fr-card {
            background: var(--fr-surface);
            border: 1px solid var(--fr-border);
            border-radius: 1rem;
        }

        .fr-card .card-body {
            padding: 1.25rem;
        }

        .fr-section-title {
            color: var(--fr-gold);
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        /* Barras */
        .fr-bar {
            height: 1.1rem;
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: 1rem;
            overflow: hidden;
        }

        .fr-bar .progress-bar {
            transition: width .3s ease;
        }

        .bar-hp { background: var(--fr-hp); }
        .bar-mana { background: var(--fr-mana); }
        .bar-xp { background: var(--fr-xp); }

        .fr-bar-label {
            font-size: .85rem;
            color: var(--bs-secondary-color);
        }

        /* TELA DO JOGO */
        .fr-arena {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            min-height: 280px;
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: 1rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem;
        }

        .fr-side {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
            justify-content: center;
        }

        .fr-unit {
            text-align: center;
            width: 110px;
        }

        .fr-unit-sprite {
            width: 84px;
            height: 84px;
            margin: 0 auto .35rem;
            border-radius: 50%;
            background: var(--fr-surface);
            border: 2px solid var(--fr-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.4rem;
            color: var(--bs-secondary-color);
        }

        .fr-unit.jogador .fr-unit-sprite {
            border-color: var(--fr-gold);
            color: var(--fr-gold);
        }

        .fr-unit.inimigo.alvo .fr-unit-sprite {
            border-color: var(--fr-hp);
            color: var(--fr-hp);
        }

        .fr-unit-nome {
            font-size: .85rem;
            font-weight: 600;
        }

        .fr-unit .fr-bar {
            height: .5rem;
        }

        .fr-unit.inimigo {
            cursor: pointer;
        }

        /* Habilidades (hotbar) */
        .fr-hotkey {
            position: relative;
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .85rem;
            padding: .75rem .5rem;
            text-align: center;
            color: inherit;
            width: 100%;
        }

        .fr-hotkey:hover:not(:disabled) {
            border-color: var(--fr-gold);
        }

        .fr-hotkey:focus-visible {
            outline: 2px solid var(--fr-gold);
            outline-offset: 2px;
        }

        .fr-hotkey:disabled {
            opacity: .45;
        }

        .fr-hotkey i {
            font-size: 1.6rem;
            color: var(--fr-gold);
        }

        .fr-hotkey-nome {
            font-size: .8rem;
            font-weight: 600;
            line-height: 1.2;
            margin-top: .25rem;
        }

        .fr-hotkey-custo {
            font-size: .75rem;
            color: var(--bs-secondary-color);
        }

        .fr-hotkey-tecla {
            position: absolute;
            top: .3rem;
            left: .45rem;
            font-size: .7rem;
            color: var(--bs-secondary-color);
        }

        /* Itens */
        .fr-slot {
            aspect-ratio: 1 / 1;
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .65rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 1.5rem;
            color: var(--fr-gold);
            padding: 0;
        }

        button.fr-slot:hover {
            border-color: var(--fr-gold);
        }

        .fr-slot.vazio {
            border-style: dashed;
        }

        .fr-slot-qtd {
            position: absolute;
            right: .3rem;
            bottom: .1rem;
            font-size: .7rem;
            font-weight: 700;
            color: #fff;
        }

        /* Status */
        .fr-stat {
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .6rem;
            padding: .5rem .75rem;
        }

        /* Log */
        .fr-log {
            height: 150px;
            overflow-y: auto;
            font-size: .9rem;
            background: var(--fr-surface-2);
            border: 1px solid var(--fr-border);
            border-radius: .65rem;
            padding: .6rem .75rem;
        }

        .fr-log p {
            margin: 0 0 .25rem;
        }
    </style>
</head>

<body>

    <main class="container-fluid py-3 px-lg-4">

        <!-- ================= TOPO: PERSONAGEM ================= -->
        <div class="card fr-card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-center">

                    <div class="col-12 col-lg-3">
                        <h1 class="h4 text-warning fw-bold mb-0">//</h1>
                        <div class="text-body-secondary">
                            // · //
                            <span class="badge bg-warning text-dark rounded-pill ms-1">Nível //</span>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="d-flex justify-content-between fr-bar-label">
                            <span><i class="bi bi-heart-fill me-1"></i>Vida</span>
                            <span><span id="hp_atual">//</span> / <span id="hp_max">//</span></span>
                        </div>
                        <div class="progress fr-bar"><div id="barra_hp" class="progress-bar bar-hp" style="width:100%"></div></div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="d-flex justify-content-between fr-bar-label">
                            <span><i class="bi bi-droplet-fill me-1"></i>Mana</span>
                            <span><span id="mana_atual">//</span> / <span id="mana_max">//</span></span>
                        </div>
                        <div class="progress fr-bar"><div id="barra_mana" class="progress-bar bar-mana" style="width:100%"></div></div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="d-flex justify-content-between fr-bar-label">
                            <span><i class="bi bi-star-fill me-1"></i>Experiência</span>
                            <span><span id="xp_atual">//</span> / <span id="xp_max">//</span></span>
                        </div>
                        <div class="progress fr-bar"><div id="barra_xp" class="progress-bar bar-xp" style="width:0%"></div></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row g-3">

            <!-- ================= CENTRO: TELA + HABILIDADES ================= -->
            <div class="col-12 col-lg-6 order-lg-2">

                <div class="card fr-card mb-3">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 id="titulo_cena" class="fr-section-title mb-0">Campo de batalha</h2>
                            <button id="btn_sair" class="btn btn-outline-secondary btn-sm rounded-5 px-3">
                                <i class="bi bi-box-arrow-left me-1"></i>Sair
                            </button>
                        </div>

                        <!-- TELA DO JOGO: renderize aqui (canvas, sprites, etc.) -->
                        <div id="tela_jogo" class="fr-arena">

                            <div class="fr-side" id="lado_jogador">
                                <div class="fr-unit jogador">
                                    <div class="fr-unit-sprite"><i class="bi bi-person-fill"></i></div>
                                    <div class="fr-unit-nome">//</div>
                                    <div class="progress fr-bar mt-1"><div class="progress-bar bar-hp" style="width:100%"></div></div>
                                </div>
                            </div>

                            <div class="fr-side" id="lado_inimigos">
                                <!-- Exemplo de inimigos. Gere dinamicamente conforme o combate. -->
                                <div class="fr-unit inimigo alvo" data-inimigo="1">
                                    <div class="fr-unit-sprite"><i class="bi bi-bug-fill"></i></div>
                                    <div class="fr-unit-nome">Inimigo</div>
                                    <div class="progress fr-bar mt-1"><div class="progress-bar bar-hp" style="width:100%"></div></div>
                                </div>
                                <div class="fr-unit inimigo" data-inimigo="2">
                                    <div class="fr-unit-sprite"><i class="bi bi-bug-fill"></i></div>
                                    <div class="fr-unit-nome">Inimigo</div>
                                    <div class="progress fr-bar mt-1"><div class="progress-bar bar-hp" style="width:100%"></div></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- HABILIDADES -->
                <div class="card fr-card">
                    <div class="card-body">
                        <h2 class="fr-section-title">Habilidades</h2>

                        <div class="row g-2 row-cols-3 row-cols-md-6">
                            
                            <div class="col">
                                <button type="button" class="fr-hotkey" data-habilidade="//"
                                    data-custo="//" title="//">
                                    <span class="fr-hotkey-tecla">//</span>
                                    <i class="bi"></i>
                                    <div class="fr-hotkey-nome">//</div>
                                    <div class="fr-hotkey-custo">//</div>
                                </button>
                            </div>
                            
                            <div class="col-12 text-body-secondary">Nenhuma habilidade disponível.</div>
                            
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================= ESQUERDA: STATUS ================= -->
            <div class="col-12 col-md-6 col-lg-3 order-lg-1">
                <div class="card fr-card h-100">
                    <div class="card-body">
                        <h2 class="fr-section-title">Status</h2>

                        <div class="d-flex flex-column gap-2">


                            
                            <div class="fr-stat d-flex justify-content-between align-items-center">
                                <span><i class="bi // text-warning me-2"></i>//</span>
                                <strong id="//">//</strong>
                            </div>
                            
                        </div>

                        <hr class="border-secondary my-3">

                        <h3 class="h6 text-body-secondary mb-2">Efeitos ativos</h3>
                        <div id="efeitos" class="text-body-secondary small">Nenhum efeito no momento.</div>
                    </div>
                </div>
            </div>

            <!-- ================= DIREITA: ITENS + LOG ================= -->
            <div class="col-12 col-md-6 col-lg-3 order-lg-3">
                <div class="card fr-card h-100">
                    <div class="card-body">

                        <h2 class="fr-section-title">Itens</h2>

                        <div class="row g-2 row-cols-4 mb-4">
                            
                            <div class="col">
                                <button type="button" class="fr-slot" data-item="//" title="//">
                                    <i class="bi //"></i>
                                    
                                    <span class="fr-slot-qtd">//</span>
                                    
                                </button>
                            </div>
                            

                            
                            <div class="col"><div class="fr-slot vazio"></div></div>
                           
                        </div>

                        <h2 class="fr-section-title">Registro</h2>
                        <div id="log" class="fr-log">
                            <p class="text-body-secondary">A batalha começou.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </main>

</body>

</html>