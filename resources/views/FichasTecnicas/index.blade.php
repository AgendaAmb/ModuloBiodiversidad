<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>
@extends('dashboard.main')

@section('contenido')
<h5 class="d-none">{{$nuevo=true}}</h5>

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
                        <h4 class="pt-5">FICHA TECNICA </h4>
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
                <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
                    <div class="col mb-4" v-for="(a, index) in archivos">
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
                                        :name="'fileImg'+index" class="inp" @change="cargarImagen($event,index)" />
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

                <div class="container mb-3">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
</body>

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
    
      info: null
  }, 
  mounted: 
  function () {
  this.$nextTick(
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
    )
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
}  
})

    function readImage (e,input) {
    }
  
   
</script>

@endpush