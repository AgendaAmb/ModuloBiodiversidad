@extends('Plantillas.principal')
@push('st')
<link rel="stylesheet" href="{{ asset('css/Institucional.css') }}">
@endpush
@section('title', 'Acceso')

@section('FormularioInicioSesion')
<form action="{{route('LInstitucionalP')}}" method="POST" id="RegistroAspirante" class="mt-5 mx-5 needs-validation">
    @csrf
    <div class="row justify-content-center">
     

        <div class="form-group col-md-7">
            <label for="usuario"> Usuario UASLP o correo electrónico: </label>
            <input id="usuario" name="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" placeholder="ejemplo@ejemplo.com" value="{{ old('usuario') }}">
            
           
        </div>

        <div class="form-group col-md-7">
            <label for="contraseña"> Contraseña: </label>
            <input id="contraseña" name="contraseña" type="password" class="form-control @error('contraseña') is-invalid @enderror" value="{{ old('contraseña') }}">

          
        </div>

        <div class="form-group col-md-7">
            <button type="submit" class="btn btn-primary"> Aceptar </button>
        </div>
    </div> 
</form>
@endsection