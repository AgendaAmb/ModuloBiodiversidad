<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>
@extends('dashboard.main')

@section('contenido')

@if (isset($Planta))
{{$nuevo=false}}
<div class="container-xl-6">
    <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a>
</div>
@else
<h5 class="d-none">{{$nuevo=true}}</h5>

@endif

@if (!$nuevo&&!$Planta->Verificado&&$Planta->NomVerificador!=null)
<div class="container-fluid mx-0 mb-2">
    <div class="row justify-content-end">
        <div class="col-auto text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Ver retroalimentación
            </button>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Motivio de Rechazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$Planta->MotivoRechazo}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary" href="{{route('UserEHCEdit',['id'=>$Planta->id])}}"
                    role="button">Modificar</a>
            </div>
        </div>
    </div>
</div>
@endif

<body>
    <div class="container-fluid justify-content-between" id="appp">
        <div class="container mb-4">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 contImagen">
                    <img src="{{asset('storage/Logos/horizontal_azulR.png')}}" id="LogoUaslpAgenda"
                        alt="Logo uaslp-Agenda Ambiental" srcset="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 ">
                    <div class="align-self-center">
                        <h4 class="pt-5" style="font-family: Myraid Pro Bold;">Hoja de campo de programa
                             universitario de biodiversidad</h4>
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
            <form method="POST" action="{{route('GHC')}}" enctype="multipart/form-data">
                @csrf

                @include('HojaCampo.CrearHC.Imagenes')
                @include('HojaCampo.CrearHC.DGenerales')
                @include('HojaCampo.CrearHC.ReconocimientoE')
                @include('HojaCampo.CrearHC.Morfologia')
                @include('HojaCampo.CrearHC.SituacionEntorno')
                @if ($nuevo)
                <div class="container mb-3">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
                    </div>
                </div>
                @else
                @if (Auth::user()->hasAnyRole(['administrador','Coordinador']))

                @if (!$Planta->Verificado && $Planta->MotivoRechazo==null)
                <div class="container mb-3 mt-5">
                    <div class="row justify-content-between ">
                        <div class="colum ">
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                data-target="#verificar" onclick="pasarIdPlanta({{$Planta->id}});">Verificar</button>
                        </div>
                        <div class="colum ">
                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal"
                                data-target="#Rechazar" onclick="pasarIdPlantaR({{$Planta->id}});">Rechazar</button>
                        </div>
                    </div>

                </div>
                @endif
                @endif
                @endif

        </div>
    </div>
    </form>
    </div>
</body>

@if ($nuevo)

@else
@if (Auth::user()->hasAnyRole(['administrador','Coordinador']))
@if (!$Planta->Verificado)
<x-Modal idModal="verificar" modalTitle="Confirmar Hoja de campo" isRechazada="false" vista="HC">
</x-Modal>

<x-Modal idModal="Rechazar" modalTitle="Rechazar Hoja de campo" isRechazada="true" vista="HC">
</x-Modal>
@endif

@endif

@endif


</html>


@endsection
@push('scripts')
<script>
    var img = new Vue({
  el: '#appp',
  data: {
    archivos:[],
    datos:[],
    Nombres:[],
    NCientifico:'',
    EntidadAcademica:[],
    SubUnidadesP:[],
    SubUnidadesFiltrada:[],
    NombreC:'',
    Entidad_id:'',
    NoEjem:'',
    info: null,
    imgPartes:[]
  }, 
  mounted: 
  function () {
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
    @foreach($SubUnidades as $Unidad)
                this.EntidadAcademica.push({
                    "IdUnidad":'{{$Unidad['IdUnidad']}}',
                    "NombreUnidad":'{{$Unidad['SubUnidad']}}',
                });
    @endforeach
    @foreach($SubUnidadTP as $UnidadP)
                this.SubUnidadesP.push({
                    "id":'{{$UnidadP->id}}',
                    "IdUnidad":'{{$UnidadP->IdUnidad}}',
                    "NombreUnidad":'{{$UnidadP->NombreUnidad}}',
                    "Abreviatura":'{{$UnidadP->Abreviatura}}'
                });
    @endforeach

    //*Guardar en la base de datos la parte de la planta**/
   @if (!$nuevo) {
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
    @foreach($Planta->imagenesPlanta as $Foto)
        '{{$Foto->PartePlanta}}'==='Planta Completa'? this.archivos[0].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Follaje'? this.archivos[1].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Hojas'? this.archivos[2].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Flores'? this.archivos[3].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Frutos'? this.archivos[4].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Semillas'? this.archivos[5].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Tronco'? this.archivos[6].imagen='{{$Foto->url}}':'';
        '{{$Foto->PartePlanta}}'==='Raíces'? this.archivos[7].imagen='{{$Foto->url}}':'';
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
    },
    Ncientifico:function(){
        this.Nombres.map((n) => {
            if(document.getElementById('NombreC').value==n.id){
                this.NCientifico=n.NombreC
                this.NoEjem=n.Clave+"UASLP";
                
            }
        })
    },
    
    FiltroSubUnidades:function(){
        this.SubUnidadesFiltrada=this.EntidadAcademica.filter(E=>E.IdUnidad==this.Entidad_id);
       
    },
   
}
    
})

    function readImage (e,input) {
    }
  
  function DFisicos(x){
    if(x=="1"){
        document.getElementById("DanosFisicosText").style.display='block';
    }else{
        document.getElementById("DanosFisicosText").style.display='none';
    }
    return;
}

    document.getElementById("Latitud").addEventListener('input',function(){
        campo=event.target;
        var regx=/^[+-]?[0-9]{1,9}(?:.[0-9]{1,4})?$/;
        validoL = document.getElementById('LatitudOK');
        if(regx.test(campo.value)){
            console.log("echos");
            
            validoL.innerText = "Coordenada latitud en formato correcto";
            validoL.className+="alert alert-success"
            
        }else{
            validoL.innerText = "Coordenada latitud en formato incorrecto";
            validoL.className+="alert alert-danger"
        }
    });
    document.getElementById("longitud").addEventListener('input',function(){
        campo=event.target;
        var regx=/^[+-]?[0-9]{1,9}(?:.[0-9]{1,4})?$/;
        validoL = document.getElementById('longitudOK');
        if(regx.test(campo.value)){
            console.log("echos");
            
            validoL.innerText = "Coordenada longitud en formato correcto";
            validoL.className+="alert alert-success"
            
        }else{
            validoL.innerText = "Coordenada longitud en formato incorrecto";
            validoL.className+="alert alert-danger"
        }
    });
   
</script>
<script>
    function pasarIdPlanta(id){
        document.getElementById("idPlanta").value = id;
    }
    function pasarIdPlantaR(id){
        document.getElementById("idPlantaR").value = id;
    }
</script>
<script>
    $( document ).ready(function() {
    $('#exampleModal').modal('toggle')
});
</script>
@endpush