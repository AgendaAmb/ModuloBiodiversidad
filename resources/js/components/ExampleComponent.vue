<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

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
                this.NoEjem=n.Clave+"UASLP";
                
            }
        })
    },
    //checar esta funcion con wicho, no se selecciona la subunidad academica 
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
</script>
