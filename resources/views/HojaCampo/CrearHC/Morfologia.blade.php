<div class="col-xl-6">
    <h2 class="alert alert-primary text-center">Morfología y estado de fitosanitarios básicos</h2>
    <!--
    <div class="form-group row g-3">
        <label for="CondicionG" class="col-md-4 col-form-label text-md-left">{{ __('Condición General') }}</label>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="CondicionG" type="text"
                class="form-control @error('CondicionG') is-invalid @enderror" name="CondicionG"
                value="{{ old('CondicionG') }}" autofocus></textarea>
        </div>
    </div>
-->
    <x-typeInput labelFor="CondicionG" typeInput="text" label="Condición General" isTextArea="true" haveValue="true"
        isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->CondicionGeneral}}">
    </x-typeInput>



    @if ($nuevo)
    <div class="form-group row g-3">
        <label for="EstadoCrecimiento"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado de Crecimiento') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="EstadoCrecimiento" name="Ecrecimiento">
                <option selected disabled value="">Estado de Crecimiento</option>
                <option value="1">1 (Juvenil)</option>
                <option value="2">2 (Adulto)</option>
                <option value="3">3 (Maduro)</option>
            </select>
        </div>
    </div>
    @else
    <div class="form-group row g-3">
        <label for="EstadoCrecimiento"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado de Crecimiento') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="EstadoCrecimiento" name="Ecrecimiento">
                @if (is_null($Planta->Morfologia->EstadoCrecimiento))
                <option selected disabled>Sin Estado de Crecimiento Registrado</option>
                @else
                @if ($Planta->Morfologia->EstadoCrecimiento=="1")
                <option selected disabled value="1">1 (Juvenil)</option>
                @else
                @if ($Planta->Morfologia->EstadoCrecimiento=="2")
                <option selected disabled value="2">2 (Adulto)</option>
                @else
                <option selected disabled value="3">3 (Maduro)</option>
                @endif
                @endif
                @endif
            </select>
        </div>
    </div>
    @endif
    <x-typeInput labelFor="Altura" typeInput="number" isReadOnly="{{boolval($isReO)}}" label="Altura (m)"
        haveValue="true" value="{{$nuevo?null:$Planta->Morfologia->Altura}}">
        >
    </x-typeInput>
    <!--
         <div class="form-group row g-3">
        <label for="Altura" class="col-md-4 col-form-label text-md-left">{{ __('Altura (m) ') }}</label>

        <div class="col-md-6">
            <input id="Altura" type="number" step="0.0001" min="0.0001"
                class="form-control @error('Altura') is-invalid @enderror" name="Altura"
                value="{{ old('Altura') }}"  autocomplete autofocus
                data-toggle="tooltip" data-placement="top" title="Altura en metros">

            @error('Altura')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    -->
    <x-typeInput labelFor="AlturaLi" typeInput="number" label="Altura (m) (reportada por literatura)"
        isReadOnly="{{boolval($isReO)}}" haveValue="true" value="{{$nuevo?null:$Planta->Morfologia->AlturaLiteratura}}">
    </x-typeInput>
    <!--
        <div class="form-group row g-3">
            <label for="AlturaLi"
            class="col-md-4 col-form-label text-md-left">{{ __('Altura (m) (reportada por literatura) ') }}</label>
            
            <div class="col-md-6">
                <input id="AlturaLi" type="number" step="0.0001" min="0.0001"
                class="form-control @error('AlturaLi') is-invalid @enderror" name="AlturaLi"
                value="{{ old('AlturaLi') }}" autocomplete="AlturaLi" autofocus
                data-toggle="tooltip" data-placement="top"
                title="Altura en metros reportada por literatura">
                
                @error('AlturaLi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    -->
    <x-typeInput :labelFor="'Copa'" :isRequiered="false" :isReadOnly="false" :label="'Copa(tipo)'"
        isReadOnly="{{boolval($isReO)}}" haveValue="true" value="{{$nuevo?null:$Planta->Morfologia->Tcopa}}">
    </x-typeInput>
    <!--
        <div class="form-group row g-3">
        <label for="Copa" class="col-md-4 col-form-label text-md-left">{{ __('Copa(tipo)') }} </label>

        <div class="col-md-6">
            <input id="Copa" type="text" class="form-control @error('Copa') is-invalid @enderror"
                name="Copa" value="{{ old('Copa') }}"  autocomplete="Copa" autofocus
                data-toggle="tooltip" data-placement="top" title="">

            @error('Copa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
     -->
    <x-typeInput labelFor="DiametroC" typeInput="number" label="Diametro de copa (m)" isReadOnly="{{boolval($isReO)}}"
        haveValue="true" value="{{$nuevo?null:$Planta->Morfologia->DiametroCopa}}">
    </x-typeInput>
    <!--
         <div class="form-group row g-3">
        <label for="DiametroC"
            class="col-md-4 col-form-label text-md-left">{{ __('Diametro de copa (m)') }}</label>

        <div class="col-md-6">
            <input id="DiametroC" type="number" step="0.0001" min="0.0001"
                class="form-control @error('DiametroC') is-invalid @enderror" name="DiametroC"
                value="{{ old('DiametroC') }}" autocomplete="DiametroC" autofocus
                data-toggle="tooltip" data-placement="top" title="Diametro de la copa en metros">

            @error('DiametroC')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    -->

    <!--
     <div class="form-group row g-3">
        <label for="Raices" class="col-md-4 col-form-label text-md-left">{{ __('Raíces') }}</label>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="Raices" type="text"
                class="form-control @error('Raices') is-invalid @enderror" name="Raices"
                value="{{ old('Raices') }}"  autocomplete autofocus></textarea>
        </div>
    </div>
    -->

    <x-typeInput labelFor="Raices" typeInput="text" label="Raíces" isTextArea="true" haveValue="true"
        isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->Raices}}">

    </x-typeInput>
    <!--
    <div class="form-group row g-3">
        <label for="TRaices"
            class="col-md-4 col-form-label text-md-left">{{ __('Tipo de Raíces') }}</label>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="TRaices" type="text"
                class="form-control @error('Raices') is-invalid @enderror" name="TRaices"
                value="{{ old('TRaices') }}"  autocomplete autofocus></textarea>
        </div>
    </div>
