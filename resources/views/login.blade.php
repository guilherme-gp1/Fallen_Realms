<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/login.js', 'resources/css/cadastro.css'])

    <style>
        .circulo {
            width: 100px;
            height: 100px;
            background-color: gray;
            border-radius: 50%;
        }
    </style>
</head>

<body style="
    background-image: url('{{ asset('img/background-login.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
">
    <div class="container-fluid min-vh-100 d-flex align-items-center">

        <div class=" row bg-white justify-content-center align-items-center w-25 vh-100 shadow overflow-hidden">
            <div class="col-md-10 p-6">
                <h2 class=" fw-bold text-center">Fazer Login</h2>
                
                <div class="campo-flutuante mt-3">
                    <input type="email" class="form-control rounded-4" id="email" name="email"
                        placeholder="">
                    <label for="email">Email</label>
                </div>

                <div class="campo-flutuante mt-3">
                    <input type="password" class="form-control rounded-4" id="senha" name="senha"
                        placeholder="">
                    <label for="senha">Senha</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Lembrar</label>
                    </div>

                    <a href="#" class="small">Esqueceu sua senha?</a>
                </div>

                <div class="justify-content-center d-flex mt-4">
                    <button id="login_usuario" type="button" class="btn btn-primary rounded-5 px-4">
                        Entrar
                    </button>
                </div>

                <div class="text-center mt-3">
                    <span>Não tem uma conta? <a href="/cadastro_usuario">Cadastre-se</a></span>
                </div>
            </div>


        </div>

    </div>
</body>

</html>