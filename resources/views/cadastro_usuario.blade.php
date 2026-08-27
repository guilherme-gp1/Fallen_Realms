<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/js/cadastro_usuario.js', 'resources/css/cadastro.css'])

    <style>
        .circulo {
            width: 100px;
            height: 100px;
            background-color: gray;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">

        <div class="row bg-white rounded-4 shadow overflow-hidden"
            style="max-width: 1000px; width: 100%;">

            <div class="col-md-6 bg-dark text-white d-flex flex-column justify-content-center align-items-center p-5">
                <div>
                    <div class="circulo"></div>
                </div>

                <h2 class="fw-bold text-center">
                    Crie sua conta
                </h2>

                <p class="text-center text-light">
                    Preencha seus dados para começar.
                </p>
            </div>

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
                    <input type="email" class="form-control rounded-5" id="email" name="email"
                        placeholder="">
                    <label for="email">Email</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="password" class="form-control rounded-5" id="senha" name="senha"
                        placeholder="">
                    <label for="senha">Senha</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="date" class="form-control rounded-5" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="text" class="form-control rounded-5" id="cpf" name="cpf"
                        placeholder="">
                    <label for="cpf">CPF</label>
                </div>

                <div class="justify-content-center d-flex mt-3">
                    <button id="cadastro_usuario" type="button" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </div>

        </div>

    </div>
</body>

</html>