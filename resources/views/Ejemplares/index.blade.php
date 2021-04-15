<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('head')
</head>
@extends('dashboard.main')
@section('contenido')
<div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 especies">
  @foreach ($Ejemplares as $Ejemplar)
  <div class="col mb-4">
    <div class="card w-100 ">
      <span class="badge badge-success navbar-badge">{{count($Ejemplar->plantaNom)}}</span>
      <h5 class="card-title text-center">{{$Ejemplar->NombreComun}}</h5>
      <div class="card-body">
        <a href="{{route('PlantasEjemplares',['id'=>$Ejemplar->id])}}">

          <img class="card-img-top " id="{{$Ejemplar->id}}" src="{{asset('storage\Logos\ac.jpg')}}"
            alt="Card image cap">

        </a>
      </div>

      <div class="card-footer pl-5">

      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="container">
  <div class="row justify-content-md-center">
    {{$Ejemplares->links()}}
  </div>
</div>


</div>




@endsection