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
    
    @if($nombreEjemplar->FichaTecnica!=null)
        <h1>
            {{$nombreEjemplar}}
        </h1>

    @else
    No exite aun ninguna planta de esta especie registrada.
    @endif
    @endsection
    
</body>