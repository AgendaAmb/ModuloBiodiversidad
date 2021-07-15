<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>
@extends('dashboard.main')

@section('contenido')


<div class="container-xl-6">
    <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a>
</div>

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
                        <h4 class="pt-5">HOJA DE CAMPO</h4>
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
            @if (!$Planta->Verificado&&$Planta->NomVerificador!=null)
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
                            {{$Planta->MotivoRechazo}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            <form method="POST" action="{{route('EditarHC',['id'=>$Planta->id])}}" enctype="multipart/form-data">
                @csrf
                @include('HojaCampo.EditarHC.Imagenes')
                @include('HojaCampo.EditarHC.DGenerales')
                @include('HojaCampo.EditarHC.ReconocimientoE')
                @include('HojaCampo.EditarHC.Morfologia')
                @include('HojaCampo.EditarHC.SituacionEntorno')

@if ($Planta->MotivoRechazo!=null)
<div class="container mb-3">
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
    </div>
</div>
@endif
                
            </form>
        </div>
    </div>

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
    NombreC:'',
    Referencias:[],
    Nombres:[],
    EntidadAcademica:[],    
    SubUnidadesP:[],
    SubUnidadesFiltrada:[],
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
                    "Clave":'{{$E->Clave}}',
                    "isSelec":'{{$E->id}}'=='{{$Planta->NombreEjem->id}}'?true:false
 
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

            this.archivos = [
        {
            imagen:"",
            nombre:"Archivo1",
            parteP:"Planta completa",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo2",
            parteP:"Follaje",
            ban:false
        },
        {
            imagen:"",
            nombre:"Archivo3",
            parteP:"Hojas",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo4",
            parteP:"Flores",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo5",
            parteP:"Frutos",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo6",
            parteP:"Semillas",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo7",
            parteP:"Tronco",
            ban:false
            
        },
        {
            imagen:"",
            nombre:"Archivo8",
            parteP:"Raíces",
            ban:false
            
            
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
          t.archivos[index].ban=true;

      }
     
      reader.readAsDataURL(input.files[0]);
      
    }
    }

  }
 
})

</script>
<script>
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
@endpush