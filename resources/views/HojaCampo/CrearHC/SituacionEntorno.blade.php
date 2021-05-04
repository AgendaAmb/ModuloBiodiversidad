<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Situación y entorno</h2>
    <div class="form-group row g-3">
        <label for="NoEjemplar" class="col-md-4 col-form-label text-md-left">{{ __('No. de ejemplar') }}</label>
        <div class="col-md-6">
            @if ($nuevo)
            <input id="NoEjemplar" v-model="NoEjem" readonly type="text"
                class="form-control @error('NoEjemplar') is-invalid @enderror" name="NoEjemplar"
                value="{{old('NoEjemplar') }}" maxlength="40" required autocomplete="NoEjemplar" autofocus>

            @error('NoEjemplar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @else
            <input id="NoEjemplar" readonly type="text" class="form-control @error('NoEjemplar') is-invalid @enderror"
                name="NoEjemplar" value="{{$Planta->SituacionEntorno->No_Ejemplar}}" maxlength="40" required
                autocomplete="NoEjemplar" autofocus>
            @endif

        </div>

    </div>
    <div class="form-group row g-3 was-validated">
        <label for="EntidadA" class="col-md-4 col-form-label text-md-left">{{ __('Entidad Académica') }}</label>
        @if ($nuevo)
        <div class="col-md-6">
            <select class="custom-select" id="EntidadA" name="EntidadA" v-model="Entidad_id" required
                @change="FiltroSubUnidades()">
                <option selected disabled value="">Entidad Académica</option>
                <option v-for="(N,index) in SubUnidadesP" :value="N.IdUnidad">@{{N.NombreUnidad}}</option>
            </select>
        </div>
        @else

        <div class="col-md-6">
            <select class="custom-select" id="EntidadA" name="EntidadA">
                <option selected disabled value="">

                    @foreach ($SubUnidades as $unidad)

                    @if ($unidad["IdUnidad"]==$Planta->SituacionEntorno->EntidadAcademica)
                    {{$unidad["SubUnidad"]}}
                    @break
                    @endif
                    @endforeach

                </option>

            </select>
        </div>
        @endif


    </div>
    <div class="form-group row g-3 was-validated">
        <label for="SubUnidadesFiltrada"
            class="col-md-4 col-form-label text-md-left">{{ __('SubUnidad Academica') }}</label>
        @if ($nuevo)
        <div class="col-md-6">
            <select class="custom-select" id="SubUnidadesFiltrada" name="SubUnidadesFiltrada" required>
                <option selected disabled value="">SubUnidadAcademica</option>
                <option v-for="(A,index) in SubUnidadesFiltrada" :value="A.NombreUnidad">@{{A.NombreUnidad}}</option>
            </select>
        </div>
        @else
        <div class="col-md-6">
            <select class="custom-select" id="SubUnidadesFiltrada" name="SubUnidadesFiltrada">
                <option selected disabled value="">{{$Planta->SituacionEntorno->SubEntidadAcademica}}</option>
            </select>
        </div>
        @endif

    </div>
    <div class="form-group row">
        <label for="Coordenadageográfica"
            class="col-md-4 col-form-label text-md-left">{{ __('Coordenada geográfica') }}<br></label>
        <div class="col-md-6">

            <input id="Latitud" type="text" class="form-control  @error('Latitud') is-invalid @enderror" name="Latitud"
                value="{{$nuevo?old('Latitud'):$Planta->SituacionEntorno->Latitud}}" {{$isReO? "readonly":""}}
                autocomplete="Latitud" autofocus data-toggle="tooltip" data-placement="top" placeholder="Latitud">
            @error('Latitud')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="col-md-12 p-0 pt-1">

                <input id="longitud" type="text" class="form-control  @error('longitud') is-invalid @enderror"
                    name="longitud" value="{{$nuevo?old('longitud'):$Planta->SituacionEntorno->Altitud}}"
                    {{$isReO? "readonly":""}} autocomplete="longitud" autofocus data-toggle="tooltip"
                    data-placement="top" placeholder="Longuitud">
                @error('longitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
    </div>

    @if ($nuevo)
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
    @else
    <div class="form-group row g-3">
        <label for="TAreaVerde"
            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de área verde o lugar de plantación') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="TAreaVerde" name="TAreaVerde">
                @if (is_null($Planta->SituacionEntorno->TArea))
                <option selected disabled>Sin Estado Tipo de Área Verde Registrado</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="1")
                <option selected disabled value="1">1 (Jardín)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="2")
                <option selected disabled value="2">2 (Andador)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="3")
                <option selected disabled value="3">3 (Jardinera)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="4")
                <option selected disabled value="4">4 (Camellón)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="5")
                <option selected disabled value="5"> 5 (reja)</option>
                @else
                <option selected disabled value="6">6 (Muro)</option>
                @endif
                @endif
                @endif
                @endif
                @endif
                @endif
            </select>
        </div>
    </div>
    @endif

    <x-typeInput labelFor="AspectoEspacio" isRequiered="true" isReadOnly="{{boolval($isReO)}}"
        label="Aspectos de espacio" haveValue="true" value="{{$nuevo?null:$Planta->SituacionEntorno->Aspecto}}">
    </x-typeInput>
    <!--
    <div class="form-group row g-3">
        <label for="AspectoEspacio" class="col-md-4 col-form-label text-md-left">{{ __('Aspectos de espacio') }}</label>

        <div class="col-md-6">
            <input id="AspectoEspacio" type="text" class="form-control @error('AspectoEspacio') is-invalid @enderror"
                name="AspectoEspacio" value="{{ old('AspectoEspacio') }}" autocomplete="AspectoEspacio" autofocus
                data-toggle="tooltip" data-placement="top" title="">

            @error('AspectoEspacio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
-->

    <div class="form-group row g-3">
        <label for="Interferecia"
            class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>

        <div class="col-md-6">
            <div class="form-check form-check-inline">
                <!--checked-->
                <input class="form-check-input" type="checkbox" id="CBCableado"
                    {{$nuevo?null:json_decode($Planta->SituacionEntorno->Interfencia)->Sena!=null?'checked':''}}
                    value="CBCableado" name="CBCableado" {{$nuevo?null:'disabled'}}>
                <label class="form-check-label" for="CBCableado">Cableado aéreo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBInfra" value="CBInfra"
                    {{$nuevo?null:json_decode($Planta->SituacionEntorno->Interfencia)->Edifi!=null?'checked':''}}
                    {{$nuevo?null:'disabled'}} name="CBInfra">
                <label class="form-check-label" for="CBInfra">Infraestructura</label>
            </div>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="checkbox" id="CBMobili" value="CBMobili"
                    {{$nuevo?null:json_decode($Planta->SituacionEntorno->Interfencia)->Infra!=null?'checked':''}}
                    {{$nuevo?null:'disabled'}} name="CBMobili">
                <label class="form-check-label" for="CBMobili">Mobiliario urbano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBSena" value="CBSena"
                    {{$nuevo?null:json_decode($Planta->SituacionEntorno->Interfencia)->Mobili!=null?'checked':''}}
                    name="CBSena" {{$nuevo?null:'disabled'}}>
                <label class="form-check-label" for="CBSena">Señalamientos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBEdifi" value="CBEdifi"
                    {{$nuevo?null:json_decode($Planta->SituacionEntorno->Interfencia)->Cableado!=null?'checked':''}}
                    name="CBEdifi" {{$nuevo?null:'disabled'}}>
                <label class="form-check-label" for="CBEdifi">Edificación</label>
            </div>
        </div>
    </div>
    <hr>
</div>