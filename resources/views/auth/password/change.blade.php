<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: projet kpekpe ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>

</head>

<body class="theme-cyan authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>KPEKPE project </span>Connexion <span class="msg">Authentifiez-vous pour commencer votre session</span></h1>
        <div class="body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if (session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="input-group icon before_span">
                    <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe"  required autofocus>
                    </div>
                </div>
                <div class="input-group icon before_span">
                    <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Mot de passe" required>
                    </div>
                </div>
                <div>
                    {{-- <div class="">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Se souvenir de moi</label>
                    </div> --}}
                    <div class="text-center">
                        <input type="submit" class="btn btn-raised waves-effect g-bg-cyan" value="Connexion">
                    </div>
                    <div class="text-center"> <a href="{{route('forget.Password')}}">Mot de passe oublié ?</a></div>
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
