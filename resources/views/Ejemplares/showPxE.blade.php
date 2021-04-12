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
    
    @if(count($nombreEjemplar->plantaNom)!=0)
    @foreach($nombreEjemplar->plantaNom as $Plantas)
    <h1>
        {{
           $Plantas->imagenesPlanta
               
            
         
            
        
        }}
    
    </h1>
    
    @endforeach
    @else
    No exite aun ninguna planta de esta especie registrada.
    @endif
    @endsection
    
</body>