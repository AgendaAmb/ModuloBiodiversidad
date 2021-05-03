@extends('Parciales.carouselindex')

@section('contenido')
<main class="container-fluid mt-1 p-0" id="mainP">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('storage/Fondos/Fondo_Biodiversidad.webp')}}" class="img-fluid" alt="...">
        <div class="carousel-caption ">
          <div class="container-fluid">
            <div class="row">

              <x-menuBio btnText="Especies" btnUrl="EjemplaresP" />

              <x-menuBio btnText="Entrar" btnUrl="login" />

              <x-menuBio btnText="Contacto" btnUrl="#" />
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>
@endsection