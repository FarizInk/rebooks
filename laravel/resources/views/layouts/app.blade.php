<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ayo Membaca Buku">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('images/favicon.ico') !!}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('plugins/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/colors/default-dark.css') !!}" id="theme">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('cssplus')
</head>
<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">ReBooks</p>
        </div>
    </div>
    <div class="main-wrapper">
        @yield('nav')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer"> © 2018 <a href="/">ReBooks</a> </footer>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('plugins/bootstrap/js/popper.min.js') !!}"></script>
    <script src="{!! asset('plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! asset('js/waves.js') !!}"></script>
    <script src="{!! asset('js/sidebarmenu.js') !!}"></script>
    <script src="{!! asset('js/custom.min.js') !!}"></script>
    @yield('jsplus')
</body>
</html>
