<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Reconocimiento de ejemplar</h2>

    <div class="form-group row g-3 was-validated">
        <label for="NombreC"
            class="col-md-4 col-form-label text-md-left">{{ __('Nombre común') }}</label>
            <div class="col-md-8">
                <input id="NombreC"   readonly type="text"
                class="form-control @error('NombreCientifico') is-invalid @enderror" name="NombreCientifico"
                maxlength="40"value= "{{$Planta->NombreEjem->NombreComun}}" required autocomplete="NombreCientifico" autofocus>
            @error('NombreCientifico')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
    </div>
    <div class="form-group row g-3 was-validated">
        <label for="NombreCientifico"
            class="col-md-4 col-form-label text-md-left">{{ __('Nombre científico') }}</label>
            <div class="col-md-8">
                <input id="NombreCientifico" readonly type="text"
                    class="form-control @error('NombreCientifico') is-invalid @enderror" name="NombreCientifico"
                    value="{{$Planta->NombreEjem->NombreCientifico}}" maxlength="40" required autocomplete="NombreCientifico" autofocus>
                @error('NombreCientifico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
    </div>


    <x-typeInput :labelFor="'RegistroIdentificacion'" :isRequiered="true"
        isReadOnly="{{boolval($isReO)}}" :label="'Registro del proceso de identificación'"
        haveValue="{{true}}" value="{{$Planta->NombreAutorFoto}}">
    </x-typeInput>

</div>
