@extends('Parciales.carouselindex')

@section('contenido')

<div class="container mx-auto py-5 px-5" id="appp">
  
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
        {{$NombreMuestraInit=Str::of($fichaTecnica->FichaTecnica->NombreRecolectorMuestra)->studly()->split('/([a-zí]+)/')}}
       
        {{$ApellidosMuestra=Str::of($fichaTecnica->FichaTecnica->NombreRecolectorMuestra)->explode(' ')}}
    </p>
    <div class="row">
        <div class="col-12 p-0" style="height: 75px;">
            <img src="{{asset('/storage/Logos/LogoPdf.png')}}" alt="" style="width: auto;height:100%;" class="d-none">
        </div>
        <div class="col-12 p-0 ">
            <p class="NombreComun">   {{$fichaTecnica->NombreComun}}/ {{$fichaTecnica->NombreComunIng}}</p>
            <div class="row justify-content-center ">
                <div class="col-6 p-0">
                    <p class="NombreCien">{{$NombreCienti[0]}} {{$NombreCienti[1]}},  </p> 
                </div>
                <div class="col-6 p-0">
                    @for ($i = 2; $i < count($NombreCienti); $i++) 
                     {{$NombreCienti[$i]}} 
                    @endfor 
                </div>   
            </div>
            <div class="row ">
                <div class="col-xl-8 col-lg-8 col-12 p-xl-0 p-lg-0 p-5">
                    <img src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_PC)}}" alt="" class="img-fluid">
                </div>
                <div class="col-xl-4 col-lg-4  col-12" style="background-color: rgb(59, 155, 100);padding:20px;">
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
            <div class="row mt-5 justify-content-around" >
                <div class="col-xl-6 col-lg-6 col-12 pr-xl-4 pr-lg-4">
                    <div class="row">
                        <div class="col" style="padding-right: 20px; padding-left: 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_F)}}" alt="" >
                            <p class="tituloImagen">FOLLAJE</p>
                        </div>
                        <div class="col" style="padding: 0% 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_H)}}" alt="" >
                            <p class="tituloImagen">HOJAS</p>
                        </div>
                        <div class="col" style="padding-left: 20px; padding-right: 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_FL)}}" alt="" >
                            <p class="tituloImagen">FLORES</p>
                        </div>
                    </div>
                    <div class="row mb-xl mb-lg mb-5">
                        <div class="col-12 p-0">
                            <img class="imgFicha2" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_PC2)}}" alt="" >
                            <p class="tituloImagen">PLANTA COMPLETA</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 pl-xl-4  pl-lg-4">
                    <div class="row">
                        <div class="col-12 p-0">
                            <img class="imgFicha2" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_T)}}" alt="">
                            <p class="tituloImagen">TRONCO</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding-right: 20px; padding-left: 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_FR)}}" alt="" >
                            <p class="tituloImagen">FRUTO</p>
                        </div>
                        <div class="col" style="padding: 0% 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_S)}}" alt="" >
                            <p class="tituloImagen">SEMILLAS</p>
                        </div>
                        <div class="col" style="padding-left: 20px; padding-right: 0%;">
                            <img class="imgFicha1" src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_R)}}" alt="" >
                            <p class="tituloImagen">RAÍCES</p>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6 pl-0 pr-0 d-xl-block d-lg-block d-none">
                    <img src="{{asset('storage'.$fichaTecnica->FichaTecnica->Url_FL)}}" alt="" style="width: 100%;height: 100%;">
                </div>
                <div class="col-xl-6 col-lg-6 col-12 px-4 py-5" style=" border: 1px  solid rgba(0, 0, 0, 0.3);">
                    <p class="textContenido">
                        <span style="font-family: 'Myriad Pro Bold';">Descripción:</span>&nbsp; {{$fichaTecnica->FichaTecnica->Descripcion}}
                        <br><br><br>
                        <span  style="font-family: 'Myriad Pro Bold';">Estatus ecológico en
                            México:</span>&nbsp;{{$fichaTecnica->FichaTecnica->EstatusEco}}.
                        <br>
                        <br>
                        <br>
                        <span  style="font-family: 'Myriad Pro Bold';">Estatus de
                            conservación:</span>&nbsp;{{$fichaTecnica->FichaTecnica->EstatusConv}}.
                        <br><br>
                         @if ($fichaTecnica->FichaTecnica->EstatusConv=='Peligro de extinción')
                                <img style="margin-top: 10px;"
                                    src="{{asset("storage/Logos/FichasTecnicas/EstatusConservacion/Extincion.png")}}"
                                    height="40" width="40" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Amenaza')
                                <img style="margin-top: 10px;"
                                    src="{{asset("storage/Logos/FichasTecnicas/EstatusConservacion/Amenaza.png")}}"
                                    height="50" width="50" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Vulnerable')
                                <img style="margin-top: 10px;"
                                    src="{{asset("storage/Logos/FichasTecnicas/EstatusConservacion/Vulnerable.png")}}"
                                    height="50" width="50" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Menor preocupación')

                                <img style="margin-top: 10px;"
                                    src="{{asset("storage/Logos/FichasTecnicas/EstatusConservacion/MenorPreocupacion.png")}}"
                                    height="50" width="50" alt="">
                                @else
                                <img style="margin-top: 10px;"
                                    src="{{asset("storage/Logos/FichasTecnicas/EstatusConservacion/SinProblema.png")}}"
                                    height="50" width="50" alt="">
                                @endif
                                @endif
                                @endif
                                @endif
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Altura en estado
                                    natural:</span>&nbsp;{{$fichaTecnica->FichaTecnica->Altura}}m.
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Altura en condiciones
                                    urbanas:</span>&nbsp;{{$fichaTecnica->FichaTecnica->AlturaCondicionesUrbanos}}m.
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Tipo de copa:</span>&nbsp;{{$fichaTecnica->FichaTecnica->TipoC}}.
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Tipo de raíces:</span>&nbsp;{{$fichaTecnica->FichaTecnica->TipoR}}.
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Raíces observadas:</span>&nbsp;{{$fichaTecnica->FichaTecnica->RaicesObs}}.
                                <br>
                                <br><br>
                                <span style="font-family: 'Myriad Pro Bold';">Porte:</span>&nbsp;{{$fichaTecnica->FichaTecnica->Porte}}.
                    </p>
                </div>
            </div>
            <div class="row mt-4 justify-content-between">
                <div class="col-xl col-lg col-12 mr-xl-4 mr-lg-4 " style=" background-color: rgb(59, 155, 100); height: 223px;">
                    <p class="titulos mt-3" style="margin-bottom: 9.5pt; line-height: 12.0pt;"> REQUERIMIENTOS DE LA ESPECIE
                    </p>
                    <p class="parrafos px-3" style="margin: 0%;text-align: justify; ">
                        {{$fichaTecnica->FichaTecnica->RequerimientosE}}</p>
                </div>
                <div class="col-xl col-lg col-12 my-xl-0 my-lg-0 my-4" style=" border: 1px  solid rgba(0, 0, 0, 0.3);">
                    <p class="titulos mt-1" style="margin-top: 0px;margin-bottom: 0px;color: black;">USOS</p>
                    <div class="row justify-content-center my-3">
                        <div class="col-12">
                            <p style="font-size: 12pt;color: black;text-align: justify;">
                                {{$fichaTecnica->FichaTecnica->Usos}}</p>
                        </div>
                        <div class="col-4">
                            @if ($fichaTecnica->FichaTecnica->Usos=='Ornamental(estético)')
                            <img style="margin-top: 0px;"
                                src="{{asset("storage/Logos/FichasTecnicas/Usos/Ornamental.png")}}"
                                height="50" width="50" alt="">

                            @else
                            @if ($fichaTecnica->FichaTecnica->Usos=='Medicinal')
                            <img  style="margin: 0%;"
                                src="{{asset("storage/Logos/FichasTecnicas/Usos/Medicinal.png")}}"
                                height="30" width="30" alt="">
                            @else
                            @if ($fichaTecnica->FichaTecnica->Usos=='Comestible')
                           
                            <img style="margin: 0%;"
                                src="{{asset("storage/Logos/FichasTecnicas/Usos/Comestible.png")}}"
                                height="50" width="50" alt="">
                            @else
                            @if ($fichaTecnica->FichaTecnica->Usos=='Sombra')
                            <img style="margin: 0%;"
                                src="{{asset("storage/Logos/FichasTecnicas/Usos/Sombra.png")}}"
                                height="30" width="30" alt="">
                            @else
                            <img style="margin: 0%;"
                                src="{{asset("storage/Logos/FichasTecnicas/Usos/Aromático.png")}}"
                                height="30" width="30" alt="">
                            @endif
                            @endif
                            @endif
                            @endif
                        </div>
                        
                    </div>
                </div>
                <div class=" col-xl col-lg col-12 ml-lg-4 ml-lg-4" style=" background-color: rgb(59, 155, 100); height: 223px;">
                    <p class="titulos mt-3"  style="margin-top: 0px;margin-bottom: 9.5pt; line-height: 12.0pt;"> CLIMA EN HÁBITAT NATURAL</p>
                    <p class="parrafos px-3"  style="margin: 0%;text-align: justify;">
                        {{$fichaTecnica->FichaTecnica->Clima}}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 px-0"> 
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;color: black;text-align: left;">RIESGOS Y AMENAZAS  </p>
                    <hr style="background-color: black; width: 7%; margin:0%;margin-right: 91%;">
                    <p class="textContenido mt-3">
                        {{$fichaTecnica->FichaTecnica->AmenazasRiesgos}}
                       
                    </p>
                    <p class="titulos" style="margin-top: 10px;margin-bottom: 0px;color: black;text-align: left;">SERVICIOS AMBIENTALES</p>
                    <hr style="background-color: black; width: 7%; margin:0%;margin-right: 91%;">
                    <p class="textContenido mt-3" style="margin: 0%;">
                        {{$fichaTecnica->FichaTecnica->ServiciosAmb}}
                    </p></div>
            </div>
            <div class="row mt-4">
                <div class="col-12 mb-4" style="width: 100%;background-color: rgb(59, 155, 100);padding: 0px;height: 30px;">
                    <p class="titulos" style="margin: 0px;"> FUENTE DE CONSULTA</p>
                </div>
                @foreach ($Biblio as $item)
                <p class="parrafos " style="color: black;text-align: left;  font-family: 'Myraid light';"> {{$item->Referencia}}</p>
                @endforeach
                <div class="col-12 mb-4" style="width: 100%;background-color: rgb(59, 155, 100);padding: 0px;height: 30px;">
                    <p class="titulos" style="margin: 0px;"> PARA CITAR ESTA FICHA</p>
                </div>
                <p class="parrafos" style="color: black;text-align: left;font-family: 'Myraid light';height: 30px;"> 
                    Ramos-Palacios C.R. y {{$NombreMuestraInit[0] }}.{{$NombreMuestraInit[1]}}.&nbsp;{{$ApellidosMuestra[2]}}-{{$ApellidosMuestra[3]}} (2021). Ficha técnica de   <span class="NombreCien2">{{$NombreCienti[0]}} {{$NombreCienti[1]}}.&nbsp;</span>
                    <q>Inventario de especies de flora del Programa Universitario de Biodiversidad</q>.&nbsp;Agenda Ambiental, Universidad Autónoma de San Luis Potosí.&nbsp;Base de datos del Programa Universitario de Biodiversidad-UASLP, {{$fichaTecnica->Clave}}-1.&nbsp; México, S.L.P. <br>
                </p>
                <img style="margin-bottom: 10px;"
                src="{{asset("storage/Logos/Licencia.PNG")}}"alt="" height="30" width="100" class="mt-xl-3 mt-lg-3 mt-5 ">
                <div class="col-12 mb-4" style="width: 100%;background-color: rgb(59, 155, 100);padding: 0px;height: 30px;">
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;"> CRÉDITOS</p>
                </div>
                <p class="textContenido">
                    <span style="font-family: 'Myriad Pro Bold';">Dirección:</span>&nbsp; Dr. Marcos Algara Siller
                    <br>
                    <span style="font-family: 'Myriad Pro Bold';">Supervisión:</span>&nbsp; IBP. Laura Daniela Hernández
                    <br>
                    <span style="font-family: 'Myriad Pro Bold';">Revisión y autorización:</span>&nbsp; Dr. Carlos Renato Ramos Palacios
                    <br>
                    <span style="font-family: 'Myriad Pro Bold';">Fotografías:</span>&nbsp;   {{$fichaTecnica->FichaTecnica->NombreAutorFoto}}
                    <br>
                    @if ($fichaTecnica->FichaTecnica->NombreRecolectorMuestra==$fichaTecnica->FichaTecnica->NombreRecolectorDatos)
                    <span style="font-family: 'Myriad Pro Bold';">Muestreo y captura:</span>&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorMuestra}}
                    @else
                    <span>>Muestreo y captura:</span>&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorMuestra}},&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorDatos}}
                    @endif
                    <br>
                    <span style="font-family: 'Myriad Pro Bold';">Diseño:</span>&nbsp;LDG. María de Jesús Villarreal Iturriaga
                    <br>
                    <span style="font-family: 'Myriad Pro Bold';">Diseño de íconos:</span>&nbsp;LDG. Itzel Zárate Figueroa
                    <br>
                    <br>
                    <br>
                    Universidad Autónoma de San Luis Potosí
                    <br>
                    Agenda Ambiental
                    <br>
                    Sistema de Gestión Ambiental/Programa Universitario de Biodiversidad
                    <br>
                    San Luis Potosí, S.L.P.,México.
                    <br>
                 
                    Fecha de elaboración: &nbsp; {{   Carbon\Carbon::parse($fichaTecnica->FichaTecnica->FechaRecoleccion)->locale('es')->isoFormat('DD MMMM YYYY')}}
                </p>
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