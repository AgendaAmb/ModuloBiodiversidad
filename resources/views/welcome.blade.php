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
    <div class="container-fluid justify-content-between mt-5 p-5">
        <h2 class="text-center alert alert-dark">Hoja de campo</h2>
        <form method="POST" action="#">
            @csrf
            <div class="form-row m-2">
                <div class="col-xl-6">
                    <h2 class="alert alert-primary text-center">Datos Generales</h2>
                    <div class="form-group row g-3">
                        <label for="FechaRecoleccion"
                            class="col-md-4 col-form-label text-md-right">{{ __('Fecha de recoleccion de datos') }}
                        </label>
                        <div class="col-md-6">
                            <input id="FechaRecoleccion" type="date" class="form-control" name="FechaRecoleccion"
                                value="{{ old('FechaRecoleccion')}}" required autocomplete="FechaRecoleccion" autofocus>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <label for="FechaFotografia"
                            class="col-md-4 col-form-label text-md-left">{{ __('Fecha de fotografía') }}</label>
                        <div class="col-md-6">
                            <input id="FechaFotografia" type="date" class="form-control" name="FechaFotografia"
                                value="{{ old('FechaFotografia') }}" required autocomplete="FechaFotografia">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreRecolectorD"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de datos') }}</label>

                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorD') is-invalid @enderror"
                                name="{{old('NombreRecolectorD')}}" required autocomplete="NombreRecolectorD">
                            @error('NombreRecolectorD')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreRecolectorm"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de muestra') }}</label>
                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorM') is-invalid @enderror"
                                name="{{old('NombreRecolectorM')}}" required autocomplete="NombreRecolectorD">
                            @error('NombreRecolectorM')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreAutorFoto"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre de autor de fotografías') }}</label>
                        <div class="col-md-6">
                            <input id="NombreAutorFoto" type="text"
                                class="form-control @error('NombreAutorFoto') is-invalid @enderror"
                                name="{{old('NombreAutorFoto')}}" required autocomplete="NombreAutorFoto">
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
                    <h2 class="alert alert-primary text-center">Reconocimiento de ejemplar</h2>
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
                            <input id="NombreCientifico" type="text"
                                class="form-control @error('NombreCientifico') is-invalid @enderror"
                                name="NombreCientifico" value="{{ old('NombreCientifico') }}" required
                                autocomplete="NombreCientifico" autofocus>

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
                            <input id="NombreCientificoConf" type="text"
                                class="form-control @error('NombreCientificoConf') is-invalid @enderror"
                                name="NombreCientificoConf" value="{{ old('NombreCientificoConf') }}" required
                                autocomplete="NombreCientificoConf" autofocus data-toggle="tooltip" data-placement="top"
                                title="(Identificación pendiente)">

                            @error('NombreCientificoConf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="RegistroIdentificacion"
                            class="col-md-4 col-form-label text-md-left">{{ __('Registro del proceso de identificación') }}
                        </label>

                        <div class="col-md-6">
                            <input id="RegistroIdentificacion" type="text"
                                class="form-control @error('RegistroIdentificacion') is-invalid @enderror"
                                name="RegistroIdentificacion" value="{{ old('RegistroIdentificacion') }}" required
                                autocomplete="RegistroIdentificacion" autofocus data-toggle="tooltip"
                                data-placement="top" title="(Institución/Nombre del identificador)">

                            @error('RegistroIdentificacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <h2 class="alert alert-primary text-center">Morfología y estado de fitosanitarios básicos</h2>
                    <div class="form-group row g-3">
                        <label for="CondicionG"
                            class="col-md-4 col-form-label text-md-left">{{ __('Condición General') }}</label>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="CondicionG" type="text"
                                class="form-control @error('CondicionG') is-invalid @enderror" name="CondicionG"
                                value="{{ old('CondicionG') }}" required autocomplete="CondicionG" autofocus></textarea>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <label for="EstadoCrecimiento"
                            class="col-md-4 col-form-label text-md-left">{{ __('Estado de Crecimiento') }}</label>

                        <div class="col-md-6">
                            <select class="custom-select" id="EstadoCrecimiento" require>
                                <option selected>Estado de Crecimiento</option>
                                <option value="1">1 (Juvenil)</option>
                                <option value="2">2 (Adulto)</option>
                                <option value="3">3 (Maduro)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="Altura" class="col-md-4 col-form-label text-md-left">{{ __('Altura (m) ') }}</label>

                        <div class="col-md-6">
                            <input id="Altura" type="number" step="0.0001" min="0.0001"
                                class="form-control @error('Altura') is-invalid @enderror" name="Altura"
                                value="{{ old('Altura') }}" required autocomplete="Altura" autofocus
                                data-toggle="tooltip" data-placement="top" title="Altura en metros">

                            @error('Altura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="AlturaLi"
                            class="col-md-4 col-form-label text-md-left">{{ __('Altura (m) (reportada por literatura) ') }}</label>

                        <div class="col-md-6">
                            <input id="AlturaLi" type="number" step="0.0001" min="0.0001"
                                class="form-control @error('AlturaLi') is-invalid @enderror" name="AlturaLi"
                                value="{{ old('AlturaLi') }}" required autocomplete="AlturaLi" autofocus
                                data-toggle="tooltip" data-placement="top"
                                title="Altura en metros reportada por literatura">

                            @error('AlturaLi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <label for="Copa" class="col-md-4 col-form-label text-md-left">{{ __('Copa(tipo)') }} </label>

                        <div class="col-md-6">
                            <input id="Copa" type="text" class="form-control @error('Copa') is-invalid @enderror"
                                name="Copa" value="{{ old('Copa') }}" required autocomplete="Copa" autofocus
                                data-toggle="tooltip" data-placement="top" title="">

                            @error('Copa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="DiametroC"
                            class="col-md-4 col-form-label text-md-left">{{ __('Diametro de copa (m)') }}</label>

                        <div class="col-md-6">
                            <input id="DiametroC" type="number" step="0.0001" min="0.0001"
                                class="form-control @error('DiametroC') is-invalid @enderror" name="DiametroC"
                                value="{{ old('DiametroC') }}" required autocomplete="DiametroC" autofocus
                                data-toggle="tooltip" data-placement="top" title="Diametro de la copa en metros">

                            @error('DiametroC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="Raices" class="col-md-4 col-form-label text-md-left">{{ __('Raíces') }}</label>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="Raices" type="text"
                                class="form-control @error('Raices') is-invalid @enderror" name="Raices"
                                value="{{ old('Raices') }}" required autocomplete="Raices" autofocus></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="TRaices"
                            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de Raíces') }}</label>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="Raices" type="text"
                                class="form-control @error('Raices') is-invalid @enderror" name="Raices"
                                value="{{ old('Raices') }}" required autocomplete="Raices" autofocus></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="Manejo" class="col-md-4 col-form-label text-md-left">{{ __('Manejo') }}</label>

                        <div class="col-md-6">
                            <select class="custom-select" id="Manejo" require>
                                <option selected>Manejo</option>
                                <option value="1">1 (Baja)</option>
                                <option value="2">2 (Regular)</option>
                                <option value="3">3 (Alta)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="DanosFisicos"
                            class="col-md-4 col-form-label text-md-left">{{ __('Presencia de daños físicos') }}</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Si</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">No</label>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <div class="col-md-4 col-form-label text-md-left"></div>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="DanosFisicosText" type="text"
                                class="form-control @error('DanosFisicosText') is-invalid @enderror"
                                name="DanosFisicosText" value="{{ old('DanosFisicosText') }}" required
                                autocomplete="DanosFisicosText" autofocus></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="EstadoFitosanitario"
                            class="col-md-4 col-form-label text-md-left">{{ __('Estado fitosanitario aparente') }}</label>

                        <div class="col-md-6">
                            <select class="custom-select" id="EstadoFitosanitario" require>
                                <option selected>Estado</option>
                                <option value="1">1 (Favorable)</option>
                                <option value="2">2 (Medio)</option>
                                <option value="3">3 (Desfavorable)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="EnfermedadesA"
                            class="col-md-4 col-form-label text-md-left">{{ __('Enfermedades Aparentes') }}</label>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="EnfermedadesA" type="text"
                                class="form-control @error('EnfermedadesA') is-invalid @enderror" name="EnfermedadesA"
                                value="{{ old('EnfermedadesA') }}" required autocomplete="EnfermedadesA"
                                autofocus></textarea>
                        </div>
                    </div>
                    <div class="form-group row g-3">
                        <label for="EnfermedadesP"
                            class="col-md-4 col-form-label text-md-left">{{ __('Enfermedades Probables') }}</label>
                        <div class="col-md-6">
                            <textarea aria-label="With textarea" id="EnfermedadesP" type="text"
                                class="form-control @error('EnfermedadesP') is-invalid @enderror" name="EnfermedadesP"
                                value="{{ old('EnfermedadesP') }}" required autocomplete="EnfermedadesP"
                                autofocus></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <h2 class="alert alert-primary text-center">Situación y entorno</h2>
                    <div class="form-group row g-3">
                        <label for="FechaRecoleccion"
                            class="col-md-4 col-form-label text-md-right">{{ __('Fecha de recoleccion de datos') }}
                        </label>
                        <div class="col-md-6">
                            <input id="FechaRecoleccion" type="date" class="form-control" name="FechaRecoleccion"
                                value="{{ old('FechaRecoleccion')}}" required autocomplete="FechaRecoleccion" autofocus>
                        </div>
                    </div>

                    <div class="form-group row g-3">
                        <label for="FechaFotografia"
                            class="col-md-4 col-form-label text-md-left">{{ __('Fecha de fotografía') }}</label>
                        <div class="col-md-6">
                            <input id="FechaFotografia" type="date" class="form-control" name="FechaFotografia"
                                value="{{ old('FechaFotografia') }}" required autocomplete="FechaFotografia">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreRecolectorD"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de datos') }}</label>

                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorD') is-invalid @enderror"
                                name="{{old('NombreRecolectorD')}}" required autocomplete="NombreRecolectorD">
                            @error('NombreRecolectorD')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreRecolectorm"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de muestra') }}</label>
                        <div class="col-md-6">
                            <input id="NombreRecolectorD" type="text"
                                class="form-control @error('NombreRecolectorM') is-invalid @enderror"
                                name="{{old('NombreRecolectorM')}}" required autocomplete="NombreRecolectorD">
                            @error('NombreRecolectorM')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NombreAutorFoto"
                            class="col-md-4 col-form-label text-md-left">{{ __('Nombre de autor de fotografías') }}</label>
                        <div class="col-md-6">
                            <input id="NombreAutorFoto" type="text"
                                class="form-control @error('NombreAutorFoto') is-invalid @enderror"
                                name="{{old('NombreAutorFoto')}}" required autocomplete="NombreAutorFoto">
                            @error('NombreAutorFoto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                </div>
            </div>


            <div class=" d-flex justify-content-xl-end mb-2">
                <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
            </div>


        </form>
    </div>
</body>

</html>
