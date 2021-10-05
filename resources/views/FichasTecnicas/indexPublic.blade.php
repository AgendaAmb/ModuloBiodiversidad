@extends('Parciales.carouselindex')

@section('contenido')

<div class="container-fluid  py-5" id="appp">
    <p style="display: none;">
        {{$urlPC=$fichaTecnica->FichaTecnica->Url_PC}}
        {{$urlF=$fichaTecnica->FichaTecnica->Url_F}}
        {{$urlH=$fichaTecnica->FichaTecnica->Url_H}}
        {{$urlFL=$fichaTecnica->FichaTecnica->Url_FL}}
    
        {{$urlFR=$fichaTecnica->FichaTecnica->Url_FR}}
        {{$urlS=$fichaTecnica->FichaTecnica->Url_S}}
        {{$urlT=$fichaTecnica->FichaTecnica->Url_T}}
        {{$urlR=$fichaTecnica->FichaTecnica->Url_R}}
        {{$NombreCienti=Str::of($fichaTecnica->NombreCientifico)->split('/[\s,]+/')}}
    </p>
    <div class="row px-4">
        <div class="col-12 p-0" style="height: 75px;">
            <img src="{{asset('/storage/Logos/LogoPdf.png')}}" alt="" style="width: auto;height:100%;">
        </div>
        <div class="col-12 p-0">
            <p class="NombreComun">   {{$fichaTecnica->NombreComun}}/ {{$fichaTecnica->NombreComunIng}}</p>
            <div class="row">
                <div class="col-6 p-0">
                    <p class="NombreCien">{{$NombreCienti[0]}} {{$NombreCienti[1]}},  </p> 
                </div>
                <div class="col-6 p-0">
                    @for ($i = 2; $i < count($NombreCienti); $i++) 
                     {{$NombreCienti[$i]}} 
                    @endfor 
                </div>   
            </div>
            <div class="row">
                <div class="col-8 p-0">
                    <img src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_PC)}}" alt="" class="w-100 ">
                </div>
                <div class="col-4" style="background-color: rgb(59, 155, 100);padding:20px;">
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;"> ORIGEN</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 20px;">
                        {{$fichaTecnica->FichaTecnica->Origen}}</p>
                    <hr >
                    <p class="titulos" style="margin-top: 20px;margin-bottom: 0px;  "> FORMA DE
                        CRECIMIENTO</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 0px;">
                        {{$fichaTecnica->FichaTecnica->Fcrecimiento}}
                    </p>
                        @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Herbacea')
                        <img  class="mx-auto d-block mt-2"
                            src="{{asset("storage/Logos/FichasTecnicas/FormasCrecimiento/Herbacea.png")}}" height="40"
                            width="40" alt="">
                        @else
                        @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbustiva')
                        <img  class="mx-auto d-block mt-2"
                            src="{{asset("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbustiva.png")}}"
                            height="40" width="40" alt="">
                        @else
                        @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arborescente')
                        <img  class="mx-auto d-block mt-2"
                            src="{{asset("storage/Logos/FichasTecnicas/FormasCrecimiento/Arborescente.png")}}"
                            height="40" width="40" alt="">
                        @else
                        @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbórea')
                        <img class="mx-auto d-block mt-2"
                            src="{{asset("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbórea.png")}}" height="40"
                            width="40" alt="">
                        @else
                        <img  class="mx-auto d-block mt-2"
                            src="{{asset("storage/Logos/FichasTecnicas/FormasCrecimiento/Columnar.png")}}" height="40"
                            width="40" alt="">
                        @endif
                        @endif
                        @endif
                        @endif
                        <hr style="margin-top: 10px;">
                        <p class="titulos" style="margin-top: 20px;margin-bottom: 0px; padding-top: 0px;"> PERMANENCIA DE
                            HOJAS</p>
                        <p class="parrafos" style="margin-top: 0px;margin-bottom: 10px;">
                            {{$fichaTecnica->FichaTecnica->TPertenencia}}</p>
                            <hr>
                            <p class="titulos" style="margin-top: 20px;margin-bottom: 0px; padding-top: 0px;"> FLORACIÓN</p>
                            <p class="parrafos"
                                style="text-align: justify;">
                                {{$fichaTecnica->FichaTecnica->Floracion}}</p>
  
                    </div>
            </div>
      
        </div>
    </div>
</div>  

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
                this.archivos.push(
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_PC}}',
                    "nombre":'Archivo1',
                    "parteP":'Planta completa',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_F}}',
                    "nombre":'Archivo2',
                    "parteP":'Follaje',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_H}}',
                    "nombre":'Archivo3',
                    "parteP":'Hojas',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_FL}}',
                    "nombre":'Archivo4',
                    "parteP":'Flores',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_FR}}',
                    "nombre":'Archivo5',
                    "parteP":'Frutos',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_S}}',
                    "nombre":'Archivo6',
                    "parteP":'Semillas',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_T}}',
                    "nombre":'Archivo7',
                    "parteP":'Tronco',   
                },
                {
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_R}}',
                    "nombre":'Archivo8',
                    "parteP":'Raíces',   
                }
                );
    })
  },
  methods:{
   Imagen: function(e,index){
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
@endpush
@endsection