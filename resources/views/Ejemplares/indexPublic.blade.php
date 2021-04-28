@extends('Parciales.carouselindex')

@section('contenido')
<div class="container-fluid ml-1 mr-1 pt-5 " id="fondo">
    <div class="row justify-content-center mt-5 mb-lg-4 mb-md-4 mb-sm-4 mb-3">
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="#" role="button">Especies</a>
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="#" role="button">Contacto</a>
    </div>
    <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies m-xl-5 m-lg-4">
        @foreach ($Ejemplares as $Ejemplar)
        <div class="col mb-4">
            <div class="card w-100 ">
                <div class="card-body">
                    <a href="{{route('PlantasEjemplares',['id'=>$Ejemplar->id])}}">
                        <img class="card-img-top " id="{{$Ejemplar->id}}" src="{{asset('storage\Fondos\Fondo_Biodiversidad.jpg')}}"
                            alt="Card image cap">
                    </a>
                </div>
                <div class="card-footer p-4">
                    <h5 class="card-title text-center align-middle font-weight-bold">{{$Ejemplar->NombreComun}}</h5>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    
    <div class="container mt-1 ">
        <div class="row justify-content-md-center ">
            {{$Ejemplares->links()}}
        </div>
    </div>
</div>
   

</div>

@endsection