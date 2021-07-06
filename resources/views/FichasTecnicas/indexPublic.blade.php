@extends('Parciales.carouselindex')

@section('contenido')

<div class="container-fluid bg-secondary px-5 py-0">
    <div class="row justify-content-center">
        <div class="container-fluid bg-white mx-5 px-4 ">
            <div class="row justify-content-center bg-warning m-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}"
                                class="d-block w-100 mx-auto p-5" alt="..." style="opacity: 0.8">
                            <div class="carousel-caption d-none d-sm-block" style="bottom: 43%; opacity: 1.0;">
                                <h1 class="font-weight-bold text-uppercase" style="font-size: 50px">
                                    {{$fichaTecnica->NombreComun}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-5 mt-5">
                    <p class="text-center text-uppercase font-weight-bold " style="font-size: 32px;color: #466065;">
                        {{$fichaTecnica->NombreCientifico}}</p>
                    <p class="text-center text-uppercase" style="font-size:28px;color:#67817e;">Tipo de permanencia de
                        las hoja:{{$fichaTecnica->FichaTecnica->TPertenencia}}</p>
                </div>
                <div class="row row-cols-1 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 especies mx-xl-5 mx-lg-4  mt-xl-5 mt-lg-4">
                    <div class="col mb-4 px-2">
                        <div class="card w-100 ">
                            <div class="card-body">
                                <a href="#">
                                    <img class="card-img-top " style="height: 18rem;"
                                        src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-footer px-4 pb-4 pt-2">
                                <p class="card-title text-center align-middle font-weight-bold mt-0"
                                    style="font-size: 12px;">
                                    FORMA DE CRECIMIENTO</p>
                                <p class="card-title text-center align-middle font-weight-bold mt-3 "
                                    style="font-size: 12px;">
                                    {{$fichaTecnica->FichaTecnica->Fcrecimiento}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 px-2">
                        <div class="card w-100 ">
                            <div class="card-body">
                                <a href="#">
                                    <img class="card-img-top " style="height: 18rem;"
                                        src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-footer px-4 pb-4 pt-2">
                                <p class="card-title text-center align-middle font-weight-bold"
                                    style="font-size: 12px;">
                                    FRORACIÓN</p>
                                <p class="card-title text-center align-middle font-weight-bold mt-3 text-break "
                                    style="font-size: 12px;">
                                    {{$fichaTecnica->FichaTecnica->Floracion}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 px-2">
                        <div class="card w-100  ">
                            <div class="card-body">
                                <a href="#">
                                    <img class="card-img-top " style="height: 18rem;"
                                        src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-footer px-4 pb-4 pt-2">
                                <p class="card-title text-center align-middle font-weight-bold"
                                    style="font-size: 12px;">
                                    {{$fichaTecnica->FichaTecnica->Floracion}}</p>
                                <p class="card-title text-center align-middle font-weight-bold mt-3 text-break "
                                    style="font-size: 12px;">
                                    {{$fichaTecnica->FichaTecnica->Origen}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid pl-0 pr-1 mt-4 bg-white">
                    <div class="row">
                        <div class="col-6 pr-0"><img src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}"
                                class="w-100 h-100" alt=""></div>
                        <div class="col-6 p-5" style="font-size: 12px;color:gray;font-weight: 600;">
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Estatus ecológico en México:{{$fichaTecnica->FichaTecnica->EstatusEco}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Estatus de conservación:{{$fichaTecnica->FichaTecnica->EstatusConv}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Altura:{{$fichaTecnica->FichaTecnica->Altura}}m</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Tipo de copa:{{$fichaTecnica->FichaTecnica->TipoC}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Tipo de raíces:{{$fichaTecnica->FichaTecnica->TipoR}}</p>
                            <p class="card-title text-center align-middle  mt-3 text-break pr-5">
                                Raíces observadas del ejemplar:{{$fichaTecnica->FichaTecnica->RaicesObs}}</p>
                        </div>
                    </div>
                </div>
               <div class="container-fluid my-5" style="font-size: 12px;color:gray;">
                   <div class="row justify-content-around">
                       <div class="col bg-white px-0 mx-5">
                        <p class="card-title text-center align-middle  mt-3 text-break ">
                            Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}</p>
                       </div>
                       <div class="col bg-white px-0 mx-5">
                        <p class="card-title text-center align-middle  mt-3 text-break ">
                            Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}</p>
                       </div>
                       <div class="col  bg-white px-0 mx-5">
                        <p class="card-title text-center align-middle  mt-3 text-break ">
                            Descripción:{{$fichaTecnica->FichaTecnica->Descripcion}}</p>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection