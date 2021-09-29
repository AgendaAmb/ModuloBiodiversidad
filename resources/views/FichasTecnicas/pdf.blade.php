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
       html{
        font-family: "Myriad Pro";
       }
        body {
            font-family: "Myriad Pro";
        }
        main{
            font-family: "Myriad Pro";
        }
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles
            background-color: #03a9f4;
            color: white;
            text-align: left;
            line-height: 35px;
            **/
        }
        .NombreComun{
            margin-top: -20px;
            text-align: center;
            font-family: 'Myriad Pro Bold';
            font-size: 48px;
        }
        .NombreCien{
            font-family: "Myriad Pro";
            font-weight: inherit;
            size: 12px;
        }
        footer {
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

<body >
    <!-- Define header and footer blocks before your content -->
    <header>
       H Our Code World
    </header>

    <footer>
        Copyright &copy; <?php echo date("Y");?> 
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
      <p class="NombreComun">

          {{$fichaTecnica->NombreComun}} 
      </p>
        
        <!--
        <p style="page-break-after: always;">
            Content Page 1
        </p>
        <p style="page-break-after: never;">
            Content Page 2
        </p>
    -->

    </main>
</body>



</html>