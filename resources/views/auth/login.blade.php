@extends('layouts.admin')

@section('content')
<div class="container">

            <div class="logo">
                    <center>
                        <img width="300" src="img/logo_bufferstore.jpg"/>
                    </center>
                    
                </div>
            <div class="login-form-header">
                <h3>Login ke akun Anda</h3>
            </div>
            <form method="post" action="{{route('login') }}" class="login-form" role="login" >
                {{ csrf_field() }}
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="input" name="email" placeholder="Email"/>
                </div>
                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password"  id="login-password" class="input" name="password" placeholder="Password"/>
                    <i id="show-password" class="fa fa-eye"></i>
                </div>
                <div class="rememberme-container">
                    <input type="checkbox" name="rememberme" id="rememberme"/>
                    <label for="rememberme" class="rememberme"><span>Biarkan tetap masuk</span></label>
                    <a class="forgot-password" href="#">Lupa Password?</a>
                </div>
                <input type="submit" name="login" value="Login" class="button"/>
                {{-- <a href="{{ route('register') }}" class="register">Register</a> --}}
            </form>
</div>
@endsection
