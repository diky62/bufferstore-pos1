<html>
    <head>
        <title>Bufferstore POS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    {{-- <!-- Styles -->
    {{ Html::style(url('css/menu.css')) }}
    {{ Html::style('css/main.css') }}
    {{ Html::style(url('css/font.css')) }}
    {{ Html::style('css/font-awesome.min.css') }}
    @yield('ext_css')
    {{ Html::style(url('css/bgimg.css')) }} --}}
        {{-- <link rel="stylesheet" type="text/css" href="{!! asset('img/logo.png') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/menu.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/main.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bgimg.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bgimg.css') !!}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- jQuery  -->
        <script src="{{ asset('js/jquery-1.12.4.min.js"') }}"></script>
        <script src="{{ asset('js/main.js"') }}"></script> --}}
        <link rel="shortcut icon" href="{{asset ('img/logo_bufferstore.jpg')}}"/>
        <link rel="stylesheet" href="{{asset ('css/menu.css')}}"/>
        <link rel="stylesheet" href="{{asset ('css/main.css')}}"/>
        <link rel="stylesheet" href="{{asset ('css/bgimg.css')}}"/>
        <link rel="stylesheet" href=""/>
        <link rel="stylesheet" href="{{asset ('css/font-awesome.min.css')}}"/>
        <script type="text/javascript" src="{{asset ('js/jquery-1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset ('js/main.js')}}"></script>
    </head>
<body>
    {{-- <div class="menu">
        <a href="#" class="bars" id="bars">
            <i class="fa fa-bars"></i>
        </a>
        <ul id="menu-list">
            <li><a href="http://jagowebdev.com">Home &raquo; Jagowebdev.com</a></li>
            <li><a href="http://jagowebdev.com/mendesain-form-login-dengan-css/">Mendesain Form Login Dengan CSS3</a></li>
            <li><span>Form Login Dengan Background Image</span></li>
            <li><a href="bgimg-dotted.html">Form Login Dengan Background Dot</a></li>
            <li><a href="bgimg-blurred.html">Form Login Dengan Background Blur</a></li>
            <li><a href="nobgimg.html">Form Login Tanpa Background</a></li>
            <li><a href="bgimg-nosocial.html">Form Login Tanpa Social Login</a></li>
            <li><a href="bgimg-parallax.html">Form Login Dengan Background Parallax</a></li>
        </ul>
    </div> --}}
    <div class="background"></div>
    <div class="backdrop"></div>
    <div class="login-form-container" id="login-form">
        <div class="login-form-content">
            
           {{--  <div class="separator">
                    <span class="separator-text">atau</span>
            </div>
            <div class="socmed-login">
                <a href="#facebook" class="socmed-btn facebook-btn">
                    <i class="fa fa-facebook"></i>
                    <span>Login dengan Facebook</span>
                <a>
                <a href="#g-plus" class="socmed-btn google-btn">
                    <i class="fa fa-google"></i>
                    <span>Login dengan Google</span>
                <a>
                <a href="#g-plus" class="socmed-btn yahoo-btn">
                    <i class="fa fa-yahoo"></i>
                    <span>Login dengan Yahoo</span>
                <a>
            </div> --}}
            @yield('content')
        </div>
    </div>

</body>
</html>