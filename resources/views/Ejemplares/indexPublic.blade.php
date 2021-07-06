@extends('Parciales.carouselindex')

@section('contenido')

<div class="container-fluid ml-1 mr-1 pt-5 " id="fondo">
    <div class="row justify-content-xl-end justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-center mr-xl-3">
        <p><a href="{{route('Bio')}}" class="text-white text-decoration-none"  id="txtBio">BIODIVERSIDAD</a></p>  
    </div>
    <div class="row justify-content-center mt-5 mb-lg-4 mb-md-4 mb-sm-4 mb-3">
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" id="btnEsp" href="#" role="button">Especies</a>
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio"id="btnEsp" href="#" role="button">Contacto</a>
        
    </div>
   
    <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies m-xl-5 m-lg-4">
        @foreach ($Ejemplares as $Ejemplar)
        @if ($Ejemplar->FichaTecnica->Estado=="Verificado")
        <div class="col mb-4">
            <div class="card w-100 ">
                <div class="card-body">
                    <a href="{{route('FichaTecnicaPublica',['id'=>$Ejemplar->id])}}">
                        <img class="card-img-top " id="{{$Ejemplar->id}}" src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}"
                            alt="Card image cap">
                    </a>
                </div>
                <div class="card-footer p-4">
                    <h4 class="card-title text-center align-middle font-weight-bold">{{$Ejemplar->NombreComun}}</h4>
                </div>
            </div>
        </div>
        @endif    
        @endforeach
        
    </div>
    
    <div class="container mt-1 ">
        <div class="row justify-content-center ">
            {{$Ejemplares->links()}}
        </div>
    </div>
</div>
   

</div>

@endsection