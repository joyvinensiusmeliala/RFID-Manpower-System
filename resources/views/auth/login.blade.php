<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RFID Manpower System</title>
    
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
    type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('Admin-LTE/dist/css/lib/getmdl-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin-LTE/dist/css/lib/nv.d3.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin-LTE/dist/css/application.min.css')}}">
    <script src="{{asset('Admin-LTE/dist/js/material.min.js')}}"></script>
    <script src="{{asset('Admin-LTE/dist/js/d3.min.js')}}"></script>
    <script src="{{asset('Admin-LTE/dist/js/getmdl-select.min.js')}}"></script>
    <script src="{{asset('Admin-LTE/dist/js/nv.d3.min.js')}}"></script>
</head>
<body class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <form action="{{ url('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                               <span class="mdl-card__title-text text-color--white" style="font-size: 25px;">RFID - LOGIN</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="username" name="username">
                                    <label class="mdl-textfield__label" for="username">Nama Pengguna</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="password" name="password" id="password">
                                    <label class="mdl-textfield__label" for="password">Kata Sandi</label>
                                </div>
                                <a href="#" class="login-link">Lupa Kata Sandi?</a>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                {{-- <a href="sign-up.html" class="login-link">Don't have account?</a> --}}
                                <div class="mdl-layout-spacer"></div>
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                        MASUK
                                    </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
        </main>
    {{-- </div> --}}
</body>
</html>