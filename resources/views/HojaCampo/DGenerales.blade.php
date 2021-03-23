<div class="form-row">
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
        <div class="form-group row g-3">
            <label for="NombreRecolectorD"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de datos') }}</label>

            <div class="col-md-6">
                <input id="NombreRecolectorD" type="text"
                    class="form-control @error('NombreRecolectorD') is-invalid @enderror" name="NombreRecolectorD"
                    value="{{ old('NombreRecolectorD') }}" maxlength="40" required autocomplete="NombreRecolectorD"
                    autofocus>

                @error('NombreRecolectorD')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row g-3">
            <label for="NombreRecolectorm"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre del Recolector de muestra') }}</label>
            <div class="col-md-6">
                <input id="NombreRecolectorm" type="text"
                    class="form-control @error('NombreRecolectorm') is-invalid @enderror" name="NombreRecolectorm"
                    value="{{ old('NombreRecolectorm') }}" maxlength="40" required autocomplete="NombreRecolectorm"
                    autofocus>

                @error('NombreRecolectorD')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row g-3">
            <label for="NombreAutorFoto"
                class="col-md-4 col-form-label text-md-left">{{ __('Nombre de autor de fotografías') }}</label>
            <div class="col-md-6">
                <input id="NombreAutorFoto" type="text"
                    class="form-control @error('NombreAutorFoto') is-invalid @enderror" name="NombreAutorFoto"
                    value="{{ old('NombreAutorFoto') }}" maxlength="40" required autocomplete="NombreAutorFoto"
                    autofocus>

                @error('NombreAutorFoto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <hr>
</div>
