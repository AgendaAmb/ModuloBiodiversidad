<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Situación y entorno</h2>
    <div class="form-group row g-3">
        <label for="NoEjemplar" class="col-md-4 col-form-label text-md-left">{{ __('No. de ejemplar') }}</label>
        <div class="col-md-8">
            <input id="NoEjemplar" readonly type="text" class="form-control @error('NoEjemplar') is-invalid @enderror"
            name="NoEjemplar" value="{{$Planta->SituacionEntorno->No_Ejemplar}}" maxlength="40" required
            autocomplete="NoEjemplar" autofocus>


        </div>

    </div>
    <div class="form-group row g-3 was-validated">
        <label for="EntidadA" class="col-md-4 col-form-label text-md-left">{{ __('Entidad Académica') }}</label>
        <div class="col-md-8">
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
       
    </div>
    <div class="form-group row g-3 was-validated">
        <label for="SubUnidadesFiltrada"
            class="col-md-4 col-form-label text-md-left">{{ __('SubUnidad Academica') }}</label>
       
        <div class="col-md-8">
            <select class="custom-select" id="SubUnidadesFiltrada" name="SubUnidadesFiltrada">
                <option selected disabled value="">{{$Planta->SituacionEntorno->SubEntidadAcademica}}</option>
            </select>
        </div>
     

    </div>
    <div class="form-group row was-validated">
        <label for="Coordenadageográfica"
            class="col-md-4 col-form-label text-md-left">{{ __('Coordenada geográfica') }}<br></label>
        <div class="col-md-8">
          
            <div class="col-md-12 p-0 pt-1">
                <input id="Latitud" type="text" class="form-control  @error('Latitud') is-invalid @enderror" name="Latitud" required
                value="{{$Planta->SituacionEntorno->Latitud}}" {{$isReO? "readonly":""}}
                autocomplete="Latitud" autofocus data-toggle="tooltip" data-placement="top" placeholder="Latitud" >
                <span class="invalid-feedback" id="LatitudOK"></span>
                @error('Latitud')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="col-md-12 p-0 pt-1">
                <input id="longitud" type="text" class="form-control  @error('longitud') is-invalid @enderror"
                    name="longitud" value="{{$Planta->SituacionEntorno->Altitud}}" required
                    {{$isReO? "readonly":""}} autocomplete="longitud" autofocus data-toggle="tooltip"
                    data-placement="top" placeholder="Longuitud">
                    <span class="invalid-feedback" id="longitudOK"></span>
                @error('longitud')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            </div>
        </div>
    </div>

  
    <div class="form-group row g-3">
        <label for="TAreaVerde"
            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de área verde o lugar de plantación') }}</label>

        <div class="col-md-8">
            <select class="custom-select" id="TAreaVerde" name="TAreaVerde">
                @if (is_null($Planta->SituacionEntorno->TArea))
                <option selected disabled>Sin Estado Tipo de Área Verde Registrado</option>
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="1")
                <option selected  value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="2")
                <option value="1">1 (Jardín)</option>
             
                <option selected  value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="3")
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
              
                <option selected  value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="4")
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option selected  value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                @if ($Planta->SituacionEntorno->TArea=="5")
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option selected disabled value="5"> 5 (reja)</option>
                <option value="6">6 (Muro)</option>
                @else
                <option value="1">1 (Jardín)</option>
                <option value="2">2 (Andador)</option>
                <option value="3">3 (Jardinera)</option>
                <option value="4">4 (Camellón)</option>
                <option value="5">5 (reja)</option>
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
   

    <x-typeInput labelFor="AspectoEspacio"  isReadOnly="{{boolval($isReO)}}"
        label="Aspectos de espacio" haveValue="{{true}}" value="{{$Planta->SituacionEntorno->Aspecto}}">
    </x-typeInput>

    <div class="form-group row g-3">
        <label for="Interferecia"
            class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>

        <div class="col-md-6">
            <div class="form-check form-check-inline">
                <!--checked-->
                <input class="form-check-input" type="checkbox" id="CBCableado"
                    {{(json_decode($Planta->SituacionEntorno->Interfencia)->Sena)!=null?'checked':''}}
                    value="CBCableado" name="CBCableado">
                <label class="form-check-label" for="CBCableado">Cableado aéreo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBInfra" value="CBInfra"
                    {{(json_decode($Planta->SituacionEntorno->Interfencia)->Edifi)!=null?'checked':''}}
                    name="CBInfra">
                <label class="form-check-label" for="CBInfra">Infraestructura</label>
            </div>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="checkbox" id="CBMobili" value="CBMobili"
                    {{(json_decode($Planta->SituacionEntorno->Interfencia)->Infra)!=null?'checked':''}}
                    name="CBMobili">
                <label class="form-check-label" for="CBMobili">Mobiliario urbano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBSena" value="CBSena"
                    {{(json_decode($Planta->SituacionEntorno->Interfencia)->Mobili!=null)?'checked':''}}
                    name="CBSena">
                <label class="form-check-label" for="CBSena">Señalamientos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="CBEdifi" value="CBEdifi"
                    {{(json_decode($Planta->SituacionEntorno->Interfencia)->Cableado)!=null?'checked':''}}
                    name="CBEdifi">
                <label class="form-check-label" for="CBEdifi">Edificación</label>
            </div>
        </div>
    </div>
    <hr>
</div>