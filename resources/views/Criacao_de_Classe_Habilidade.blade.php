<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Classes e Habilidades</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/js/classe_habilidade.js'])
</head>

<body class="bg-light">

    <div class="container py-4 py-md-5">

        <!-- Título da página -->
        <div class="text-center mb-4">
            <h1 class="fw-bold text-dark">
                Configuração de Classes
            </h1>

            <p class="text-muted mb-0">
                Escolha uma classe e defina suas habilidades.
            </p>
        </div>

        <!-- Seleção da classe -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-3">
                    <span class="text-warning">⚔</span>
                    Selecione uma classe
                </h4>

                <label for="classe_id" class="form-label fw-semibold">
                    Classe
                </label>

                <select id="classe_id"
                    name="classe_id"
                    class="form-select form-select-lg rounded-3">

                    <option value="">
                        Selecione uma classe
                    </option>

                    @foreach($classes as $classe)

                        <option value="{{ $classe->id }}">
                            {{ $classe->nome }} — ID: {{ $classe->id }}
                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <!-- Lista de habilidades -->
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="fw-bold mb-1">
                            Habilidades disponíveis
                        </h4>

                        <p class="text-muted mb-0">
                            Selecione as habilidades que pertencerão à classe.
                        </p>
                    </div>

                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                        Habilidades
                    </span>

                </div>

                <div class="row g-3">

                    @foreach($habilidades as $habilidade)

                        <div class="col-12 col-md-6 col-xl-4">

                            <div class="card h-100 border rounded-4 shadow-sm">

                                <div class="card-body d-flex flex-column p-3">

                                    <!-- Checkbox e nome -->
                                    <div class="form-check mb-3">

                                        <input
                                            class="form-check-input habilidade"
                                            type="checkbox"
                                            value="{{ $habilidade->id }}"
                                            id="habilidade_{{ $habilidade->id }}"
                                            name="habilidades[]">

                                        <label
                                            class="form-check-label fw-bold"
                                            for="habilidade_{{ $habilidade->id }}">

                                            {{ $habilidade->nome }}

                                        </label>

                                    </div>

                                    <!-- Descrição -->
                                    <p class="text-muted mb-3">
                                        {{ $habilidade->descricao }}
                                    </p>

                                    <!-- Informações -->
                                    <div class="mt-auto">

                                        <div class="d-flex justify-content-between border-top pt-2 mb-2">
                                            <span class="text-muted">Tipo</span>
                                            <span class="fw-semibold">
                                                {{ $habilidade->tipo }}
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Valor</span>
                                            <span class="fw-semibold">
                                                {{ $habilidade->valor }}
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Custo</span>
                                            <span class="fw-semibold">
                                                {{ $habilidade->custo }}
                                            </span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">Cooldown</span>
                                            <span class="fw-semibold">
                                                {{ $habilidade->cooldown }}s
                                            </span>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                <!-- Botão salvar -->
                <div class="d-flex justify-content-center mt-4">

                    <button
                        type="button"
                        id="salvar"
                        class="btn btn-warning text-dark rounded-3 px-4 py-2 fw-bold">

                        Salvar habilidades da classe

                    </button>

                </div>

            </div>

        </div>

    </div>

</body>

</html>