<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>

<body>
    <div class="container-fluid justify-content-between mt-5 p-5" id="appp">
        <h2 class="text-center alert alert-dark">Hoja de campo</h2>
        
        <form method="POST" action="{{route('GHC')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <div class="card" v-for="(a, index) in archivos">
                        <img class="card-img-top" v-if="a.imagen!=''" :id="a.nombre" :src="a.imagen" alt="Card image cap">
                        <div class="card-body">
                            <input type="file" :id="'fileImg'+index" @change="cargarImagen($event,index)" />
                        </div>
                    </div>
                </div>
                
            </div>
            
                
            </div>
            @include('HojaCampo.DGenerales')
            @include('HojaCampo.ReconocimientoE')

            <div class=" d-flex justify-content-xl-end mb-2">
                <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
            </div>
        </form>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<script>
    var app = new Vue({
  el: '#appp',
  data: {
    archivos:[]
  }, 
  mounted: function () {
  this.$nextTick(function () {
    this.archivos = [
        {
            imagen:"",
            nombre:"Archivo1"
            
        },
        {
            imagen:"",
            nombre:"Archivo2"
        }
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