@extends('Parciales.carouselindex')

@section('contenido')

<div class="container-fluid bg-secondary px-0 px-xl-5 py-0" id="appp">

    <div class="row justify-content-center">
        <div class="container-fluid bg-white mx-xl-5 px-xl-4 ">
            <div class="row justify-content-end m-3">
                <a href="{{route('ImprimirFichaTecnica',['id'=>$fichaTecnica->id])}}"
                    class="d-inline-block btn btn-sm btn-primary" target="blank">
                    <i class="fas fa-download"> Descargar</i>

                </a>
            </div>
            <div class="row justify-content-center p-3 m-4" style="background-color: #e0e2e1">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="d-none">
                                {{$urlPC=$fichaTecnica->FichaTecnica->Url_PC}}
                            </p>

                            <img src="{{ asset("storage$urlPC" )}}" class="d-block w-100 mx-auto p-xl-5" alt="..."
                                style="opacity: 0.8">
                            <div class="carousel-caption d-none d-sm-block" style="bottom: 43%; opacity: 1.0;">
                                <h1 class="font-weight-bold text-uppercase"
                                    style="font-size: 50px;font-family: 'Myraid Pro Bold';">
                                    {{$fichaTecnica->NombreComun}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-xl-5 mt-xl-5">
                    <p class="text-center text-uppercase font-weight-bold "
                        style="font-size: 32px;color: #466065;  font-family: 'Myraid Pro Bold';">
                        {{$fichaTecnica->NombreCientifico}}</p>
                    <p class="text-center text-uppercase" style="font-size:28px;color:#67817e;">Tipo de permanencia de
                        las hoja:{{$fichaTecnica->FichaTecnica->TPertenencia}}</p>
                </div>
                <div class="row row-cols-1 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 especies   mt-xl-5 mt-lg-4"
                    style="background-color: #607879;width: 100%;height: auto;">
                    <div class="col-4 px-2">
                        <div class="card w-100 h-100 ">
                            <div class=" px-4  pt-2" style="background-color: #607879;height: 100%;">
                                <p class="card-title text-center align-middle font-weight-bold mt-0"
                                    style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                    FORMA DE CRECIMIENTO</p>
                                <p class="card-title text-center align-middle  mt-3 "
                                    style="font-size: 28px;color:white;">
                                    {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 px-2">
                        <div class="card w-100 h-100 ">

                            <div class="px-4  pt-2 " style="background-color: #607879;">
                                <p class="card-title text-center align-middle font-weight-bold"
                                    style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                    FRORACIÓN</p>
                                <p class="card-title text-center align-middle  mt-3 text-break "
                                    style="font-size: 12px;color:white;">
                                    {{$fichaTecnica->FichaTecnica->Floracion}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4  px-2">
                        <div class="card w-100 h-100">
                            <div class="px-4  pt-2" style="background-color: #607879;">
                                <p class="card-title text-center align-middle font-weight-bold"
                                    style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                    ORIGEN</p>
                                <p class="card-title text-center align-middle  mt-3 text-break "
                                    style="font-size: 12px;color:white;">
                                    {{$fichaTecnica->FichaTecnica->Origen}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies mt-4">
                    <div class="col mb-4 " v-for="(a, index) in archivos">
                        <div class="card w-100 ">
                            <div class="card-body" style="height: 250px;">
                                <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre"
                                    :src="'{{asset('storage/')}}'+a.imagen" alt="Card image cap"  style="height: 250px;">
                            </div>
                            <div class="card-footer p-3 ">

                                <h5 class="text-center font-weight-bold">@{{a.parteP}} </h5>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid pl-0 pr-1 mt-4 bg-white">
                    <div class="row">
                        <p class="d-none">
                            {{$urlF=$fichaTecnica->FichaTecnica->Url_F}}
                        </p>
                        <div class="col-12 col-xl-6 pr-0"><img src="{{ asset("storage$urlF" )}}" class=" w-100 h-100"
                                alt=""></div>
                        <div class="col-12 col-xl-6 p-5" style="font-size: 12px;color:gray;font-weight: 600;">
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Estatus ecológico en México:{{$fichaTecnica->FichaTecnica->EstatusEco}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Estatus de conservación:{{$fichaTecnica->FichaTecnica->EstatusConv}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Altura:{{$fichaTecnica->FichaTecnica->Altura}}m</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Tipo de copa:{{$fichaTecnica->FichaTecnica->TipoC}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Tipo de raíces:{{$fichaTecnica->FichaTecnica->TipoR}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Raíces observadas del ejemplar:{{$fichaTecnica->FichaTecnica->RaicesObs}}</p>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 especies   mt-xl-5 mt-lg-4"
                    style="color: gray; font-size: 14px;">
                    <div class="col mb-4 px-2 ">
                        <div class="col bg-white py-3" style=" height: auto;width: 450px">
                            <p class="card-title text-center align-middle font-weight-bolder mt-3 text-break "
                                style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                USOS</p>
                            <p class="card-title text-center align-middle  mt-3 text-break ">
                                {{$fichaTecnica->FichaTecnica->Usos}}</p>
                            <p class="card-title text-center align-middle font-weight-bolder mt-3 text-break "
                                style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                CLIMA EN HÁBITAT NATURAL</p>
                            <p class="card-title text-center align-middle  mt-3 text-break ">
                                {{$fichaTecnica->FichaTecnica->Clima}}</p>
                        </div>
                    </div>
                    <div class="col mb-4 px-2">
                        <div class="col bg-white py-3" style=" height: auto;width: 450px">
                            <p class="card-title text-center align-middle font-weight-bolder mt-3 text-break "
                                style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                PORTE</p>
                            <p class="card-title text-center align-middle  mt-3 text-break ">
                                {{$fichaTecnica->FichaTecnica->Porte}}</p>
                            <p class="card-title text-center align-middle font-weight-bolder mt-3 text-break "
                                style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                SISTEMA DE RAÍCES</p>
                            <p class="card-title text-center align-middle  mt-3 text-break ">
                                {{$fichaTecnica->FichaTecnica->SistemR}}</p>
                        </div>
                    </div>
                    <div class="col mb-4 px-2">
                        <div class="col bg-white py-3" style=" height: auto;width: 450px">
                            <p class="card-title text-center align-middle font-weight-bolder mt-3 text-break "
                                style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold';">
                                REQUERIMIENTOS DE LA ESPECIE</p>
                            <p class="card-title text-center align-middle  mt-3 text-break ">
                                {{$fichaTecnica->FichaTecnica->RequerimientosE}}</p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid  mt-4 ">
                    <div class="row">
                        <div class="col-12  px-0 py-5" style="background-color: #607879;height: auto;color: white;">
                            <p class="card-title text-center align-middle font-weight-bold"
                                style="font-size: 24px;font-family: 'Myraid Pro Bold';">
                                SERVICIOS AMBIENTALES</p>
                            <p class="card-title text-center align-middle px-2 mt-3 text-break "
                                style="font-size: 22px;">
                                {{$fichaTecnica->FichaTecnica->ServiciosAmb}}</p>

                        </div>

                    </div>
                </div>
                <div class="container-fluid  mt-4" style="color: #607879;">
                    <div class="row">
                        <div class="col-12  px-5 py-5">
                            <p class="card-title text-left align-middle font-weight-bold" style="font-size: 16px;">
                                Amenazas y riesgos:</p>
                            <p class="card-title text-left align-middle  mt-3 text-break  font-weight-bold "
                                style="font-size: 14px;">
                                {{$fichaTecnica->FichaTecnica->AmenazasRiesgos}} </p>
                            <p class="card-title text-left align-middle font-weight-bold" style="font-size: 16px;">
                                Amenazas y riesgos para comunidad habitables:</p>
                            <p class="card-title text-left align-middle mt-3 text-break  font-weight-bold "
                                style="font-size: 14px;">
                                {{$fichaTecnica->FichaTecnica->AmenazasRiesgosHab}} </p>

                        </div>

                    </div>
                </div>

                <div class="container-fluid  mt-4 ">
                    <div class="row">
                        <div class="col-12  px-0 py-5" style="background-color: #607879;height: auto;color: white;">
                            <p class="card-title text-center align-middle font-weight-bold"
                                style="font-size: 24px;font-family: 'Myraid Pro Bold';">
                                Bibliografias</p>
                        </div>
                    </div>
                    
                </div>
                <div class="container-fluid  mt-4 ">
                    <div class="row">
                        <div class="col-12" style="color: #607879;height: auto;">
                            <p class="card-title text-left  font-weight-bold"
                                style="font-size: 12px;font-family: 'Myraid Pro Bold';">
                                Bibliografias</p>
                               
                                @foreach ($Biblio as $item)
                                <li>
                                    {{$item->Referencia}}
                                </li>    
                                @endforeach
                               
                        </div>
                    </div>
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
                    "imagen":'{{$fichaTecnica->FichaTecnica->Url_FR}}',
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