-->
    <x-typeInput labelFor="TRaices" typeInput="text" label="Tipo de Raíces" isTextArea="true" haveValue="true"
        isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->TRaices}}">
    </x-typeInput>
    @if ($nuevo)
    <div class="form-group row g-3">
        <label for="Manejo" class="col-md-4 col-form-label text-md-left">{{ __('Manejo') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="Manejo" name="Manejo">
                <option selected disabled>Manejo</option>
                <option value="1">1 (Baja)</option>
                <option value="2">2 (Regular)</option>
                <option value="3">3 (Alta)</option>
            </select>
        </div>
    </div>
    @else
    <div class="form-group row g-3">
        <label for="Manejo" class="col-md-4 col-form-label text-md-left">{{ __('Manejo') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="Manejo" name="Manejo">
                @if (is_null($Planta->Morfologia->Manejo))
                <option selected disabled>Sin Manejo Registrado</option>
                @else

                @endif
                @if ($Planta->Morfologia->Manejo=="1")
                <option selected disabled value="1">1 (Baja)</option>
                @else
                @if ($Planta->Morfologia->Manejo=="2")
                <option selected disabled value="2">2 (Regular)</option>
                @else
                <option selected disabled value="3">3 (Alta)</option>
                @endif
                @endif
            </select>
        </div>
    </div>
    @endif


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

    <x-typeInput labelFor="DanosFisicosText" typeInput="text" label="" isTextArea="true" haveValue="true"
        isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->DanosF}}">
    </x-typeInput>
    <!--
    <div class="form-group row g-3">
        <div class="col-md-4 col-form-label text-md-left"></div>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="DanosFisicosText" type="text"
                class="form-control @error('DanosFisicosText') is-invalid @enderror" name="DanosFisicosText"
                value="{{ old('DanosFisicosText') }}" autocomplete="DanosFisicosText" autofocus></textarea>
        </div>
    </div>
-->

    @if ($nuevo)
    <div class="form-group row g-3">
        <label for="EstadoFitosanitario"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado fitosanitario aparente') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="EstadoFitosanitario" name="EstadoFiso">
                <option selected disabled>Estado</option>
                <option value="1">1 (Favorable)</option>
                <option value="2">2 (Medio)</option>
                <option value="3">3 (Desfavorable)</option>
            </select>
        </div>
    </div>
    @else
    <div class="form-group row g-3">
        <label for="EstadoFitosanitario"
            class="col-md-4 col-form-label text-md-left">{{ __('Estado fitosanitario aparente') }}</label>

        <div class="col-md-6">
            <select class="custom-select" id="EstadoFitosanitario" name="EstadoFiso">
                @if (is_null($Planta->Morfologia->EstadoFiso))
                <option selected disabled>Sin Estado Registrado</option>
                @else
                @if ($Planta->Morfologia->EstadoFiso=="1")
                <option selected disabled value="1">1 (Favorable)</option>
                @else
                @if ($Planta->Morfologia->EstadoFiso=="2")
                <option selected disabled value="2">2 (Medio)</option>
                @else
                <option selected disabled value="3">3 (Desfavorable)</option>
                @endif
                @endif
                @endif

            </select>
        </div>
    </div>
    @endif
    <x-typeInput labelFor="EnfermedadesA" typeInput="text" label="Enfermedades Aparentes" isTextArea="true"
        haveValue="true" isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->EnfermeAparentes}}">
    </x-typeInput>
    <!--
    <div class="form-group row g-3">
        <label for="EnfermedadesA"
            class="col-md-4 col-form-label text-md-left">{{ __('Enfermedades Aparentes') }}</label>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="EnfermedadesA" type="text"
                class="form-control @error('EnfermedadesA') is-invalid @enderror" name="EnfermedadesA"
                value="{{ old('EnfermedadesA') }}" autocomplete="EnfermedadesA" maxlength="400" autofocus></textarea>
        </div>
    </div>
-->
    <x-typeInput labelFor="EnfermedadesP" typeInput="text" label="Enfermedades Probables" isTextArea="true"
        haveValue="true" isReadOnly="{{boolval($isReO)}}" value="{{$nuevo?null:$Planta->Morfologia->EnfermeLitera}}">
    </x-typeInput>
    <!--
    <div class="form-group row g-3">
        <label for="EnfermedadesP"
            class="col-md-4 col-form-label text-md-left">{{ __('Enfermedades Probables') }}</label>
        <div class="col-md-6">
            <textarea aria-label="With textarea" id="EnfermedadesP" type="text" maxlength="400"
                class="form-control @error('EnfermedadesP') is-invalid @enderror" name="EnfermedadesP"
                value="{{ old('EnfermedadesP') }}" autocomplete="EnfermedadesP" autofocus></textarea>
        </div>
    </div>
-->
</div>