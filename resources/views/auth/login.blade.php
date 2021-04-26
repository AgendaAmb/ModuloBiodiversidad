@extends('layouts.app')

@section('content')
<div class="container-fluid ml-1 mr-1 " id="fondo">
    <div class="row justify-content-center">
        hola
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 m-5">
            <div class="card" id="loginCard">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="Entrar" class="col-md-12 col-form-label text-center" id="LStyle">{{ __('ENTRAR') }}</label>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('Email') }}</label>

                            <div class="col-md-12">
                                <input id="email" placeholder="EMAIL" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Contraseña') }}</label>

                            <div class="col-md-12">
                                <input id="password" placeholder="CONTRASEÑA" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5 m-5 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label id="LStyle" class="form-check-label" for="remember">
                                        {{ __('RECORDAR') }}
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-light btn-lg btn-block">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            <div class="col-md-5 m2">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidé mi contraseña') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
