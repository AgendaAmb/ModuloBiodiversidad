<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Biodiversidad') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid justify-content-between">
        <h2>Hoja de campo</h2>
        <form method="POST" action="#">
            @csrf
            <div class="form-row m-2">
                <div class="col-xl-6">
                    <h2>Datos Generales</h2>
                    <div class="form-group row g-3">
                        <label for="FechaRecoleccion"
                            class="col-md-4 col-form-label text-md-right">{{ __('Fecha de recoleccion de datos') }}
                        </label>
                        <div class="col-md-6">
                            <input id="FechaRecoleccion" type="date" class="form-control"
                                name="FechaRecoleccion" value="{{ old('FechaRecoleccion')}}" required autocomplete="FechaRecoleccion" autofocus>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <label for="FechaFotografia"
                            class="col-md-4 col-form-label text-md-left">{{ __('Fecha de fotografía') }}</label>
                        <div class="col-md-6">
                            <input id="FechaFotografia" type="date" class="form-control"
                                name="FechaFotografia" value="{{ old('FechaFotografia') }}" required autocomplete="FechaFotografia">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="NombreRecolectorD" class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de datos') }}</label>

                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorD') is-invalid @enderror" name="{{old('NombreRecolectorD')}}" required autocomplete="NombreRecolectorD">
                                @error('NombreRecolectorD')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreRecolectorm" class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de muestra') }}</label>
                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorM') is-invalid @enderror" name="{{old('NombreRecolectorM')}}" required autocomplete="NombreRecolectorD">
                                @error('NombreRecolectorM')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="NombreAutorFoto" class="col-md-4 col-form-label text-md-left">{{ __('Nombre de autor de fotografías') }}</label>
                        <div class="col-md-6">
                            <input id="NombreAutorFoto" type="text"
                                class="form-control @error('NombreAutorFoto') is-invalid @enderror" name="{{old('NombreAutorFoto')}}" required autocomplete="NombreAutorFoto">
                                @error('NombreAutorFoto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    <hr>
                </div>
                
                <div class="col-xl-6">
                    <h2>Reconocimiento de ejemplar</h2>
                    <div class="form-group row g-3">
                        <label for="NombreC"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>

                        <div class="col-md-6">
                            <input id="NombreC" type="text" class="form-control @error('NombreC') is-invalid @enderror"
                                name="NombreC" value="{{ old('NombreC') }}" required autocomplete="NombreC" autofocus>

                            @error('NombreC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="NombreCientifico"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>

                        <div class="col-md-6">
                            <input id="NombreCientifico" type="text" class="form-control @error('NombreCientifico') is-invalid @enderror"
                                name="NombreCientifico" value="{{ old('NombreCientifico') }}" required autocomplete="NombreCientifico" autofocus>

                            @error('NombreCientifico')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="NombreCientificoConf"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico ') }}</label>

                        <div class="col-md-6">
                            <input id="NombreCientificoConf" type="text" class="form-control @error('NombreCientificoConf') is-invalid @enderror"
                                name="NombreCientificoConf" value="{{ old('NombreCientificoConf') }}" required autocomplete="NombreCientificoConf" autofocus
                                data-toggle="tooltip" data-placement="top" title="(Identificación pendiente)"
                                >

                            @error('NombreCientificoConf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="RegistroIdentificacion"
                            class="col-md-4 col-form-label text-md-left" >{{ __('Registro del proceso de identificación') }} </label>

                        <div class="col-md-6">
                            <input id="RegistroIdentificacion" type="text" class="form-control @error('RegistroIdentificacion') is-invalid @enderror"
                                name="RegistroIdentificacion" value="{{ old('RegistroIdentificacion') }}" required autocomplete="RegistroIdentificacion" autofocus
                                data-toggle="tooltip" data-placement="top" title="(Institución/Nombre del identificador)">

                            @error('RegistroIdentificacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>    

                <div class="col-xl-6">
                    <h2>Morfología y estado de fitosanitarios básicos</h2>
                    <div class="form-group row g-3">
                        <label for="NombreC"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>

                        <div class="col-md-6">
                            <input id="NombreC" type="text" class="form-control @error('NombreC') is-invalid @enderror"
                                name="NombreC" value="{{ old('NombreC') }}" required autocomplete="NombreC" autofocus>

                            @error('NombreC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="NombreCientifico"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>

                        <div class="col-md-6">
                            <input id="NombreCientifico" type="text" class="form-control @error('NombreCientifico') is-invalid @enderror"
                                name="NombreCientifico" value="{{ old('NombreCientifico') }}" required autocomplete="NombreCientifico" autofocus>

                            @error('NombreCientifico')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="NombreCientificoConf"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico ') }}</label>

                        <div class="col-md-6">
                            <input id="NombreCientificoConf" type="text" class="form-control @error('NombreCientificoConf') is-invalid @enderror"
                                name="NombreCientificoConf" value="{{ old('NombreCientificoConf') }}" required autocomplete="NombreCientificoConf" autofocus
                                data-toggle="tooltip" data-placement="top" title="(Identificación pendiente)"
                                >

                            @error('NombreCientificoConf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="RegistroIdentificacion"
                            class="col-md-4 col-form-label text-md-left" >{{ __('Registro del proceso de identificación') }} </label>

                        <div class="col-md-6">
                            <input id="RegistroIdentificacion" type="text" class="form-control @error('RegistroIdentificacion') is-invalid @enderror"
                                name="RegistroIdentificacion" value="{{ old('RegistroIdentificacion') }}" required autocomplete="RegistroIdentificacion" autofocus
                                data-toggle="tooltip" data-placement="top" title="(Institución/Nombre del identificador)">

                            @error('RegistroIdentificacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>    


            </div>


            <button type="submit" class="btn btn-primary">Sign in</button>

        </form>
    </div>
</body>

</html>