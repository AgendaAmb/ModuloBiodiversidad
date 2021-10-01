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
            margin: 100px 30px;
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

        html {
            font-family: "Myriad Pro";
        }

        body {
            margin: 0% 20px;
            font-family: "Myriad Pro";
        }
        .saltopagina{page-break-after:always;}
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
            background-color: #3B9B64;
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

        .titulos {
            font-family: 'Myriad Pro Bold';
            text-align: center;
            font-size: 16px;
            color: white;
        }
        .tituloImagen{
            font-family: 'Myriad Pro Bold';
            font-size: 9pt;
            color:  #3B9B64;
            text-align: left;
            margin: 0%;
            padding: 0%;
        }
        .parrafos {
            font-family: "Myriad Pro";
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
            padding:   20px 20px 0px 20px;
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

        footer {
            margin: 0% 20px;
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        hr {
            color: white;
            width: 100px;
        }
    </style>

</head>
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

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="{{ public_path("storage/Logos/LogoPdf.png") }}" alt="..." height="30" width="152">
    </header>
    <!--
    <footer>
        Copyright &copy; <?php echo date("Y");?> 
    </footer>
-->
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

                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 10px;">
                        {{$fichaTecnica->FichaTecnica->Origen}}</p>
                    <hr>
                    <p class="titulos" style="margin-top: 10px;margin-bottom: 0px;  "> FORMA DE
                        CRECIMIENTO</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 0px;">
                        {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Herbacea')
                    <img src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Herbacea.png")}}"
                        height="30" width="30" alt="">
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbustiva')
                    <img src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbustiva.png")}}"
                        height="30" width="30" alt="">
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arborescente')
                    <img src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arborescente.png")}}"
                        height="30" width="30" alt="">
                    @else
                    @if ($fichaTecnica->FichaTecnica->Fcrecimiento=='Arbórea')
                    <img style="margin-top: 10px;"
                        src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Arbórea.png")}}" height="30"
                        width="30" alt="">
                    @else
                    <img src="{{public_path("storage/Logos/FichasTecnicas/FormasCrecimiento/Columnar.png")}}"
                        height="30" width="30" alt="">
                    @endif
                    @endif
                    @endif
                    @endif
                    <hr style="margin-top: 10px;">
                    <p class="titulos" style="margin-top: 10px;margin-bottom: 0px; padding-top: 0px;"> PERMANENCIA DE
                        HOJAS</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 10px;">
                        {{$fichaTecnica->FichaTecnica->TPertenencia}}</p>
                    <hr>
                    <p class="titulos" style="margin-top: 0px;margin-bottom: 0px; padding-top: 0px;"> FLORACIÓN</p>
                    <p class="parrafos" style="margin-top: 0px;margin-bottom: 0px;padding: 0% 15px; text-align: justify;">
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
                        <div class="item"style="margin-left:120px;">
                            <img src="{{ public_path("storage$urlH") }}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                                <p class="tituloImagen">HOJAS</p>
                        </div>
                        <div class="item" style="margin-left:242px;">
                            <img src="{{ public_path("storage$urlFL")}}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                                <p class="tituloImagen">FLORES</p>
                        </div>
                        <div  style="margin-left:360px; width: 348px; height: 154px;">
                            <img src="{{ public_path("storage$urlT")}}" alt=""
                                style="margin: 0%;height: 154px;width: 348px;">
                                <p class="tituloImagen">TRONCO</p>
                        </div>
                       
                </div>
                <div class="container2" style=" margin-top: 25px;">
                    <img src="{{ public_path("storage$urlPC")}}" alt=""
                    style="margin: 0%;height: 154px;width: 348px;">
                    <p class="tituloImagen">PLANTA COMPLETA</p>
                </div>
                
                <div style="position: fixed;top:525;left: 287">
                    <div class="flex-container" style="height: 117px; margin: 0px; padding: 0%;">
                        <div class="item">
                            <img src="{{ public_path("storage$urlFR") }}" alt=""
                                style="margin: 0%;height: 110px;width: 110px;">
                                <p class="tituloImagen">FRUTO</p>
                        </div>
                        <div class="item"style="margin-left:120px;">
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
                <div>hola</div>
        <!--
        <p style="page-break-after: always;">
          
        </p>
        
        <p style="page-break-after: never;">
            Content Page 2
        </p>
    -->
                <div class="backgoundCountP">

                </div>
                <script type="text/php">
                    if (isset($pdf)) {
            $x = 575;
            $y = 710;
            $text = "{PAGE_NUM} ";
            $font = null;
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