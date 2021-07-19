<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Portal Agenda Ambiental') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <style>
        html {
            margin: 0;
            font-family: 'Myraid light';
        }

        #NombreF {

            position: absolute;
            font-weight: 900;
            right: 15%;
            top: 10%;
            left: 15%;
            z-index: 10;

            color: white;
            text-align: center;
            font-family: 'Myraid Pro Bold';
            font-size: 50px;

        }

        .flex-container {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            text-align: center;
        }

        .item {
            width: 215px;
            height: 300px;
            background-color: white;

        }

        .item2 {
            width: 50%;
        }

        .page_break {
            page-break-before: always;
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
</p>

<body style="background-color: gray;margin: 0% 0%;padding: 0%;">
    <div style="background-color: white;margin: 0% 0%;">
        <div style="background-color: #e0e2e1;margin: 0% 0%;">
            <div style="margin-top: 10px; margin-bottom: 0%;height: 450px;width: 100%;">
                <img src="{{ public_path("storage$urlPC") }}" alt="..."
                    style="opacity: 0.6;margin-top: 5%;margin-left: 15%; margin-bottom: 0%;width: auto;height: 450px;">
                <p id="NombreF" style=" margin-top: 6%;">
                    {{$fichaTecnica->NombreComun}}
                </p>
            </div>
            <div style="text-align: center;margin-bottom: 20px; ">
                <p
                    style="font-size: 32px;color: #5f7878; margin:0%; font-family: 'Myraid Pro Bold';font-weight: bolder;  text-transform: uppercase;">
                    {{$fichaTecnica->NombreCientifico}}
                </p>
                <p style="font-size: 15px;color:#67817e; font-weight:100; text-transform: uppercase; margin:1%">
                    Tipo de permanencia de
                    las hoja: {{$fichaTecnica->FichaTecnica->TPertenencia}}
                </p>
            </div>
            <div style="text-align: center;margin-bottom: 20px;background-color: #5f7878; height: 150px;"
                class="flex-container">
                <div class="item" style="margin-right: 2%; height: 150px;background-color: #5f7878; width: 33.3%;">
                    <div>

                        <p
                            style="color: #bcc9cb; font-size: 15px;margin-top: 5px;font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            FORMA DE CRECIMIENTO</p>
                        <p style="font-size: 20px; color: white;text-transform: uppercase;margin-top: 3%;">
                            {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                    </div>
                </div>
                <div class="item" style="margin-left: 32.83%;height: 150px;background-color: #5f7878;width: 33.3%;">
                    <div>

                        <p
                            style="margin-bottom:0%;margin-top: 5px;color: #bcc9cb; font-size: 15px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            FLORACIÓN</p>
                        <p style="font-size: 12px; color: white;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Floracion}} </p>
                    </div>
                </div>
                <div class="item" style="margin-left: 65.66%;height: 150px;background-color: #5f7878;width: 33.3%;">
                    <div>
                        <p
                            style="margin-bottom:0%;margin-top: 5px; color: #bcc9cb; font-size: 15px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            ORIGEN</p>
                        <p style="font-size: 12px; color: white;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Origen}} </p>

                    </div>
                </div>
            </div>
            <div style="text-align: center;margin-bottom: 20px;background-color: #5f7878; height: 350px; margin-left: 2%;"
                class="flex-container">
                <div class="item" style="margin-right: 2%; height: 350px;background-color:white; width: 23%;">
                    <div>
                        <img src="{{ public_path("storage$urlPC") }}" width="210" height="280" alt="..." >
                        <p
                            style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                            PLANTA COMPLETA</p>
                     
                    </div>
                </div>
                <div class="item" style="margin-left: 25%;height: 350px;background-color: white;width:23%;">
                    <div>
                        <img src="{{ public_path("storage$urlF") }}" width="210" height="280" alt="..." >
                        <p
                        style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                        FOLLAJE</p>
                       
                    </div>
                </div>
                <div class="item" style="margin-left: 50%;height: 350px;background-color: white;width: 23%;">
                    <div>
                        <img src="{{ public_path("storage$urlH") }}" width="210" height="280" alt="..." >
                        <p
                        style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                        HOJAS</p>
                       
                    </div>
                </div>
                <div class="item" style="margin-left: 75%;height: 350px;background-color: white;width: 23%;">
                    <div>
                        <img src="{{ public_path("storage$urlFL") }}" width="210" height="280" alt="..." >
                        <p
                        style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                        FLORES</p>

                    </div>
                </div>
            </div>
            



            <div class="page_break">
                
            </div>
            <div style="text-align: center;margin-bottom: 20px;background-color: #5f7878; height: 350px; margin-left: 2%;"
            class="flex-container">
            <div class="item" style="margin-right: 2%; height: 350px;background-color:white; width: 23%;">
                <div>
                    <img src="{{ public_path("storage$urlFR") }}" width="210" height="280" alt="..." >
                    <p
                        style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                        FRUTOS</p>
                 
                </div>
            </div>
            <div class="item" style="margin-left: 25%;height: 350px;background-color: white;width:23%;">
                <div>
                    <img src="{{ public_path("storage$urlS") }}" width="210" height="280" alt="..." >
                    <p
                    style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                    SEMILLAS</p>
                   
                </div>
            </div>
            <div class="item" style="margin-left: 50%;height: 350px;background-color: white;width: 23%;">
                <div>
                    <img src="{{ public_path("storage$urlT") }}" width="210" height="280" alt="..." >
                    <p
                    style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                    TRONCO</p>
                   
                </div>
            </div>
            <div class="item" style="margin-left: 75%;height: 350px;background-color: white;width: 23%;">
                <div>
                    <img src="{{ public_path("storage$urlR") }}" width="210" height="280" alt="..." >
                    <p
                    style="color: #5f7878; font-size: 15px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 10px;">
                    RAÍCES</p>

                </div>
            </div>
        </div>

            <div class="flex-container" style="height: 400px;margin-left: 1%;margin-bottom: 2%;">
                <div class="item2">
                    <img src="{{ public_path("storage$urlF") }}" width="470" height="400" alt="...">
                </div>
                <div class="item2"
                    style="margin-left: 51%;background-color: white;height: 400px;color:gray;font-size: 14px; text-align: center;">
                    <p style="margin: 0%;padding: 5%;"> Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}
                        <br>
                        <br>
                        Estatus ecológico en México:{{$fichaTecnica->FichaTecnica->EstatusEco}}
                        <br>
                        <br>
                        Estatus de conservación:{{$fichaTecnica->FichaTecnica->EstatusConv}} <br><br>
                        Altura:{{$fichaTecnica->FichaTecnica->Altura}} m <br><br>
                        Tipo de copa:{{$fichaTecnica->FichaTecnica->TipoC}}<br><br>
                        Tipo de raíces:{{$fichaTecnica->FichaTecnica->TipoR}}<br><br>
                        Raíces observadas del ejemplar:{{$fichaTecnica->FichaTecnica->RaicesObs}}
                    </p>
                </div>


            </div>


            <div style="margin: 10px 0% 0% 2%; padding: 0% 0%;height: 300px; height: 400px; " class="flex-container">
                <div class="item" style="height: 400px; width: 30.3%; ">
                    <p class=""
                        style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 1% 2%;margin-top:3%;">
                        USOS</p>
                    <p style="font-size: 12px; color: #67817e;margin-top: 1%;padding: 0% 10%;">
                        {{$fichaTecnica->FichaTecnica->Usos}}
                    </p>
                    <p class=""
                        style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 0% 2%;margin-top:3%;">
                        CLIMA EN HÁBITAT NATURAL</p>
                    <p style="font-size: 12px; color: #67817e;margin-top: 0%;padding: 0% 10%;">
                        {{$fichaTecnica->FichaTecnica->Clima}}
                    </p>

                </div>
                <div class="item" style="margin-left: 33.83%; height: 400px;width: 30.3%; ">

                    <p class=""
                        style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 1% 2%;margin-top:3%;">
                        PORTE</p>
                    <p style="font-size: 12px; color: #67817e;margin-top: 1%;padding: 0% 10%;">
                        {{$fichaTecnica->FichaTecnica->Porte}}
                    </p>
                    <p class=""
                        style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 0% 2%;margin-top:3%;">
                        SISTEMA DE RAÍCES</p>
                    <p style="font-size: 12px; color: #67817e;margin-top: 0%;padding: 0% 10%;">
                        {{$fichaTecnica->FichaTecnica->SistemR}}
                    </p>


                </div>
                <div class="item" style="margin-left: 66.83%;height: 400px;width: 30.3%; ">

                    <p class=""
                        style="color: #bcc9cb; font-size: 14px;font-family: 'Myraid Pro Bold'; font-weight: 900;padding: 1% 2%;margin-top:3%;">
                        REQUERIMIENTOS DE LA ESPECIE</p>
                    <p style="font-size: 12px; color: #67817e;margin-top: 1%;padding: 0% 10%;">
                        {{$fichaTecnica->FichaTecnica->RequerimientosE}}
                    </p>

                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div style="background-color: #5f7878;text-align: center;height: 200px;padding-top: 20px;color: white;">
                <p style="font-size: 24px; margin:0%; font-weight: bolder;  text-transform: uppercase;">
                    SERVICIOS AMBIENTALES
                </p>
                <p style="font-size: 22px;">
                    {{$fichaTecnica->FichaTecnica->ServiciosAmb}}
                </p>
            </div>
            <div
                style="color: #5f7878;text-align: left;height: 150px;padding-top: 20px; padding-left: 5%; padding-right: 5%;">
                <p style="font-size: 14px;">
                    Amenazas y riesgos:{{$fichaTecnica->FichaTecnica->AmenazasRiesgos}}
                </p>
                <p style="font-size: 14px;">
                    Amenazas y riesgos para comunidad habitables:{{$fichaTecnica->FichaTecnica->ServiciosAmb}}
                </p>
            </div>
            <div style="background-color: #5f7878;text-align: center;height: 50px;padding-top: 20px;color: white;">
                <p style="font-size: 24px; margin:0%; font-weight: bolder;  text-transform: uppercase;">
                   BIBIOGRAFÍA
                </p>
            </div>

        </div>

    </div>

    </div>
</body>



</html>