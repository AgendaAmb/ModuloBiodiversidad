<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Morfología y estado de fitosanitarios básicos</h2>

    <x-typeInput labelFor="CondicionG" typeInput="text" label="Condición General" isTextArea="true" haveValue="{{true}}"
        isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->CondicionGeneral}}">
    </x-typeInput>

    <div class="form-group row g-3">
        <label for="EstadoCrecimiento"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado de Crecimiento') }}</label>

        <div class="col-md-8">
            <select class="custom-select" id="EstadoCrecimiento" name="Ecrecimiento">
                @if (is_null($Planta->Morfologia->EstadoCrecimiento))
                <option selected disabled>Sin Estado de Crecimiento Registrado</option>
                <option value="1">1 (Juvenil)</option>
                <option value="2">2 (Adulto)</option>
                <option value="3">3 (Maduro)</option>
                @else
                @if ($Planta->Morfologia->EstadoCrecimiento=="1")
                <option selected value="1">1 (Juvenil)</option>
                <option value="2">2 (Adulto)</option>
                <option value="3">3 (Maduro)</option>
                @else
                @if ($Planta->Morfologia->EstadoCrecimiento=="2")
                <option value="1">1 (Juvenil)</option>
                <option selected value="2">2 (Adulto)</option>
                <option value="3">3 (Maduro)</option>
                @else
                <option value="1">1 (Juvenil)</option>
                <option value="2">2 (Adulto)</option>
                <option selected value="3">3 (Maduro)</option>
                @endif
                @endif
                @endif
            </select>
        </div>
    </div>
  
    <x-typeInput labelFor="Altura" typeInput="number" isReadOnly="{{boolval($isReO)}}" label="Altura (m)"
        haveValue="{{true}}" value="{{$Planta->Morfologia->Altura}}">
        >
    </x-typeInput>

    <x-typeInput labelFor="AlturaLi" typeInput="number" label="Altura (m) (reportada por literatura)"
        isReadOnly="{{boolval($isReO)}}" haveValue="{{true}}" value="{{$Planta->Morfologia->AlturaLiteratura}}">
    </x-typeInput>

    <x-typeInput :labelFor="'Copa'" :isRequiered="false" :isReadOnly="false" :label="'Copa(tipo)'"
        isReadOnly="{{boolval($isReO)}}" haveValue="{{true}}" value="{{$Planta->Morfologia->Tcopa}}">
    </x-typeInput>

    <x-typeInput labelFor="DiametroC" typeInput="number" label="Diametro de copa (m)" isReadOnly="{{boolval($isReO)}}"
        haveValue="{{true}}" value="{{$Planta->Morfologia->DiametroCopa}}">
    </x-typeInput>

    <x-typeInput labelFor="Raices" typeInput="text" label="Raíces" isTextArea="true" haveValue="{{true}}"
        isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->Raices}}">

    </x-typeInput>

    <x-typeInput labelFor="TRaices" typeInput="text" label="Tipo de Raíces" isTextArea="true" haveValue="{{true}}"
        isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->TRaices}}">
    </x-typeInput>

    <div class="form-group row g-3">
        <label for="Manejo" class="col-md-4 col-form-label text-md-left">{{ __('Manejo') }}</label>

        <div class="col-md-8">
            <select class="custom-select" id="Manejo" name="Manejo">
                @if (is_null($Planta->Morfologia->Manejo))
                <option selected disabled>Sin Manejo Registrado</option>
                <option value="1">1 (Baja)</option>
                <option value="2">2 (Regular)</option>
                <option value="3">3 (Alta)</option>
                @else

                @endif
                @if ($Planta->Morfologia->Manejo=="1")
                <option selected value="1">1 (Baja)</option>
                <option value="2">2 (Regular)</option>
                <option value="3">3 (Alta)</option>
                @else
                @if ($Planta->Morfologia->Manejo=="2")
                <option value="1">1 (Baja)</option>
                <option selected value="2">2 (Regular)</option>
                <option value="3">3 (Alta)</option>
                @else
                <option value="1">1 (Baja)</option>
                <option value="2">2 (Regular)</option>
                <option selected value="3">3 (Alta)</option>
                @endif
                @endif
            </select>
        </div>
    </div>
    <div class="form-group row g-3">
        <label for="DanosFisicos"
            class="col-md-4 col-form-label text-md-left">{{ __('Presencia de daños físicos') }}</label>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input"
                onclick="DFisicos(1)">
            <label class="custom-control-label" for="customRadioInline1">Si</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input"
                onclick="DFisicos(0)">
            <label class="custom-control-label" for="customRadioInline2">No</label>
        </div>
    </div>

    <x-typeInput labelFor="DanosFisicosText" typeInput="text" label="" isTextArea="true" haveValue="{{true}}"
        isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->DanosF}}">
    </x-typeInput>


    <div class="form-group row g-3">
        <label for="EstadoFitosanitario"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado fitosanitario aparente') }}</label>

        <div class="col-md-8">
            <select class="custom-select" id="EstadoFitosanitario" name="EstadoFiso">
                @if (is_null($Planta->Morfologia->EstadoFiso))
                <option selected disabled>Sin Estado Registrado</option>
                <option value="1">1 (Favorable)</option>
                <option value="2">2 (Medio)</option>
                <option value="3">3 (Desfavorable)</option>
                @else
                @if ($Planta->Morfologia->EstadoFiso=="1")
                <option selected  value="1">1 (Favorable)</option>
                <option value="2">2 (Medio)</option>
                <option value="3">3 (Desfavorable)</option>
                @else
                @if ($Planta->Morfologia->EstadoFiso=="2")
                <option value="1">1 (Favorable)</option>
                <option selected  value="2">2 (Medio)</option>
                <option value="3">3 (Desfavorable)</option>
                @else
                <option value="1">1 (Favorable)</option>
                <option value="2">2 (Medio)</option>
                <option selected  value="3">3 (Desfavorable)</option>
                @endif
                @endif
                @endif

            </select>
        </div>
    </div>

    <x-typeInput labelFor="EnfermedadesA" typeInput="text" label="Enfermedades Aparentes" isTextArea="true"
        haveValue="{{true}}" isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->EnfermeAparentes}}">
    </x-typeInput>
   
    <x-typeInput labelFor="EnfermedadesP" typeInput="text" label="Enfermedades Probables" isTextArea="true"
        haveValue="{{true}}" isReadOnly="{{boolval($isReO)}}" value="{{$Planta->Morfologia->EnfermeLitera}}">
    </x-typeInput>
 
</div>