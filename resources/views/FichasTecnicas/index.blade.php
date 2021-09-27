<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>
@extends('dashboard.main')

@section('contenido')

@if (isset($FichaTecnica))
{{$nuevo=false}}
<div class="container-xl-6">
    <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a>
</div>
@else
<h5 class="d-none">{{$nuevo=true}}</h5>

@endif


<body>
    <div class="container-fluid justify-content-between p-0" id="appp">
        <div class="container mb-4">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 contImagen">
                    <img src="{{asset('storage/Logos/horizontal_azulR.png')}}" id="LogoUaslpAgenda"
                        alt="Logo uaslp-Agenda Ambiental" srcset="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 ">
                    <div class="align-self-center" style="font-family:Myraid Pro Bold; ">
                        <h4 class="pt-5">Ficha técnica </h4>
                        <span> </span>
                    </div>
                </div>

            </div>
        </div>
        <div id="nosotros">
            @if(session()->has('message'))
            <div class="alert alert-success text-center">
                <h2>
                    {{session()->get('message') }}
                </h2>
            </div>
            @endif
            @if (!$nuevo&&$FichaTecnica->Estado=="Rechazada")
            <div class="container-fluid mx-0 mb-2">
                <div class="row justify-content-end">
                    <div class="col-auto text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Ver retroalimentación
                        </button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Motivio de Rechazo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$FichaTecnica->MotivoRechazo}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" href="{{route('UserFTEdit',['id'=>$FichaTecnica->id])}}"
                                role="button">Modificar</a>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($nuevo)
            <form method="POST" action="{{route('FichasT')}}" enctype="multipart/form-data">
                @else
                <form method="POST" action="{{route('EditarFT',['id'=>$FichaTecnica->id])}}"
                    enctype="multipart/form-data">

                    @endif
                    @csrf
                    <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
                        <div class="col mb-4 " v-for="(a, index) in archivos">
                            <div class="card w-100 ">
                                <h5 class="card-title text-center">@{{a.parteP}} </h5>
                                @if ($nuevo)
                                <div class="card-body">
                                    <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre" :src="a.imagen"
                                        alt="Card image cap">
                                </div>
                                @else
                                <div class="card-body">
                                    <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre"
                                        :src="'{{asset('storage/')}}'+a.imagen" alt="Card image cap">
                                </div>
                                @endif


                                <div class="card-footer pl-5">
                                    @if ($nuevo)
                                    <small class="text-muted">
                                        <input type="file" accept="image/png,image/jpeg" :id="'fileImg'+index"
                                            :name="'fileImg'+index" class="inp" @change="cargarImagen($event,index)"
                                            required />
                                    </small>
                                    @else

                                    @endif


                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="alert alert-warning text-right" role="alert">
                        <b>
                            La previsualización de las imagenes no representa la calidad real de las mismas.*
                        </b>
                    </div>



                    <div class="form-row justify-content-between ">
                        <div class="col-xl-6">
                            <h2 class="alert alert-primary text-center">Datos generales</h2>
                            <x-typeInput labelFor="FechaRecoleccion" isRequiered="true" typeInput="date"
                                isReadOnly="{{boolval($isReO)}}" label="Fecha de recoleccion de datos"
                                haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?null:$FichaTecnica->FechaRecoleccion}}">
                            </x-typeInput>
                            <x-typeInput labelFor="FechaFotografia" isRequiered="true" typeInput="date"
                                isReadOnly="{{boolval($isReO)}}" label="Fecha de fotografía"
                                haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?null:$FichaTecnica->FechaRecoleccion}}">
                            </x-typeInput>
                            <x-typeInput labelFor="NombreRecolectorD" isRequiered="true"
                                isReadOnly="{{boolval($isReO)}}" label="Nombre del recolector de datos"
                                haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?false:$FichaTecnica->NombreRecolectorDatos}}">
                            </x-typeInput>
                            <x-typeInput labelFor="NombreRecolectorm" isRequiered="true"
                                isReadOnly="{{boolval($isReO)}}" label="Nombre del recolector de muestra"
                                haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?null:$FichaTecnica->NombreRecolectorMuestra}}">
                            </x-typeInput>
                            <x-typeInput labelFor="NombreAutorFoto" isRequiered="true" isReadOnly="{{boolval($isReO)}}"
                                label="Nombre de autor de fotografías" haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?null:$FichaTecnica->NombreAutorFoto}}">

                            </x-typeInput>
                        </div>
                        <div class="col-xl-6">
                            <h2 class="alert alert-primary text-center">Caracteristicas de la especie</h2>
                            @if (!$nuevo)
                            <p style="display: none;">
                                @foreach ($Ejemplar as $item)
                                @if ($item->id==$FichaTecnica->id)
                                {{$Nomb=$item->NombreComun}}
                                {{$NombC=$item->NombreCientifico}}
                                @endif
                                @endforeach
                            </p>
                            <div class="form-group row g-3 was-validated">
                                <label for="NombreC"
                                    class="col-md-4 col-form-label text-md-left">{{ __('Nombre común') }}</label>
                                <div class="col-md-7">
                                    <input id="NombreC" readonly type="text"
                                        class="form-control @error('NombreCientifico') is-invalid @enderror"
                                        name="NombreCientifico" maxlength="40" value={{$Nomb}} required
                                        autocomplete="NombreCientifico" autofocus>
                                    @error('NombreCientifico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else
                            <div class="form-group row  was-validated">
                                <label for="NombreC"
                                    class="col-md-4 col-form-label text-md-left pr-0">{{ __('Nombre común') }}</label>
                                <div class="col-md-8">
                                    <select class="custom-select" id="NombreC" name="NombreC" v-model="NombreC"
                                        @change="Ncientifico()" required>
                                        <option selected="true" disabled>Nombre común</option>
                                        <option v-for="(N,index) in Nombres" :value="N.id">@{{N.Nombre}}</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if (!$nuevo)
                            <div class="form-group row g-3 was-validated">
                                <label for="NombreCientifico"
                                    class="col-md-4 col-form-label text-md-left">{{ __('Nombre científico') }}</label>
                                <div class="col-md-7">
                                    <input id="NombreCientifico" readonly type="text"
                                        class="form-control @error('NombreCientifico') is-invalid @enderror"
                                        name="NombreCientifico" value={{$NombC}} maxlength="40" required
                                        autocomplete="NombreCientifico" autofocus>
                                    @error('NombreCientifico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else
                            <div class="form-group row  was-validated">
                                <label for="NombreCientifico"
                                    class="col-md-4 col-form-label text-md-left ">{{ __('Nombre científico') }}</label>
                                <div class="col-md-8 ">
                                    <input id="NombreCientifico" v-model="NCientifico" readonly type="text"
                                        class="form-control @error('NombreCientifico') is-invalid @enderror"
                                        name="NombreCientifico" value="{{old('NombreCientifico') }}" maxlength="40"
                                        required autocomplete="NombreCientifico" autofocus>

                                    @error('NombreCientifico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <x-typeInput :labelFor="'PermanenciaHojas'" :isRequiered="true"
                                :label="'Permanencia de hojas'" haveValue="{{$nuevo?false:true}}"
                                value="{{$nuevo?false:$FichaTecnica->TPertenencia}}" isReadOnly="{{boolval($isReO)}}">
                            </x-typeInput>
                        </div>

                        <div class="col-12">
                            <h2 class="alert alert-primary text-center">Morfología y estado de fitosanitarios básicos
                            </h2>
                            <div class="form-group row">
                                <div class="col-xl-6 ">


                                 
                                    @if ($nuevo)
                                    <div class="form-group row g-3  was-validated">
                                        <label for="FormaCrecimiento"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Forma de crecimiento') }}</label>

                                        <div class="col-md-8">
                                            <select class="custom-select" id="FormaCrecimiento" name="FormaCrecimiento">
                                                <option selected disabled value="">Forma de crecimiento</option>
                                                <option value="Herbacea">Herbacea</option>
                                                <option value="Arbustiva">Arbustiva</option>
                                                <option value="Arborescente">Arborescente</option>
                                                <option value="Arbórea">Arbórea</option>
                                                <option value="Columnar">Columnar</option>
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row g-3">
                                        <label for="FormaCrecimiento"
                                        class="col-md-4 col-form-label text-md-left">{{ __('Forma de crecimiento') }}</label>

                                        <div class="col-md-8">

                                            <select class="custom-select" id="FormaCrecimiento" name="FormaCrecimiento">
                                                @if (is_null($FichaTecnica->Fcrecimiento))
                                                <option selected disabled>Sin Estado de uso registrado</option>
                                                @else
                                                @if ($FichaTecnica->Fcrecimiento=="Herbacea")
                                                <option selected disabled value="Herbacea">Herbacea</option>
                                                @else
                                                @if ($FichaTecnica->Fcrecimiento=="Arbustiva")
                                                <option selected disabled value="Arbustiva">Arbustiva</option>
                                                @else
                                                @if ($FichaTecnica->Fcrecimiento=="Arborescente")
                                                <option selected disabled value="Arborescente">Arborescente</option>
                                                @else
                                                @if ($FichaTecnica->Fcrecimiento=="Arbórea")
                                                <option selected disabled value="Arbórea">Arbórea</option>
                                                @else
                                                <option selected disabled value="Columnar">Columnar</option>
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    @endif

                                    <x-typeInput labelFor="Floracion" :isRequiered="true" typeInput="text"
                                        label="Floración" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->Floracion}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>

                                    <x-typeInput :labelFor="'Origen'" :isRequiered="true" :label="'Origen'"
                                        haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->Origen}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <x-typeInput labelFor="Descripcion" :isRequiered="true" typeInput="text"
                                        label="Descripción" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->Descripcion}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <x-typeInput :labelFor="'EstatusEco'" :isRequiered="true"
                                        :label="'Estatus ecológico en México'" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->EstatusEco}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>

                                      
                                    @if ($nuevo)
                                    <div class="form-group row g-3  was-validated">
                                        <label for="EstatusConser"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Estatus de conservación') }}</label>

                                        <div class="col-md-8">
                                            <select class="custom-select" id="EstatusConser" name="EstatusConser">
                                                <option selected disabled value="">Estatus de conservación</option>
                                                <option value="Peligro de extinción">Peligro de extinción</option>
                                                <option value="Amenaza">Amenaza</option>
                                                <option value="Vulnerable">Vulnerable</option>
                                                <option value="Menor preocupación">Menor preocupación</option>
                                                <option value="Sin problema">Sin problema</option>
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row g-3">
                                        <label for="EstatusConser"
                                        class="col-md-4 col-form-label text-md-left">{{ __('Estatus de conservación') }}</label>

                                        <div class="col-md-8">

                                            <select class="custom-select" id="EstatusConser" name="EstatusConser">
                                                @if (is_null($FichaTecnica->EstatusConv))
                                                <option selected disabled>Sin Estado de uso registrado</option>
                                                @else
                                                @if ($FichaTecnica->EstatusConv=="Peligro de extinción")
                                                <option selected disabled value="Peligro de extinción">Peligro de extinción</option>
                                                @else
                                                @if ($FichaTecnica->EstatusConv=="Amenaza")
                                                <option selected disabled value="Amenaza">Amenaza</option>
                                                @else
                                                @if ($FichaTecnica->EstatusConv=="Vulnerable")
                                                <option selected disabled value="Vulnerable">Vulnerable</option>
                                                @else
                                                @if ($FichaTecnica->EstatusConv=="Menor preocupación")
                                                <option selected disabled value="Menor preocupación">Menor preocupación</option>
                                                @else
                                                <option selected disabled value="Sin problema">Sin problema</option>
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    @endif
                                  
                                    <x-typeInput labelFor="Altura" typeInput="number" :isRequiered="true"
                                        label="Altura en estado natural (m)" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?null:$FichaTecnica->Altura}}" isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>

                                    <x-typeInput labelFor="AlturaCurbanas" typeInput="number" :isRequiered="true"
                                        label="Altura en condiciones urbanas (m)" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?null:$FichaTecnica->Altura}}" isReadOnly="{{boolval($isReO)}}">

                                    </x-typeInput>
                                    <x-typeInput :labelFor="'TipoC'" :isRequiered="true" :label="'Tipo de copa'"
                                        haveValue="{{$nuevo?false:true}}" value="{{$nuevo?null:$FichaTecnica->TipoC}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <x-typeInput :labelFor="'TipoR'" :isRequiered="true" :label="'Tipo de raíces'"
                                        haveValue="{{$nuevo?false:true}}" value="{{$nuevo?null:$FichaTecnica->TipoR}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>


                                </div>
                                <div class="col-xl-6">
                                    <x-typeInput labelFor="RaicesObs" :isRequiered="true" typeInput="text"
                                        label="Raíces observables del ejemplar" isTextArea="true"
                                        haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->RaicesObs}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    @if ($nuevo)
                                    <div class="form-group row g-3  was-validated">
                                        <label for="Usos"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Usos') }}</label>

                                        <div class="col-md-8">
                                            <select class="custom-select" id="Usos" name="Usos">
                                                <option selected disabled value="">Usos</option>
                                                <option value="Ornamental(estético)">Ornamental(estético)</option>
                                                <option value="Medicinal">Medicinal</option>
                                                <option value="Comestible">Comestible</option>
                                                <option value="Sombra">Sombra</option>
                                                <option value="Aromático">Aromático</option>
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row g-3">
                                        <label for="EstadoCrecimiento"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Estado de crecimiento') }}</label>

                                        <div class="col-md-8">

                                            <select class="custom-select" id="EstadoCrecimiento" name="Ecrecimiento">
                                                @if (is_null($FichaTecnica->Usos))
                                                <option selected disabled>Sin Estado de uso registrado</option>
                                                @else
                                                @if ($FichaTecnica->Usos=="Estetico")
                                                <option selected disabled value="Estetico">Ornamental(estético)</option>
                                                @else
                                                @if ($FichaTecnica->Usos=="Medicinal")
                                                <option selected disabled value="Medicinal">Medicinal</option>
                                                @else
                                                @if ($FichaTecnica->Usos=="Comestible")
                                                <option selected disabled value="Comestible">Comestible</option>
                                                @else
                                                @if ($FichaTecnica->Usos=="Sombra")
                                                <option selected disabled value="Sombra">Sombra</option>
                                                @else
                                                <option selected disabled value="Aromatico">Aromático</option>
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    @endif

                                    @if ($nuevo)
                                    <div class="form-group row g-3  was-validated">
                                        <label for="Porte"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Porte') }}</label>

                                        <div class="col-md-8">
                                            <select class="custom-select" id="Porte" name="Porte">
                                                <option selected disabled value="">Porte</option>
                                                <option value="Chico">Chico</option>
                                                <option value="Mediano">Mediano</option>
                                                <option value="Grande">Grande</option>
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row g-3">
                                        <label for="EstadoCrecimiento"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Estado de crecimiento') }}</label>

                                        <div class="col-md-8">

                                            <select class="custom-select" id="EstadoCrecimiento" name="Ecrecimiento">
                                                @if (is_null($FichaTecnica->Porte))
                                                <option selected disabled>Sin Estado de porte registrado</option>
                                                @else
                                                @if ($FichaTecnica->Porte=="Chico")
                                                <option selected disabled value="Chico">Chico</option>
                                                @else
                                                @if ($FichaTecnica->Porte=="Mediano")
                                                <option selected disabled value="Mediano">Mediano</option>
                                                @else
                                                <option selected disabled value="Grande">Grande</option>
                                                @endif
                                                @endif
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    @endif

                                    <x-typeInput labelFor="ClimaN" :isRequiered="true" typeInput="text"
                                        label="Clima en hábitad  natural" isTextArea="true"
                                        haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->Clima}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>

                                    <x-typeInput labelFor="Requerimientos" :isRequiered="true" typeInput="text"
                                        label="Requerimientos de la especie" isTextArea="true"
                                        haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->RequerimientosE}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <x-typeInput labelFor="ServicioAmbiental" :isRequiered="true" typeInput="text"
                                        label="Servicios ambientales" isTextArea="true"
                                        haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->ServiciosAmb}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <x-typeInput labelFor="AmenazasR" :isRequiered="true" typeInput="text"
                                        label="Amenazas y riesgos" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                                        value="{{$nuevo?false:$FichaTecnica->AmenazasRiesgos}}"
                                        isReadOnly="{{boolval($isReO)}}">
                                    </x-typeInput>
                                    <div class="form-group row g-3">
                                        <label for="Interferecia"
                                            class="col-md-4 col-form-label text-md-left">{{ __('Interferencia aparente con instalaciones inmediatas') }}</label>
                                
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <!--checked-->
                                                <input class="form-check-input" type="checkbox" id="CBCableado"
                                                    {{($nuevo?null:json_decode($FichaTecnica->Interfencia)->Sena)!=null?'checked':''}}
                                                    value="CBCableado" name="CBCableado" {{$nuevo?null:'disabled'}}>
                                                <label class="form-check-label" for="CBCableado">Cableado aéreo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="CBInfra" value="CBInfra"
                                                    {{($nuevo?null:json_decode($FichaTecnica->Interfencia)->Edifi)!=null?'checked':''}}
                                                    {{$nuevo?null:'disabled'}} name="CBInfra">
                                                <label class="form-check-label" for="CBInfra">Infraestructura</label>
                                            </div>
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="checkbox" id="CBMobili" value="CBMobili"
                                                    {{($nuevo?null:json_decode($FichaTecnica->Interfencia)->Infra)!=null?'checked':''}}
                                                    {{$nuevo?null:'disabled'}} name="CBMobili">
                                                <label class="form-check-label" for="CBMobili">Mobiliario urbano</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="CBSena" value="CBSena"
                                                    {{($nuevo?null:json_decode($FichaTecnica->Interfencia)->Mobili!=null)?'checked':''}}
                                                    name="CBSena" {{$nuevo?null:'disabled'}}>
                                                <label class="form-check-label" for="CBSena">Señalamientos</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="CBEdifi" value="CBEdifi"
                                                    {{($nuevo?null:json_decode($FichaTecnica->Interfencia)->Cableado)!=null?'checked':''}}
                                                    name="CBEdifi" {{$nuevo?null:'disabled'}}>
                                                <label class="form-check-label" for="CBEdifi">Edificación</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="col-xl-6 pr-xl-3  pr-lg-3 ">

                            <div class="form-group row g-3" v-show={{$nuevo}}>
                                <label for="nuevo"
                                    class="col-md-4 col-form-label text-md-left">{{ __('Bibliografía') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control px-xl-0" v-model="nuevo"
                                        placeholder="Bibliografia">
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-outline-success " @click="agregar" role="button"><i
                                            class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>


                            <div v-if="Referencias" v-for="Referencia in Referencias">
                                @if (!$nuevo)
                                <li>
                                    @{{Referencia['Referencia']}}
                                </li>
                                @else
                                <li>
                                    @{{Referencia}}
                                </li>
                                @endif

                            </div>
                            <input type="hidden" name="Bibliografia[]" v-for="Referencia in Referencias"
                                :value="Referencia">
                        </div>

                        @if ($nuevo)
                        <div class="container mb-3">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
                            </div>
                        </div>
                        @else
                        @if (Auth::user()->hasAnyRole(['administrador','Coordinador']))
                        @if ($FichaTecnica->Estado=="Verificacion" && $FichaTecnica->MotivoRechazo==null)
                        <div class="container mb-3 mt-5">
                            <div class="row justify-content-between ">
                                <div class="colum ">
                                    <button type="button" class="btn btn-outline-danger btn-lg" data-toggle="modal"
                                        data-target="#Rechazar"
                                        onclick="pasarIdFichaTR({{$FichaTecnica->id}});">Rechazar</button>
                                </div>
                               <!--
                                <div class="colum ">
                                    <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal"
                                      
                                     >Actualizar</button>
                                </div>
                            -->
                                <div class="colum ">
                                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                        data-target="#verificar"
                                        onclick="pasarIdFichaT({{$FichaTecnica->id}});">Verificar</button>
                                </div>
                               
                            </div>

                        </div>
                        @endif
                        @endif
                        @endif
                    </div>


                </form>
        </div>
    </div>

    @if ($nuevo)

    @else
    @if (Auth::user()->hasAnyRole(['administrador','Coordinador']))
    @if ($FichaTecnica->Estado=="Verificacion")
    <x-Modal idModal="verificar" modalTitle="Confirmar Ficha Técnica" isRechazada="false" vista="FT">
    </x-Modal>

    <x-Modal idModal="Rechazar" modalTitle="Rechazar Ficha Técnica" isRechazada="true" vista="FT">
    </x-Modal>
    @endif

    @endif

    @endif

    @endsection

</body>

</html>



@push('scripts')
<script>
    var app = new Vue({
  el: '#appp',
  data: {
    archivos:[],
    NCientifico:'',
    Nombres:[],
    NombreC:'',
    Referencias:[],
    nuevo: ""
  },
  mounted:
  function() {
    this.$nextTick(
          function () {
     @foreach($Ejemplar as $E)
                this.Nombres.push({
                    "id":'{{$E->id}}',
                    "Nombre":'{{$E->NombreComun}}',
                    "NombreC":'{{Str::of($E->NombreCientifico)->title()}}',
                    "Clave":'{{$E->Clave}}'
                });
    @endforeach
    @if (!$nuevo) {
                this.archivos.push(
                    {
                    "imagen":'{{$FichaTecnica->Url_PC}}',
                    "nombre":'Archivo1',
                    "parteP":'Planta completa',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_F}}',
                    "nombre":'Archivo2',
                    "parteP":'Follaje',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_H}}',
                    "nombre":'Archivo3',
                    "parteP":'Hojas',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_FL}}',
                    "nombre":'Archivo4',
                    "parteP":'Flores',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_FR}}',
                    "nombre":'Archivo5',
                    "parteP":'Frutos',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_S}}',
                    "nombre":'Archivo6',
                    "parteP":'Semillas',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_T}}',
                    "nombre":'Archivo7',
                    "parteP":'Tronco',   
                },
                {
                    "imagen":'{{$FichaTecnica->Url_R}}',
                    "nombre":'Archivo8',
                    "parteP":'Raíces',   
                }
                );
                @foreach($Biblio as $B)
                this.Referencias.push({
                    "id":'{{$B->id}}',
                    "Referencia":'{{$B->Referencia}}', 
                });
    @endforeach
    
   }
   @else{
     
    this.archivos = [
        {
            imagen:"",
            nombre:"Archivo1",
            parteP:"Planta completa"
            
        },
        {
            imagen:"",
            nombre:"Archivo2",
            parteP:"Follaje"
        },
        {
            imagen:"",
            nombre:"Archivo3",
            parteP:"Hojas"
            
        },
        {
            imagen:"",
            nombre:"Archivo4",
            parteP:"Flores"
            
        },
        {
            imagen:"",
            nombre:"Archivo5",
            parteP:"Frutos"
            
        },
        {
            imagen:"",
            nombre:"Archivo6",
            parteP:"Semillas"
            
        },
        {
            imagen:"",
            nombre:"Archivo7",
            parteP:"Tronco"
            
        },
        {
            imagen:"",
            nombre:"Archivo8",
            parteP:"Raíces"
            
        },
    ]
   }

   @endif

 
    })
      
  },
  methods:{
    Ncientifico:function(){
        this.Nombres.map((n) => {
            if(document.getElementById('NombreC').value==n.id){
               
                this.NCientifico=n.NombreC
                this.NoEjem=n.Clave+"UASLP";
                
            }
        })
    },
    agregar:function(){
        if (this.nuevo!="") {
            this.Referencias.push(this.nuevo);
            this.nuevo="";
            
        }
    },
    cargarImagen: function(e,index){
        let t = this;
        var input = document.getElementById('fileImg' +index);
        
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          t.archivos[index].imagen =  e.target.result;
      }
     
      reader.readAsDataURL(input.files[0]);
    }
    }

  }
 
})

</script>
<script>
    function pasarIdFichaT(id){
        document.getElementById("idFichaT").value = id;
    }
    function pasarIdFichaTR(id){
        document.getElementById("idFichaTR").value = id;
    }
</script>
@endpush