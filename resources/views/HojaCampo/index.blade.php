<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>

<body>
    <div class="container-fluid justify-content-between mt- p-5" id="appp">
        <h2 class="text-center alert alert-dark">Hoja de campo</h2>

        <form method="POST" action="{{route('GHC')}}"  enctype="multipart/form-data">
            @csrf
            @include('HojaCampo.Imagenes')
            @include('HojaCampo.DGenerales')
            @include('HojaCampo.ReconocimientoE')
            @include('HojaCampo.Morfologia')
            <!--
                @include('HojaCampo.SituacionEntorno')
            -->
            <div class="container">
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
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
    datos:[]
  }, 
  mounted: function () {
  this.$nextTick(function () {
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
        console.log(input.files);
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

    function readImage (e,input) {
  }
</script>

<script>

</script>