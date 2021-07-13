@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proceso de verificación') }}</div>

                <div class="card-body">

                    <div class="alert alert-success" role="alert">


                        @if (Auth::user()->email_verified_at)
                        <h2>Gracias por verificar tu correo, se te asignara un rol dentro del sistema y te llegara un
                            correo.</h2>
                        @else
                        <h2>Estas en proceso de verificación,te pedimos que confirmes tu correo y esperes a que se
                            asigne un rol dentro del Sistema</h2>

                        @endif
                        <button class="btn btn-primary">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection