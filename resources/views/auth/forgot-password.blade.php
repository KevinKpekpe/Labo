<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: projet kpekpe ::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body class="theme-cyan authentication">
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-top"></div>
        <div class="card">
            <h1 class="title"><span>KPEKPE project</span>Mot de passe oublié ? <div class="msg">Entrez votre adresse
                    e-mail utilisé lors de l'inscription.</div>
            </h1>
            <div class="body">
                <form action="{{ route('forget.Password.post') }}" method="POST">
                    @csrf
                    <div class="input-group icon before_span">
                        <span class="input-group-addon"> <i class="zmdi zmdi-email"></i> </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required
                                autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <input type="submit" value="REINITIALISER" class="btn btn-raised waves-effect g-bg-cyan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="theme-bg"></div>


    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script>
</body>

</html>
