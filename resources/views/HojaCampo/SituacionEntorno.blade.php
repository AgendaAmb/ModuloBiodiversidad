<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Situación y entorno</h2>
    <div class="form-group row g-3">
        <label for="NoEjemplar" class="col-md-4 col-form-label text-md-left">{{ __('No. de ejemplar') }}</label>
        <div class="col-md-6">

            <input id="NoEjemplar" readonly type="text" class="form-control @error('NoEjemplar') is-invalid @enderror"
                name="NoEjemplar" value="{{old('NoEjemplar') }}" maxlength="40" required autocomplete="NoEjemplar"
                autofocus>

            @error('NoEjemplar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>
    <div class="form-group row g-3 was-validated">
        <label for="EntidadA" class="col-md-4 col-form-label text-md-left">{{ __('Entidad Académica') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="EntidadA" name="EntidadA" v-model="Entidad_id" required
                @change="FiltroSubUnidades()">
                <option selected disabled value="">Entidad Académica</option>
                <option v-for="(N,index) in SubUnidadesP" :value="N.IdUnidad">@{{N.NombreUnidad}}</option>
            </select>
        </div>

    </div>
    <div class="form-group row g-3 was-validated">
        <label for="SubUnidadesFiltrada"
            class="col-md-4 col-form-label text-md-left">{{ __('SubUnidad Academica') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="SubUnidadesFiltrada" name="SubUnidadesFiltrada" required>
                <option selected disabled value="">SubUnidadAcademica</option>
                <option v-for="(A,index) in SubUnidadesFiltrada" :value="A.NombreUnidad">@{{A.NombreUnidad}}</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="Coordenadageográfica"
            class="col-md-4 col-form-label text-md-left">{{ __('Coordenada geográfica') }}<br>(Grados,Minutos,Segundos)</label>



        <div class="col-md-6">

            <input id="Latitud" type="text" class="form-control  @error('Latitud') is-invalid @enderror" name="Latitud"
                value="{{ old('Latitud') }}" autocomplete="Latitud" autofocus data-toggle="tooltip" data-placement="top"
                placeholder="Latitud">


            @error('Latitud')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="col-md-12 p-0 pt-1">

                <input id="Latitud" type="text" class="form-control  @error('Latitud') is-invalid @enderror"
                    name="Latitud" value="{{ old('Latitud') }}" autocomplete="Latitud" autofocus data-toggle="tooltip"
                    data-placement="top" placeholder="Longuitud">


                @error('Latitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>



    </div>
    <!--
        <div class="form-group row">
            <label for="Coordenadageográfica"
            class="col-md-4 col-form-label text-md-left">{{ __('Coordenada geográfica') }}<br>(Grados,Minutos,Segundos)</label>
            
            
            
            <div class="col-md-2 pr-0">
                
                <input id="Latitud" type="number" step="0.01" maxlength="10"
                class="form-control  @error('Latitud') is-invalid @enderror" name="Latitud" value="{{ old('Latitud') }}"
                autocomplete="Latitud" autofocus data-toggle="tooltip" data-placement="top">
                
                
                @error('Latitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            <div class="col-md-2 pr-0 pl-1">
                <input id="Altitud" type="number"step="0.01" maxlength="10"
                class="form-control @error('Altitud') is-invalid @enderror" name="Altitud" value="{{ old('Altitud') }}"
                autocomplete="Altitud" autofocus data-toggle="tooltip" data-placement="top">
                
                @error('Altitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-2 pl-1">
                <input id="Altitud" type="number" step="0.01" maxlength="10"
                class="form-control @error('Altitud') is-invalid @enderror" name="Altitud" value="{{ old('Altitud') }}"
                autocomplete="Altitud" autofocus data-toggle="tooltip" data-placement="top">
                
                @error('Altitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
        </div>
    -->

    <div class="form-group row g-3">
        <label for="TAreaVerde"
            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de área verde o lugar de plantación') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="TAreaVerde" name="TAreaVerde">
                <option selected disabled>Estado de Crecimiento</option>
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
            </select>
        </div>
    </div>


    <div class="form-group row g-3">
        <label for="AspectoEspacio" class="col-md-4 col-form-label text-md-left">{{ __('Aspectos de espacio') }}</label>

        <div class="col-md-6">
            <input id="AspectoEspacio" type="text" class="form-control @error('AspectoEspacio') is-invalid @enderror"
                name="AspectoEspacio" value="{{ old('AspectoEspacio') }}" autocomplete="AspectoEspacio"
                autofocus data-toggle="tooltip" data-placement="top" title="">

            @error('AspectoEspacio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    
    <div class="form-group row g-3">
        <label for="Interferecia"
            class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>
        <div class="col-md-6">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBCableado" value="CBCableado" name="CBCableado">
                <label class="form-check-label" for="CBCableado">Cableado aéreo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBInfra" value="CBInfra" name="CBInfra">
                <label class="form-check-label" for="CBInfra">Infraestructura</label>
            </div>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="checkbox" id="CBMobili" value="CBMobili" name="CBMobili">
                <label class="form-check-label" for="CBMobili">Mobiliario urbano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBSena" value="CBSena" name="CBSena">
                <label class="form-check-label" for="CBSena">Señalamientos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBEdifi" value="CBEdifi" name="CBEdifi">
                <label class="form-check-label" for="CBEdifi">Edificación</label>
            </div>
        </div>
    </div>
    <hr>
</div>