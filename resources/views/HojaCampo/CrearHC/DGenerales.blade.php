<div class="form-row ">
    <div class="col-xl-6">
        <h2 class="alert alert-primary text-center">Datos generales</h2>
        <x-typeInput  
        labelFor="FechaRecoleccion" 
        isRequiered="true" 
        typeInput="date"
        isReadOnly="{{boolval($isReO)}}"
        label="Fecha de recoleccion de datos" 
        haveValue="{{$nuevo?false:true}}"
        value="{{$nuevo?null:$Planta->FechaRecoleccion}}"
        >
        </x-typeInput>
        <!--
             <div class="form-group row g-3 was-validated">
            <label for="FechaRecoleccion"
                class="col-md-4 col-form-label text-md-left">{{ __('Fecha de recoleccion de datos') }}
            </label>
            <div class="col-md-6">
                <input id="FechaRecoleccion" type="date" class="form-control" name="FechaRecoleccion"
                    value="{{ old('FechaRecoleccion')}}" required autocomplete="FechaRecoleccion" autofocus>
                    <div class="invalid-feedback">Dato Obligatorio</div>
            </div>
            
        </div>
        -->
        <x-typeInput  
        labelFor="FechaFotografia" 
        isRequiered="true" 
        typeInput="date"
        isReadOnly="{{boolval($isReO)}}"
        label="Fecha de fotografía" 
        haveValue="{{$nuevo?false:true}}"
        value="{{$nuevo?null:$Planta->FechaRecoleccion}}"
        >
        </x-typeInput>
        <!--
            <div class="form-group row g-3 was-validated">
            <label for="FechaFotografia"
                class="col-md-4 col-form-label text-md-left">{{ __('Fecha de fotografía') }}</label>
            <div class="col-md-6">
                <input id="FechaFotografia" type="date" class="form-control" name="FechaFotografia"
                    value="{{ old('FechaFotografia') }}" required autocomplete>
            </div>
        </div>
        -->
        <x-typeInput  
        labelFor="NombreRecolectorD" 
        isRequiered="true"
        isReadOnly="{{boolval($isReO)}}"
        label="Nombre del recolector de datos" 
        haveValue="{{$nuevo?false:true}}"
        value="{{$nuevo?false:$Planta->NombreRecolectorDatos}}"
        >
        </x-typeInput>
        <!--
            <div class="form-group row g-3 was-validated">
            <label for="NombreRecolectorD"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre del recolector de datos') }}</label>

            <div class="col-md-6">
                <input id="NombreRecolectorD" type="text"
                    class="form-control @error('NombreRecolectorD') is-invalid @enderror" name="NombreRecolectorD"
                    value="{{ old('NombreRecolectorD') }}" maxlength="40" required autocomplete
                    autofocus>

                @error('NombreRecolectorD')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        -->
        <x-typeInput  
        labelFor="NombreRecolectorm" 
        isRequiered="true"
        isReadOnly="{{boolval($isReO)}}"
        label="Nombre del recolector de muestra" 
        haveValue="{{$nuevo?false:true}}"
        value="{{$nuevo?null:$Planta->NombreRecolectorMuestra}}"
        >
        </x-typeInput>
        <!--
            <div class="form-group row g-3 was-validated">
            <label for="NombreRecolectorm"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre del recolector de muestra') }}</label>
            <div class="col-md-6">
                <input id="NombreRecolectorm" type="text"
                    class="form-control @error('NombreRecolectorm') is-invalid @enderror" name="NombreRecolectorm"
                    value="{{ old('NombreRecolectorm') }}" maxlength="40" required autocomplete
                    autofocus>

                @error('NombreRecolectorD')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        -->
       
        <x-typeInput  
        labelFor="NombreAutorFoto" 
        isRequiered="true" 
        isReadOnly="{{boolval($isReO)}}"
        label="Nombre de autor de fotografías" 
        haveValue="{{$nuevo?false:true}}"
        value="{{$nuevo?null:$Planta->NombreAutorFoto}}"
        >
        
        </x-typeInput>
        <!--
        <div class="form-group row g-3 was-validated">
            <label for="NombreAutorFoto"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre de autor de fotografías') }}</label>
            <div class="col-md-6">
                <input id="NombreAutorFoto" type="text"
                    class="form-control @error('NombreAutorFoto') is-invalid @enderror" name="NombreAutorFoto"
                    value="{{ old('NombreAutorFoto') }}" maxlength="40" required autocomplete
                    autofocus>

                @error('NombreAutorFoto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        -->
        
        <hr>
</div>
