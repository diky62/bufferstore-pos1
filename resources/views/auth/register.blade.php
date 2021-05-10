    @extends('layouts.admin')

@section('content')
 <div class="container">
    <a href="#"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a>
            <div class="login-form-header">
                <div class="logo">
                    <img src="img/logo.png"/>
                </div>
                <h3>Register</h3>
            </div>
            <form method="post" action="{{ route('register') }}" class="login-form">
                @csrf
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="name" id="nama" class="input form-control @error('name') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" id="email" class="input form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="name" autofocus/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="input-container">
                    <i class="fa fa-envelope"></i>
                    <input type="email" id="email" class="input form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="name" autofocus/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>


                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="role"  id="role" class="input form-control @error('role') is-invalid @enderror" name="role" placeholder="Role" required autocomplete="new-role"/>
                     @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-container">
                    <i class="fa fa-lock"></i>
                    <input type="password"  id="password-confirm" class="input form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" name="password" placeholder="Confirm Password" />
                    <i id="show-password" class="fa fa-eye"></i>
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="button">
                    {{ __('Register') }}
                </button>
                {{-- <input type="submit" name="register" value="Register" class="button"/> --}}
                {{-- <a href="{{ route('register') }}" class="register">Register</a> --}}
            </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="login-formw">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
