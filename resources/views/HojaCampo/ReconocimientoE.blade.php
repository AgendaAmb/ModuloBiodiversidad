<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Reconocimiento de ejemplar</h2>
    <div class="form-group row g-3">
        <label for="NombreC" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="NombreC" name="NombreC" require>
                <option selected>Nombre Común</option>

                @if (!is_null($Ejemplar))
                @foreach ($Ejemplar as $E)
                <option value="{{$E->id}}">{{$E->NombreComun}}</option>

                @endforeach
                @endif
               
            </select>
        </div>
    </div>

    <div class="form-group row g-3">
        <label for="NombreCientifico" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>

        <div class="col-md-6">
            <input id="NombreCientifico" type="text"
                class="form-control @error('NombreCientifico') is-invalid @enderror" name="NombreCientifico"
                value="{{old('NombreCientifico') }}" maxlength="40" required autocomplete="NombreCientifico" autofocus>

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
                class="form-control @error('NombreCientificoConf') is-invalid @enderror" name="NombreCientificoConf"
                value="{{ old('NombreCientificoConf') }}" required autocomplete="NombreCientificoConf" autofocus
                data-toggle="tooltip" data-placement="top" maxlength="40" title="(Identificación pendiente)">

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
                class="form-control @error('RegistroIdentificacion') is-invalid @enderror" name="RegistroIdentificacion"
                value="{{ old('RegistroIdentificacion') }}" maxlength="40" required
                autocomplete="RegistroIdentificacion" autofocus data-toggle="tooltip" data-placement="top"
                title="(Institución/Nombre del identificador)">

            @error('RegistroIdentificacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>


