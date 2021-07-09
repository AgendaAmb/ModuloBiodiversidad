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
                    <div class="align-self-center">
                        <h4 class="pt-5">FICHA TECNICA </h4>
                        <span> </span>
                    </div>
                </div>
                @if (!$nuevo&&$FichaTecnica->Estado=="Rechazada")
                <div class="col-10 ">
                   
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Ver retroalimentación
                    </button>
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
                                <button type="button" class="btn btn-primary">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
            <form method="POST" action="{{route('FichasT')}}" enctype="multipart/form-data">
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
                                <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre" :src="'/storage'+a.imagen"
                                    alt="Card image cap">
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


                <h2 class="alert alert-primary text-center">Caracteristicas De La Especie</h2>
                <div class="container-fluid p-0 m-0">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 ">
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
                                    class="col-md-4 col-form-label text-md-left">{{ __('Nombre Común') }}</label>
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
                                    class="col-md-4 col-form-label text-md-left pr-0">{{ __('Nombre Común') }}</label>
                                <div class="col-md-8">
                                    <select class="custom-select" id="NombreC" name="NombreC" v-model="NombreC"
                                        @change="Ncientifico()" required>
                                        <option selected="true" disabled>Nombre Común</option>
                                        <option v-for="(N,index) in Nombres" :value="N.id">@{{N.Nombre}}</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 ">
                            @if (!$nuevo)
                            <div class="form-group row g-3 was-validated">
                                <label for="NombreCientifico"
                                    class="col-md-4 col-form-label text-md-left">{{ __('Nombre Científico') }}</label>
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
                                    class="col-md-4 col-form-label text-md-left px-xl-0">{{ __('Nombre Científico') }}</label>
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


                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <x-typeInput :labelFor="'Fenologia'" :isRequiered="true" :label="'Fenología Foliar'"
                                haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->TPertenencia}}"
                                isReadOnly="{{boolval($isReO)}}">
                            </x-typeInput>
                        </div>
                    </div>

                </div>

                <div class="form-row justify-content-between ">

                    <div class="col-xl-6 pr-xl-3  pr-lg-3">

                        <x-typeInput :labelFor="'FormaCrecimiento'" :isRequiered="true" :label="'Forma de Crecimiento'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->Fcrecimiento}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="Floracion" :isRequiered="true" typeInput="text" label="Floración"
                            isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->Floracion}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>

                        <x-typeInput :labelFor="'Origen'" :isRequiered="true" :label="'Origen'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->Origen}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="Descripcion" :isRequiered="true" typeInput="text" label="Descripción"
                            isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->Descripcion}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput :labelFor="'EstatusEco'" :isRequiered="true" :label="'Estatus Ecológico en México'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->EstatusEco}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput :labelFor="'EstatusConser'" :isRequiered="true" :label="'Estatus de conservación'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->EstatusConv}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="Altura" typeInput="number" :isRequiered="true" label="Altura (m)"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?null:$FichaTecnica->Altura}}"
                            isReadOnly="{{boolval($isReO)}}">
                            >
                        </x-typeInput>
                        <x-typeInput :labelFor="'TipoC'" :isRequiered="true" :label="'Tipo de Copa'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?null:$FichaTecnica->TipoC}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput :labelFor="'TipoR'" :isRequiered="true" :label="'Tipo de Raíces'"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?null:$FichaTecnica->TipoR}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="RaicesObs" :isRequiered="true" typeInput="text"
                            label="Raíces Observables Del Ejemplar" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->RaicesObs}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>

                    </div>
                    <div class="col-xl-6 pl-xl-3  pr-lg-3">
                        <x-typeInput labelFor="Usos" :isRequiered="true" typeInput="text" label="Usos" isTextArea="true"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->Usos}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="ClimaN" :isRequiered="true" typeInput="text"
                            label="Clima en Hábitad Natural" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->Clima}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="Porte" :isRequiered="true" typeInput="text" label="Porte"
                            isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->Porte}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="SistemaRa" :isRequiered="true" typeInput="text" label="Sistema de Raíces"
                            isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->SistemR}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="Requerimietos" :isRequiered="true" typeInput="text"
                            label="Requerimientos De La Especie" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->RequerimientosE}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="ServicioAmbiental" :isRequiered="true" typeInput="text"
                            label="Servicios Ambientales" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->ServiciosAmb}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="AmenazasR" :isRequiered="true" typeInput="text"
                            label="Amenazas y Riesgos" isTextArea="true" haveValue="{{$nuevo?false:true}}"
                            value="{{$nuevo?false:$FichaTecnica->AmenazasRiesgos}}" isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>
                        <x-typeInput labelFor="AmenazasRC" :isRequiered="true" typeInput="text"
                            label="Amenazas y Riesgos Para Comunidades Habitadas" isTextArea="true"
                            haveValue="{{$nuevo?false:true}}" value="{{$nuevo?false:$FichaTecnica->AmenazasRiesgosHab}}"
                            isReadOnly="{{boolval($isReO)}}">
                        </x-typeInput>

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
                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                    data-target="#verificar"
                                    onclick="pasarIdFichaT({{$FichaTecnica->id}});">Verificar</button>
                            </div>
                            <div class="colum ">
                                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal"
                                    data-target="#Rechazar"
                                    onclick="pasarIdFichaTR({{$FichaTecnica->id}});">Rechazar</button>
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
    Referencias:[]
  },
  mounted:
  function() {
    this.$nextTick(
          function () {

             
     @foreach($Ejemplar as $E)
                this.Nombres.push({
                    "id":'{{$E->id}}',
                    "Nombre":'{{$E->NombreComun}}',
                    "NombreC":'{{$E->NombreCientifico}}',
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
                    "imagen":'{{$FichaTecnica->Url_FR}}',
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
            }
        })
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