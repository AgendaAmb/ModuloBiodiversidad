<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Reconocimiento de ejemplar</h2>
    @if (!$nuevo)
    <div class="form-group row g-3 was-validated">
        <label for="NombreC" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>
        <div class="col-md-7">
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
    @else
    <div class="form-group row g-3 was-validated">
        <label for="NombreC" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>
        <div class="col-md-7">
            <select class="custom-select" id="NombreC" name="NombreC" v-model="NombreC"  @change="Ncientifico()" required>
                <option selected="true"  disabled>Nombre Común</option>
                <option v-for="(N,index) in Nombres" :value="N.id">@{{N.Nombre}}</option>
            </select>
        </div>
    </div>
    @endif
    @if (!$nuevo)
    <div class="form-group row g-3 was-validated">
        <label for="NombreCientifico" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>
        <div class="col-md-7">
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
    @else
    <div class="form-group row g-3 was-validated">
        <label for="NombreCientifico" class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>
        <div class="col-md-7">
            <input id="NombreCientifico" v-model="NCientifico"  readonly type="text"
                class="form-control @error('NombreCientifico') is-invalid @enderror" name="NombreCientifico"
                value="{{old('NombreCientifico') }}" maxlength="40" required autocomplete="NombreCientifico" autofocus>

            @error('NombreCientifico')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endif
    
    <x-typeInput  
    :labelFor="'RegistroIdentificacion'" 
    :isRequiered="true"
    isReadOnly="{{boolval($isReO)}}"
    :label="'Registro del proceso de identificación'" 
    haveValue="{{$nuevo?false:true}}"
    value="{{$nuevo?null:$Planta->NombreAutorFoto}}"
    >
    </x-typeInput>
    <!--
    <div class="form-group row g-3 was-validated">
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
    -->
    
</div>


