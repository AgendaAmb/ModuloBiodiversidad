<!doctype html>
<html>

<head>
    @include('head')
    @stack('st')
   
</head>

<body>
    @section('Encabezado')
    <header class="container-fluid px-0">
        <div class="row text-center justify-content-center">
            <div class="col-11 franjaEncabezado"></div>
            <div class="col-12">
                <img class="mt-4 img-fluid" src="{{ asset('storage/Logos/LoginI.jpeg') }}">
            </div>
        </div>
    </header>
    @show
    @section('ContenidoPrincipal')

    <main class="container">
      
        @yield('FormularioInicioSesion')
      
    </main>

   
</body>

</html>