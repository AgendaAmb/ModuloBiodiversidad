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
            <div class="row row-cols-1 row-cols-md-4">
                <div class="col mb-4" v-for="(a, index) in archivos">
                    <div class="card">
                        <h5 class="card-title text-center">@{{a.parteP}}</h5>
                        <div class="card-body">
                            <img class="card-img-top" v-if="a.imagen!=''" :id="a.nombre" :src="a.imagen"
                                alt="Card image cap">
                        </div>

                        <div class="card-footer">
                            <small class="text-muted">
                                <input type="file" accept="image/png,image/jpeg"  :id="'fileImg'+index" :name="'fileImg'+index" class="inp"
                                    @change="cargarImagen($event,index)" />
                            </small>
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