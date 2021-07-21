@extends('layouts.app')
@section('content')

    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proceso de verificación') }}</div>
                <div class="container mx-auto">
                    <lord-icon
                    src="https://cdn.lordicon.com/ribdawhq.json"
                    trigger="loop"
                    colors="primary:#121331,secondary:#08a88a"
                    style="width:50px;height:50px;margin-left: 50%;">
                </lord-icon>
                </div>
               
                    <div class="alert alert-success" role="alert">
                        @if (Auth::user()->email_verified_at)
                        <h2>Gracias por verificar tu correo, se te asignara un rol dentro del sistema y te llegara un
                            correo.</h2>
                        @else
                        <h2>Estas en proceso de verificación,te pedimos que confirmes tu correo y esperes a que se
                            asigne un rol dentro del Sistema</h2>

                        @endif
                        <div class="card-body ">
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                                
                            </a>
                       
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