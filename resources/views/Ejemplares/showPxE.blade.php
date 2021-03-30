@extends('dashboard.main')
<head>
    @include('head')
</head>
@section('contenido')
<body>
    @if(count($nombreEjemplar->plantaNom)!=0)
    @foreach ($nombreEjemplar->plantaNom as $Plantas)
    <h1>
        {{
            $Plantas
        
        }}
    
    </h1>
    
    @endforeach
    @else
    No exite aun ninguna planta de esta especie registrada.
    @endif
    @endsection
    
</body>