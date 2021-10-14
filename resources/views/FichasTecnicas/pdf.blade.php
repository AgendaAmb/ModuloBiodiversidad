<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Portal Agenda Ambiental') }}</title>

    <style>
        /** Define the margins of your page **/
        @page {
           margin-top: 100px;
           margin-left: 30px;
           margin-right: 30px;
           margin-bottom: 0px;
        }

        @font-face {
            font-family: 'Myriad Pro';
            src: url({{public_path('/TiposDeLetra/MyriadPro-Light.ttf')}})format("truetype");
        }

        @font-face {
            font-family: 'Myriad Pro Bold';
            src: url({{public_path('/TiposDeLetra/Myriad-Pro-Bold.ttf')}})format("truetype");

        }

        @font-face {
            font-family: 'Myriad Pro italic';
            src: url({{public_path('/TiposDeLetra/Myriad-Pro-Light-Italic.ttf')}})format("truetype");
        }
        @font-face {
            font-family: 'Myriad Pro regular';
            src: url({{public_path('/TiposDeLetra/Myriad-Pro-Regular.ttf')}})format("truetype");
        }

        html {
            font-family: "Myriad Pro";
        }

        body {
            margin: 0% 20px;
            font-family: "Myriad Pro";
        }

        .saltopagina {
            page-break-after: always;
        }

        main {

            font-family: "Myriad Pro";
        }

        header {
            margin: 0% 20px;
            position: fixed;
            top: -80px;
            left: 0px;
            right: 0px;
            height: 30px;

            /** Extra personal styles
            background-color: #03a9f4;
            color: white;
            text-align: left;
            line-height: 35px;
            **/
        }

        .backgoundCountP {
            position: fixed;
            top: 850px;
            left: 725px;
            right: -60px;
            height: 20px;
            background-color:rgb(59, 155, 100);
            /** Extra personal styles
            background-color: #03a9f4;
            color: white;
            text-align: left;
            line-height: 35px;
            **/
        }

        .NombreComun {
            position: fixed;
            top: -60px;
            text-align: center;
            font-family: 'Myriad Pro Bold';
            font-size: 48px;
            color: rgb(59, 155, 100)
        }

        .NombreCien {
            display: inline;
            position: fixed;
            top: -10px;
            font-family: 'Myriad Pro italic';
            text-align: center;
            size: 12pt;
        }
        .NombreCien2 {
           
            font-family: 'Myriad Pro italic';
            text-align: center;
            size: 9pt;
        }

        .titulos {
            font-family: 'Myriad Pro Bold';
            text-align: center;
            font-size: 16px;
            color: white;
        }

        .tituloImagen {
            font-family: 'Myriad Pro Bold';
            font-size: 9pt;
            color: #3B9B64;
            text-align: left;
            margin: 0%;
            padding: 0%;
        }

        .parrafos {
            line-height: 9.0pt;
            font-family: 'Myriad Pro regular';
            font-size: 9pt;
            color: white;
            text-align: center;
        }

        .flex-container {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            text-align: center;
        }

        .imgCompleta1 {
            height: 441px;
            width: 472px;
        }

        .container1 {
            padding: 20px 20px 0px 20px;
            background-color: rgb(59, 155, 100);
            height: 421px;
            width: 200px;
            margin-left: 472px;

        }

        .container2 {
            width: 330px;
        }

        .item {
            width: 104px;
            height: 104px;
        }

        .item1 {
            width: 360px;
            margin: 0px;
            padding: 0%;
        }

        .item2 {
            width: 311px;
            margin: 0px;
            padding: 0%;
            z-index: 5;
            border-top: 1px solid rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
            border-right: 1px solid rgba(0, 0, 0, 0.3);
            box-shadow: 5px 6px 6px rgba(0, 0, 0, 0.25);
        }

        .itemC1 {
            background-color: rgb(59, 155, 100);
            width: 187px;
            padding: 10px 20px 10px 20px;
            height: 223px;
        }

        .itemC2 {
            width: 187px;
            background-color: white;
            padding: 10px 20px 10px 20px;
            height: 223px;
        }

        footer {
            margin: 0% 20px;
            position: fixed;
            bottom: 40px;
            left: 715px;
            right: -40px;
            height: 20px;
            background-color: #3B9B64;
            /** Extra personal styles **/


        }

        .titulo2 {
            font-family: 'Myriad Pro Bold';
            font-size: 9pt;
            color: black;
            text-align: justify;
            background-color: white;
            margin: 0%;
            display: inline;

        }

        span {
            font-family: 'Myriad Pro Bold';
            font-size: 9pt;
            color: black;
            margin: 0%;
        }

        .textContenido {
            margin: 0%;
            font-family: 'Myriad Pro';
            font-size: 9pt;
            color: black;
            text-align: justify;

            background-color: white;
        }
        
        hr {
            color: white;
            width: 100px;
        }
    </style>

