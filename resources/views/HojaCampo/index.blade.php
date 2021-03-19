<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>

<body>
    <div class="container-fluid justify-content-between mt- p-5" id="appp">
        <div class="container mb-4">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 contImagen">
              <img src="{{asset('storage/Logos/horizontal_azulR.png')}}"id="LogoUaslpAgenda" alt="Logo uaslp-Agenda Ambiental" srcset="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 ">
                <div class="align-self-center">
                    <h4 class="pt-5">HOJA DE CAMPO DE PROGRAMA UNIVERSITARIO DE BIODIVERSIDAD</h4>
                    <span>  </span>
                </div>
              
              </div>
            </div>
          </div>
       
        @if(session()->has('message'))
        <div class="alert alert-success text-center">
            <h2>
                {{ session()->get('message') }}
            </h2>
        </div>
        @endif
        <form method="POST" action="{{route('GHC')}}" enctype="multipart/form-data">
            @csrf
            @include('HojaCampo.Imagenes')
            @include('HojaCampo.DGenerales')
            @include('HojaCampo.ReconocimientoE')
            @include('HojaCampo.Morfologia')
            @include('HojaCampo.SituacionEntorno')

            <div class="container">
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>

</html>


<script>
    var img = new Vue({
  el: '#appp',
  data: {
    archivos:[],
    datos:[],
    Nombres:[],
    NCientifico:'',
  }, 
  mounted: function () {
  this.$nextTick(function () {
    @foreach($Ejemplar as $E)
                this.Nombres.push({
                    "id":'{{$E->id}}',
                    "Nombre":'{{$E->NombreComun}}',
                    "NombreC":'{{$E->NombreCientifico}}'
                });
    @endforeach
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
            }
        })
    }
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
</script>