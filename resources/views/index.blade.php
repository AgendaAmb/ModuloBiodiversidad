@extends('Parciales.carouselindex')

@section('contenido')
<main class="container-fluid mt-1" id="mainP">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('storage/Fondos/Fondo_Biodiversidad.jpg')}}" class="w-100"   alt="...">
          <div class="carousel-caption ">
            <div class="container">
              <div class="row justify-content-between">
                <div class="col-md-4 ">
                  <div class="row justify-content-center m-2">
                    <img src="{{asset('storage/Logos/Icon_hojas.png')}}" alt="" srcset=""width="50" height="50" >
                  </div>
                  <div class="row justify-content-center m-2">
                    <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="{{route('EjemplaresP')}}" role="button">Especies</a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row justify-content-center m-2">
                    <img src="{{asset('storage/Logos/Icon_hojas.png')}}" alt="" srcset=""width="50" height="50" >
                  </div>
                  <div class="row justify-content-center m-2">
                    <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="#" role="button">Contacto</a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row justify-content-center m-2">
                    <img src="{{asset('storage/Logos/Icon_hojas.png')}}" alt="" srcset=""width="50" height="50" >
                  </div>
                  <div class="row justify-content-center m-2">
                    <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" href="{{route('login')}}" role="button">Entrar</a>
                   
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
