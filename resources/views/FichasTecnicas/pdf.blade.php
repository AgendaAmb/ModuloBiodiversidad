<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
            font-size: 50px;
            left: 33%;
            z-index: 10;
            font-weight: bolder;
            top: 10%;
            text-transform: uppercase;
            color: #fff;
            text-align: center;
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
    </style>
</head>

<body style="background-color: gray;margin: 0% 0%;padding: 0%">
    <div style="background-color: white;margin: 0% 4%;">
        <div style="background-color: #e0e2e1;margin: 0% 4%;">
            <div style="margin-top: 10px; margin-bottom: 0%;height: 500px;">
                <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="700" height="500"
                    alt="..." style="opacity: 0.6;margin-top: 5%;margin-left: 5%; margin-bottom: 0%;">
                <p id="NombreF" style=" margin-top: 6%;">
                    {{$fichaTecnica->NombreComun}}
                </p>
            </div>
            <div style="text-align: center;margin-bottom: 40px 0%;">
                <p
                    style="font-size: 32px;color: #466065; margin:0%; font-family: 'Myraid Pro Bold';font-weight: bolder;  text-transform: uppercase;">
                    {{$fichaTecnica->NombreCientifico}}
                </p>
                <p style="font-size: 15px;color:#67817e; font-weight:100; text-transform: uppercase; margin:0%">
                    Tipo de permanencia de
                    las hoja:{{$fichaTecnica->FichaTecnica->TPertenencia}}
                </p>
            </div>

            <div style="margin: 2% 0% 0% 5%; padding: 0% 0%;height: 300px; " class="flex-container">
                <div class="item" style="margin-right: 2%; ">
                    <div>
                        <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="215" height="200"
                            alt="">
                        <p class=""
                            style="color: #bcc9cb; font-size: 10px;font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            FORMA DE CRECIMIENTO</p>
                        <p style="font-size: 14px; color: #67817e;text-transform: uppercase;margin-top: 1%;">
                            {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                    </div>
                </div>
                <div class="item" style="margin-left: 32.83%;">
                    <div>
                        <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="215" height="200"
                            alt="">
                        <p
                            style="margin-bottom:0%;margin-top: 5px;color: #bcc9cb; font-size: 12px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            FRORACIÓN</p>
                        <p style="font-size: 10px; color: #67817e;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Floracion}} marzo a noviembre. Las ores se agrupan
                            en inorescencias y pueden ser blanquecinas,
                            cuelgan como lágrimas mecidas por el
                            viento.</p>
                    </div>
                </div>
                <div class="item" style="margin-left: 65.66%;">
                    <div>
                        <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="215" height="200"
                            alt="">
                        <p
                            style="margin-bottom:0%;margin-top: 5px; color: #bcc9cb; font-size: 12px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            ORIGEN</p>
                        <p style="font-size: 10px; color: #67817e;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Origen}} marzo a noviembre. Las ores se agrupan
                            en inorescencias y pueden ser blanquecinas,
                            cuelgan como lágrimas mecidas por el
                            viento.</p>

                    </div>
                </div>
            </div>
            <div class="flex-container" style="height: 400px;margin-left: 1%;margin-bottom: 2%;">
                <div class="item2">
                    <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="400" height="400"
                        alt="...">
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
                </div>


            </div>


            <div style="margin: 10px 0% 0% 5%; padding: 0% 0%;height: 300px; height: 400px;" class="flex-container">
                <div class="item" style="margin-right: 2%;height: 400px; ">
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
                <div class="item" style="margin-left: 32.83%; height: 400px;">

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
                <div class="item" style="margin-left: 65.66%;height: 400px;">

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
            <div style="background-color: #466065;text-align: center;height: 200px;padding-top: 20px;color: white;">
                <p style="font-size: 24px; margin:0%; font-weight: bolder;  text-transform: uppercase;">
                    SERVICIOS AMBIENTALES
                </p>
                <p style="font-size: 22px;">
                    {{$fichaTecnica->FichaTecnica->ServiciosAmb}} Lorem ipsum, dolor sit amet consectetur adipisicing
                    elit. Minima veniam nesciunt repudiandae facilis inventore ipsum accusantium atque impedit
                    provident, culpa eos quibusdam quasi consequuntur distinctio libero quos totam temporibus optio.
                </p>
            </div>
            <div
                style="color: #466065;text-align: left;height: 150px;padding-top: 20px; padding-left: 5%; padding-right: 5%;">
                <p style="font-size: 14px;">
                    Amenazas y riesgos:{{$fichaTecnica->FichaTecnica->AmenazasRiesgos}} Lorem ipsum, dolor sit amet
                    consectetur adipisicing elit. Minima veniam nesciunt repudiandae facilis inventore ipsum accusantium
                    atque impedit provident, culpa eos quibusdam quasi consequuntur distinctio libero quos totam
                    temporibus optio.
                </p>
                <p style="font-size: 14px;">
                    Amenazas y riesgos para comunidad habitables:{{$fichaTecnica->FichaTecnica->ServiciosAmb}} Lorem
                    ipsum, dolor sit amet consectetur adipisicing elit. Minima veniam nesciunt repudiandae facilis
                    inventore ipsum accusantium atque impedit provident, culpa eos quibusdam quasi consequuntur
                    distinctio libero quos totam temporibus optio.
                </p>
            </div>


        </div>

    </div>

    </div>
</body>



</html>