<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <title>Login APM</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center" >
            <div class="shadow login m-5 p-5">
                <h2 class="text-center" >Login APM</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" autofocus type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="password" type="password" class="form-control" id="senha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
