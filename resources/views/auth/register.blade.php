@extends('layouts.app')

@section('content')
<div class="container-fluid ml-1 mr-1 " id="fondo">
    <div class="row justify-content-center mt-5">
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="{{route('EjemplaresP')}}" role="button">Especies</a>
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="#" role="button">Contacto</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 m-lg-5 m-sm-1">
            <div class="card "id="loginCard">
                <div class="form-group row mt-4">
                    <label for="Entrar" class="col-md-12 col-form-label text-center" id="LStyle">{{ __('REGISTRO') }}</label>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row g-3">
                            <!--
                            <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>
                            -->
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row g-3">
                            <!--
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>
                            -->
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        A simple primary alert—check it out!
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                            -->
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--
                            <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
                            -->
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repite tu Contraseña">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-md-center ">
                                <button type="submit" class="btn btn-light font-weight-bold">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
