@extends('dashboard.main')

<head>
    @include('head')
</head>
@section('contenido')

<body >
    @if($nombreEjemplar->FichaTecnica!=null)
    <div class="container-fluid bg-secondary">
        <div class="row justify-content-center">
            <div class="container-fluid bg-white m-5 ">
                <div class="row justify-content-center bg-warning m-3">
                   
                </div>
            </div>
        </div>
    </div>
    @else
    No exite aun ninguna planta de esta especie registrada.
    @endif
    @endsection

</body>