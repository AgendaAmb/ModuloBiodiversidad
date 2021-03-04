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

    <div class="form-group row">
        <label for="NombreRecolectorm"
            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de área verde o lugar de plantación') }}</label>
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
            class="col-md-4 col-form-label text-md-left">{{ __('Aspectos de espacio') }}</label>
        <div class="col-md-6">
            <input id="NombreAutorFoto" type="text" class="form-control @error('NombreAutorFoto') is-invalid @enderror"
                name="{{old('NombreAutorFoto')}}" required autocomplete="NombreAutorFoto">
            @error('NombreAutorFoto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="NombreAutorFoto"
            class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>
        <div class="col-md-6">
            <input id="NombreAutorFoto" type="text" class="form-control @error('NombreAutorFoto') is-invalid @enderror"
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