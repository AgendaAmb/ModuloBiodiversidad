<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Situación y entorno</h2>
    <div class="form-group row">
        <label for="NombreRecolectorD"
            class="col-md-4 col-form-label text-md-left">{{ __('Coordenada geográfica') }}</label>

        <div class="col-md-3 ">
            <label for="Latitud" class="col-md-2 col-form-label">{{ __('Latitud') }}</label>
            <input id="Latitud" type="number" step="0.0001" min="-0.100000"
                class="form-control @error('Latitud') is-invalid @enderror" name="Latitud" value="{{ old('Latitud') }}"
                required autocomplete="Latitud" autofocus data-toggle="tooltip" data-placement="top">

            @error('Latitud')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="col-md-3">
            <label for="Altitud" class="col-md-2 col-form-label">{{ __('Altitud') }}</label>
            <input id="Altitud" type="number" step="0.0001" min="-0.100000"
                class="form-control @error('Altitud') is-invalid @enderror" name="Altitud" value="{{ old('Altitud') }}"
                required autocomplete="Altitud" autofocus data-toggle="tooltip" data-placement="top">

            @error('Altitud')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row g-3">
        <label for="TAreaVerde" class="col-md-4 col-form-label text-md-left">{{ __('Tipo de área verde o lugar de plantación') }} </label>

        <div class="col-md-6">
            <input id="TAreaVerde" type="text" class="form-control @error('TAreaVerde') is-invalid @enderror"
                name="TAreaVerde" value="{{ old('TAreaVerde') }}" required autocomplete="TAreaVerde" autofocus
                data-toggle="tooltip" data-placement="top" title="">

            @error('TAreaVerde')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row g-3">
        <label for="AspectoEspacio" class="col-md-4 col-form-label text-md-left">{{ __('Aspectos de espacio') }}</label>

        <div class="col-md-6">
            <input id="AspectoEspacio" type="text" class="form-control @error('AspectoEspacio') is-invalid @enderror"
                name="AspectoEspacio" value="{{ old('AspectoEspacio') }}" required autocomplete="AspectoEspacio" autofocus
                data-toggle="tooltip" data-placement="top" title="">

            @error('AspectoEspacio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row g-3">
        <label for="Interferecia" class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>

        <div class="col-md-6">
            <input id="Interferecia" type="text" class="form-control @error('Interferecia') is-invalid @enderror"
                name="Interferecia" value="{{ old('Interferecia') }}" required autocomplete="Interferecia" autofocus
                data-toggle="tooltip" data-placement="top" title="">

            @error('Interferecia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    
    <hr>
</div>