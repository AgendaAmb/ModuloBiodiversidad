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
                <h5 class="card-title text-center">{{$Ficha->NombreComun}}</h5>
                <div class="card-body">
                    <a href="{{route('FichaTecnicaPublica',['id'=>$Ficha->id])}}">
                        <img class="card-img-top " id="{{$Ficha->id}}" src="{{asset('storage/'.$Ficha->Url_PC)}}"
                            alt="Card image cap">

                    </a>
                </div>

                <div class="card-footer p-1">
                    <div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm p-1">
                                    <span>
                                        <a href="{{route('ImprimirFichaTecnica',['id'=>$Ficha->id])}}"
                                            class="d-inline-block btn btn-sm btn-primary" target="blank">
                                            PDF</i>
                                        </a>
                                    </span>
                                </div>
                                <div class="col-sm p-1">

                                </div>
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