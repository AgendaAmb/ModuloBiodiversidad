@extends('dashboard.main')

<head>
    @include('head')
</head>
@section('contenido')

<body>
    <div class="alert alert-secondary    text-center">
        <span>
            <h1 style="font-family: Myraid Pro Bold;">Fichas Tecnicas</h1>
        </span>

    </div>
    <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies">
        @foreach ($FichasTecnicas as $Ficha)

        <div class="col mb-4">
            <div class="card w-100 ">
                <h5 class="card-title text-center" style="font-family: Myraid Pro Bold">{{$Ficha->NombreComun}}</h5>
                @if($Ficha->Estado=="Verificado")
                <span class="badge badge-success navbar-badge"><i class="fas fa-check-square"></i></span>
                @elseif ($Ficha->Estado=="Verificacion")
                <span class="badge badge-info navbar-badge"><i class="far fa-clock"></i></span>
                @else
                <span class="badge badge-warning navbar-badge"><i class="fas fa-exclamation-circle"></i></span>
                @endif
                <div class="card-body">
                    <a href="{{route('UserFTShow',['id'=>$Ficha->id])}}">
                        <img class="card-img-top " id="{{$Ficha->id}}" src="{{asset('storage/'.$Ficha->Url_PC)}}"
                            alt="Card image cap">

                    </a>
                </div>

                <div class="card-footer p-1">
                    <div>
                        <div class="container">
                            <div class="row justify-content-center ">

                                <div class="col-2 p-0">                                   
                                        <a href="{{route('ImprimirFichaTecnica',['id'=>$Ficha->id])}}"
                                            class="d-inline-block btn btn-sm btn-danger text-center" target="blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                </div>
                                <div class="col-2 p-0">
                                        <a href="{{route('FichaTecnicaPublica',['id'=>$Ficha->id])}}"
                                            class="d-inline-block btn btn-sm btn-info" target="blank"
                                            >
                                            <i class="fas fa-eye"></i>
                                        </a>
                                </div>
                                @if ($Ficha->Estado=="Rechazada")
                                <div class="col-2 p-0">
                                    <a href="{{route('UserFTEdit',['id'=>$Ficha->id])}}"
                                        class="d-inline-block btn btn-sm btn-warning" target="blank"
                                        >
                                        <i class="fas fa-edit"></i>
                                    </a>
                            </div>
                                @endif
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            {{$FichasTecnicas->links()}}
        </div>
    </div>

    @endsection

</body>