</head>
<p style="display: none;">
    {{$urlPC=$fichaTecnica->FichaTecnica->Url_PC}}
    {{$urlPC2=$fichaTecnica->FichaTecnica->Url_PC2}}
    {{$urlF=$fichaTecnica->FichaTecnica->Url_F}}
    {{$urlH=$fichaTecnica->FichaTecnica->Url_H}}
    {{$urlFL=$fichaTecnica->FichaTecnica->Url_FL}}
   
    {{$urlFR=$fichaTecnica->FichaTecnica->Url_FR}}
    {{$urlS=$fichaTecnica->FichaTecnica->Url_S}}
    {{$urlT=$fichaTecnica->FichaTecnica->Url_T}}
    {{$urlR=$fichaTecnica->FichaTecnica->Url_R}}
    {{$NombreCienti=Str::of($fichaTecnica->NombreCientifico)->split('/[\s,]+/')}}
 
    {{$NombreMuestraInit=Str::of($fichaTecnica->FichaTecnica->NombreRecolectorMuestra)->studly()->split('/([a-zíú]+)/')}}
  
    {{$ApellidosMuestra=Str::of($fichaTecnica->FichaTecnica->NombreRecolectorMuestra)->explode(' ')}}
   
</p>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
     
        <img src="{{ public_path("/storage/Logos/LogoPdf.png") }}" alt="..." height="40" width="192">
     
    </header>

    <footer>

    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p class="NombreComun">
           
            {{$fichaTecnica->NombreComun}} / {{$fichaTecnica->NombreComunIng}}
        </p>
        <p class="NombreCien">{{$NombreCienti[0]}} {{$NombreCienti[1]}},
            @for ($i = 2; $i < count($NombreCienti); $i++) {{$NombreCienti[$i]}} @endfor </p> 
            <div class="flex-container" style="height: 441px;">
                <div class="imgCompleta1">
                   
                    <img src="{{ public_path("storage$urlPC") }}" alt="..." class="imgCompleta1">
                  
                </div>
                <div class="container1">
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;"> ORIGEN</p>

                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 20px;">
                        {{$fichaTecnica->FichaTecnica->Origen}}</p>
                    <hr>
                    <p class="titulos" style="margin-top: 20px;margin-bottom: 0px;  "> FORMA DE
                        CRECIMIENTO</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 0px;">
                        {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Herbacea')
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Herbacea.png")}}" height="40"
                        width="40" alt="">
                      
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbustiva')
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbustiva.png")}}"
                        height="40" width="40" alt="">
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arborescente')
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arborescente.png")}}"
                        height="40" width="40" alt="">
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbórea')
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbórea.png")}}" height="40"
                        width="40" alt="">
                      
                    @else
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Columnar.png")}}" height="40"
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
                        style="margin-top: 0px;margin-bottom: 0px;padding: 0% 15px; text-align: justify;">
                        {{$fichaTecnica->FichaTecnica->Floracion}}</p>

                </div>

            </div>
                <div style="height: 30px;"></div>
                <div class="flex-container" style="height: 110px; margin: 0px; padding: 0%;">
                    <div class="item">
                        <img src="{{ public_path("storage$urlF") }}" alt=""
                            style="margin: 0%;height: 110px;width: 110px;">
                        <p class="tituloImagen">FOLLAJE</p>
                    </div>
                
                    <div class="item" style="margin-left:120px;">
                        <img src="{{ public_path("storage$urlH") }}" alt=""
                            style="margin: 0%;height: 110px;width: 110px;">
                        <p class="tituloImagen">HOJAS</p>
                    </div>
                    <div class="item" style="margin-left:242px;">
                        <img src="{{ public_path("storage$urlFL")}}" alt=""
                            style="margin: 0%;height: 110px;width: 110px;">
                        <p class="tituloImagen">FLORES</p>
                    </div>
                    <div style="margin-left:360px; width: 350px; height: 154px;">
                        <img src="{{ public_path("storage$urlT")}}" alt=""
                            style="margin: 0%;height: 154px;width: 350px;">
                        <p class="tituloImagen">TRONCO</p>
                    </div>

                </div>
                <div class="container2" style=" margin-top: 25px;">
                   
                    @if ($urlPC2)
                       
                    <img src="{{ public_path("storage$urlPC2")}}" alt="" style="margin: 0%;height: 154px;width: 348px;">
                        @else
                     
                    <img src="{{ public_path("storage$urlPC")}}" alt="" style="margin: 0%;height: 154px;width: 348px;">
  
                    @endif
                    <p class="tituloImagen">PLANTA COMPLETA</p>
                </div>

                <div style="position: fixed;top:525;left: 287">
                    <div class="flex-container" style="height: 117px; margin: 0px; padding: 0%;">
                        <div class="item">
                            <img src="{{ public_path("storage$urlFR") }}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                            <p class="tituloImagen">FRUTO</p>
                        </div>
                        <div class="item" style="margin-left:120px;">
                            <img src="{{ public_path("storage$urlS") }}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                            <p class="tituloImagen">SEMILLAS</p>
                        </div>
                        <div class="item" style="margin-left:242px;">
                            <img src="{{ public_path("storage$urlR")}}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                            <p class="tituloImagen">RAÍCES</p>
                        </div>
                    </div>
                </div>
                <div clas='saltopagina'></div>
                <div>
                    <div class="flex-container" style="height: 470px; margin: 0px 0px 20px 0px;">

                        <div class="item1" style="background-color: red;height: 470px;">
                            <img src="{{ public_path("storage$urlFL") }}" alt="..." style="width: 360px;height: 470px;">
                        </div>
                        <div class="item2" style=" margin-left: 360px; padding: 20px; height: 428px;">
                            <p class="textContenido">
                                <span style="font-family: 'Myriad Pro Bold';">Descripción:</span>&nbsp; {{$fichaTecnica->FichaTecnica->Descripcion}}
                                <br>
                                <br>
                                <span>Estatus ecológico en
                                    México:</span>&nbsp;{{$fichaTecnica->FichaTecnica->EstatusEco}}.
                                <br>
                                <br>

                                <span>Estatus de
                                    conservación:</span>&nbsp;{{$fichaTecnica->FichaTecnica->EstatusConv}}.
                                <br>
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Peligro de extinción')
                                <img style="margin-top: 10px;"
                                    src="{{public_path("storage/Logos/FichasTecnicas/EstatusConservacion/Extincion.png")}}"
                                    height="40" width="40" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Amenaza')
                                <img style="margin-top: 10px;"
                                    src="{{public_path("storage/Logos/FichasTecnicas/EstatusConservacion/Amenaza.png")}}"
                                    height="40" width="40" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Vulnerable')
                                <img style="margin-top: 10px;"
                                    src="{{public_path("storage/Logos/FichasTecnicas/EstatusConservacion/Vulnerable.png")}}"
                                    height="40" width="40" alt="">
                                @else
                                @if ($fichaTecnica->FichaTecnica->EstatusConv=='Menor preocupación')

                                <img style="margin-top: 10px;"
                                    src="{{public_path("storage/Logos/FichasTecnicas/EstatusConservacion/MenorPreocupacion.png")}}"
                                    height="40" width="40" alt="">
                                @else
                                <img style="margin-top: 10px;"
                                    src="{{public_path("storage/Logos/FichasTecnicas/EstatusConservacion/SinProblema.png")}}"
                                    height="40" width="40" alt="">
                                @endif
                                @endif
                                @endif
                                @endif
                                <br>
                                <br>
                                <span>Altura en estado
                                    natural:</span>&nbsp;{{$fichaTecnica->FichaTecnica->Altura}}m.
                                <br>
                                <br>
                                <span>Altura en condiciones
                                    urbanas:</span>&nbsp;{{$fichaTecnica->FichaTecnica->AlturaCondicionesUrbanos}}m.
                                <br>
                                <br>
                                <span>Tipo de copa:</span>&nbsp;{{$fichaTecnica->FichaTecnica->TipoC}}.
                                <br>
                                <br>
                                <span>Tipo de raíces:</span>&nbsp;{{$fichaTecnica->FichaTecnica->TipoR}}.
                                <br>
                                <br>
                                <span>Raíces observadas:</span>&nbsp;{{$fichaTecnica->FichaTecnica->RaicesObs}}.
                                <br>
                                <br>
                                <span>Porte:</span>&nbsp;{{$fichaTecnica->FichaTecnica->Porte}}.
                            </p>
                        </div>
                    </div>
                    <div class="flex-container" style="height: 223px; margin: 0px 0px 40px 0px;">
                        <div class="itemC1">
                            <p class="titulos" style="margin-top: 0px;margin-bottom: 7.5pt; line-height: 7.5pt;"> REQUERIMIENTOS DE LA ESPECIE
                            </p>
                            <p class="parrafos" style="margin: 0%;text-align: justify;">
                                {{$fichaTecnica->FichaTecnica->RequerimientosE}}</p>
                        </div>
                        <div class="itemC2" style="margin-left:  242px; 
                    border: 1px  solid rgba(0, 0, 0, 0.3);">
                            <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;color: black;">USOS</p>
                            <div  style="height: 187px; margin: 0px 0px;">
                                <div style="width: 100%; margin:0%;">
                                    <p style="font-size: 9pt;color: black;text-align: justify;">
                                        {{$fichaTecnica->FichaTecnica->Usos}}</p>
                                </div>
                               
                                <div style="width: 100%;margin: 0% 0% 0% 0%;">
                                    @if ($fichaTecnica->FichaTecnica->Usos=='Ornamental(estético)')
                                    <img style="margin-top: 0px;"
                                        src="{{public_path("storage/Logos/FichasTecnicas/Usos/Ornamental.png")}}"
                                        height="50" width="50" alt="">

                                    @else
                                    @if ($fichaTecnica->FichaTecnica->Usos=='Medicinal')
                                    <img  style="margin: 0%;"
                                        src="{{public_path("storage/Logos/FichasTecnicas/Usos/Medicinal.png")}}"
                                        height="30" width="30" alt="">
                                    @else
                                    @if ($fichaTecnica->FichaTecnica->Usos=='Comestible')
                                   
                                    <img style="margin: 0%;"
                                        src="{{public_path("storage/Logos/FichasTecnicas/Usos/Comestible.png")}}"
                                        height="50" width="50" alt="">
                                    @else
                                    @if ($fichaTecnica->FichaTecnica->Usos=='Sombra')
                                    <img style="margin: 0%;"
                                        src="{{public_path("storage/Logos/FichasTecnicas/Usos/Sombra.png")}}"
                                        height="30" width="30" alt="">
                                    @else
                                    <img style="margin: 0%;"
                                        src="{{public_path("storage/Logos/FichasTecnicas/Usos/Aromático.png")}}"
                                        height="30" width="30" alt="">
                                    @endif
                                    @endif
                                    @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="itemC1" style="margin-left:  484px">
                            <p class="titulos" style="margin-top: 0px;margin-bottom: 7.5pt; line-height: 7.5pt;"> CLIMA EN HÁBITAT NATURAL</p>
                            <p class="parrafos" style="margin: 0%;text-align: justify;">
                                {{$fichaTecnica->FichaTecnica->Clima}}</p>

                        </div>
                    </div>
                    <div >
                        <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;color: black;text-align: left;">RIESGOS Y AMENAZAS  </p>
                        <hr style="color: black; width: 100%; margin:0%;margin-right: 91%;">
                        <p class="textContenido">
                            {{$fichaTecnica->FichaTecnica->AmenazasRiesgos}}
                           
                        </p>
                        <p class="titulos" style="margin-top: 10px;margin-bottom: 0px;color: black;text-align: left;">SERVICIOS AMBIENTALES</p>
                        <hr style="color: black; width: 100%; margin:0%;margin-right: 91%;">
                        <p class="textContenido" style="margin: 0%;">
                            {{$fichaTecnica->FichaTecnica->ServiciosAmb}}
                        </p>
                    </div>
                  
           
             <div clas='saltopagina'></div>
                    <div style="width: 100%;background-color: rgb(59, 155, 100);padding: 0px;height: 30px;">
                        <p class="titulos" style="margin: 0px;"> FUENTE DE CONSULTA</p>
                    </div>
                    @foreach ($Biblio as $item)
                    <p class="parrafos" style="color: black;text-align: left;  font-family: 'Myriad Pro';"> {{$item->Referencia}}</p>
                    @endforeach
                    <div style="width: 100%;background-color: rgb(59, 155, 100);padding: 5px;height: 30px;">
                        <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;"> PARA CITAR ESTA FICHA</p>
                    </div>
                 
                    <p class="parrafos" style="color: black;text-align: left;font-family: 'Myriad Pro';height: 30px;"> 
                        Ramos-Palacios C.R. y {{$NombreMuestraInit[0] }}.{{$NombreMuestraInit[1]}}.&nbsp;{{$ApellidosMuestra[2]}}-{{$ApellidosMuestra[3]}} (2021). Ficha técnica de   <span class="NombreCien2">{{$NombreCienti[0]}} {{$NombreCienti[1]}}.&nbsp;</span>
                        <q>Inventario de especies de flora del Programa Universitario de Biodiversidad</q>.&nbsp;Agenda Ambiental, Universidad Autónoma de San Luis Potosí.&nbsp;Base de datos del Programa Universitario de Biodiversidad-UASLP, {{$fichaTecnica->Clave}}-1. México, S.L.P. <br>
                    </p>
                    <img style="margin-bottom: 10px;margin-top: 10px;"
                    src="{{public_path("storage/Logos/Licencia.PNG")}}"alt="" height="30" width="100">
                    
                </div>
                <div style="width: 100%;background-color: rgb(59, 155, 100);padding: 5px;">
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px;"> CRÉDITOS</p>
                </div>
                <p class="textContenido">
                    <span>Dirección:</span>&nbsp; Dr. Marcos Algara Siller
                    <br>
                    <span>Supervisión:</span>&nbsp; IBP. Laura Daniela Hernández
                    <br>
                    <span>Revisión y autorización:</span>&nbsp; Dr. Carlos Renato Ramos Palacios
                    <br>
                    <span>Fotografías:</span>&nbsp;   {{$fichaTecnica->FichaTecnica->NombreAutorFoto}}
                    <br>
                    @if ($fichaTecnica->FichaTecnica->NombreRecolectorMuestra==$fichaTecnica->FichaTecnica->NombreRecolectorDatos)
                    <span>Muestreo y captura:</span>&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorMuestra}}
                    @else
                    <span>>Muestreo y captura:</span>&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorMuestra}},&nbsp;{{$fichaTecnica->FichaTecnica->NombreRecolectorDatos}}
                    @endif
                    <br>
                    <span>Diseño:</span>&nbsp;LDG. María de Jesús Villarreal Iturriaga
                    <br>
                    <span>Diseño de íconos:</span>&nbsp;LDG. Itzel Zárate Figueroa
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

               
              
                <!--
        <p style="page-break-after: always;">
          
        </p>
        
        <p style="page-break-after: never;">
            Content Page 2
        </p>
    -->
                <script type="text/php">
                    if (isset($pdf)) {
            $x = 575;
            $y = 744;
            $text = "{PAGE_NUM} ";
            $font = 10;
            $size = 12;
            $color = array(255,255,255);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
    </main>


</body>



</html>