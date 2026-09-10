<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Habilidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/cadastro_habilidade.js'])
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">

        <div class="row bg-white rounded-4 shadow overflow-hidden"
            style="max-width: 1000px; width: 100%;">

            <div class="col-md-6 p-4">
                <div class="justify-content-center d-flex">
                    <div class="circulo"></div>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="text" class="form-control rounded-5" id="nome" name="nome"
                        placeholder="">
                    <label for="nome">Nome</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="text" class="form-control rounded-5" id="descricao" name="descricao"
                        placeholder="">
                    <label for="descricao">Descrição</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="text" class="form-control rounded-5" id="tipo" name="tipo"
                        placeholder="">
                    <label for="tipo">Tipo</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="number" class="form-control rounded-5" id="valor" name="valor"
                        placeholder="">
                    <label for="valor">Dano</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="number" class="form-control rounded-5" id="custo" name="custo"
                        placeholder="">
                    <label for="custo">Custo da Habilidade</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="number" class="form-control rounded-5" id="cooldown" name="cooldown"
                        placeholder="">
                    <label for="cooldown">Cooldown</label>
                </div>


                <div class="justify-content-center d-flex mt-4">
                    <button id="criar_habilidade" type="button" class="btn btn-primary rounded-5 px-4">
                        Criar Habilidade
                    </button>
                </div>
            </div>

        </div>

    </div>
</body>

</html>