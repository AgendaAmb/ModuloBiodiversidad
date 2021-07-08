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
            left: 45%;
            z-index: 10;
            font-weight: bolder;
            top: 8%;
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
            width:185px;
            height:300px;
            background-color: white;
           
        }
    </style>
</head>

<body style="background-color: gray;margin: 0% 0%;padding: 0%">
    <div style="background-color: white;margin: 0% 4%;">
        <div style="background-color: #e0e2e1;margin: 0% 4%;">
            <div style="margin-top: 10px; margin-bottom: 0%;">
                <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}"  width="700" height="500"
                    alt="..." style="opacity: 0.6;margin-top: 5%;margin-left: 5%; margin-bottom: 0%;">
                <p id="NombreF" style=" margin-bottom: 1%;">
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
            <div style="margin: 2% 6%; padding: 0% 0%; " class="flex-container">
                <div class="item" style="margin-right: 2%; ">
                  <div >
                      <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="185" height="200" alt="">
                      <p class=""style="color: #bcc9cb; font-size: 10px;font-family: 'Myraid Pro Bold'; font-weight: 900;">
                      FORMA DE CRECIMIENTO</p>
                  <p  style="font-size: 14px; color: #67817e;text-transform: uppercase;margin-top: 1%;">
                      {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                </div>
                </div>
                <div class="item" style="margin-left: 34.83%;">
                    <div>
                        <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="185" height="200" alt="">
                        <p style="margin-bottom:0%;color: #bcc9cb; font-size: 10px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            FRORACIÓN</p>
                        <p  style="font-size: 10px; color: #67817e;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Floracion}} marzo a noviembre. Las ores se agrupan
                            en inorescencias y pueden ser blanquecinas,
                            cuelgan como lágrimas mecidas por el
                            viento.</p>
                    </div>
                </div>
                <div class="item" style="margin-left: 69.66%;">
                    <div>
                        <img src="{{ public_path('storage\Fondos\Fondo_Biodiversidad.jpg') }}" width="185" height="200" alt="">
                        <p style="margin-bottom:0%;color: #bcc9cb; font-size: 10px;  font-family: 'Myraid Pro Bold'; font-weight: 900;">
                            ORIGEN</p>
                        <p  style="font-size: 10px; color: #67817e;margin-top: 0%;padding: 0% 1%;">
                            {{$fichaTecnica->FichaTecnica->Origen}} marzo a noviembre. Las ores se agrupan
                            en inorescencias y pueden ser blanquecinas,
                            cuelgan como lágrimas mecidas por el
                            viento.</p>
                    
                    </div>
                </div>
               
            </div>

        </div>

    </div>
</body>



</html>