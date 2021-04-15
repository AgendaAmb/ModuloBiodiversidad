@extends('dashboard.main')
<head>
    @include('head')
</head>
@section('contenido')
<body>
    <div class="alert alert-danger text-center">
        <span>
            <h1>Vista para mostrar informacion de ficha tecnica y poder descargarla</h1>
        </span>
     
     </div>
     <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies">
        @foreach ($MisHojasCampo as $Hoja)
        <div class="col mb-4">
          <div class="card w-100 ">
              <span class="badge badge-success navbar-badge">{{count($MisHojasCampo)}}</span>
                <h5 class="card-title text-center">{{$Hoja->NombreEjem}}</h5>
                <div class="card-body">
                   
                  
                  </a>
                </div>
    
                <div class="card-footer pl-5">
    
                </div>
            </div>
        </div>
        @endforeach
    </div>
   
    @endsection
    
</body>