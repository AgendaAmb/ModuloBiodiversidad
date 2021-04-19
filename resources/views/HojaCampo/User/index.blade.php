@extends('dashboard.main')

<head>
    @include('head')
</head>
@section('contenido')

<body>
    <div class="alert alert-danger text-center">
        <span>
            <h1>Vista para mostrar informacion de cada una de las hojas de campo que ha dado 1 usuario</h1>
        </span>

    </div>
    <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies">
        @foreach ($MisHojasCampo as $Hoja)
        <div class="col mb-4">
            <div class="card w-100 ">
                <h5 class="card-title text-center">{{$Hoja->NombreEjem->NombreComun}}</h5>
               
                @if($Hoja->Verificado)
                <span class="badge badge-success navbar-badge"><i class="fas fa-check-square"></i></span>    
                @elseif ($Hoja->NomVerificador==null&&!$Hoja->Verificado)
                <span class="badge badge-info navbar-badge"><i class="far fa-clock"></i></span>
                @else
                <span class="badge badge-warning navbar-badge"><i class="fas fa-exclamation-circle"></i></span>
                @endif
                

                <div class="card-body">


                    </a>
                </div>

                <div class="card-footer pl-5">
                    @if ($Hoja->Verificado)
                    <span>
                        {{$Hoja->NomVerificador}}
                    </span>
                    @else

                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endsection

</body>