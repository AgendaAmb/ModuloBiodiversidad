<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('head')
  @push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('Dash/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  @endpush
</head>
@extends('dashboard.main')
@section('contenido')

<div class="container-fluid" id="fondo">
  <button @click="seen=!seen">cambiar vista</button>
  <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-sm-1  especies " v-show="!seen">

    @foreach ($Ejemplares as $Ejemplar)
    <div class="col mb-4">
      <div class="card w-100 mt-1">
        <span class="badge badge-success navbar-badge">{{count($Ejemplar->plantaNom)}}</span>

        <div class="card-body">
          <a href="{{route('PlantasEjemplares',['id'=>$Ejemplar->id])}}">
            <img class="card-img-top " id="{{$Ejemplar->id}}" src="{{asset('storage\Fondos\Fondo_Biodiversidad.webp')}}"
              alt="Card image cap">
          </a>
        </div>

        <div class="card-footer p-4 text-center align-middle font-weight-bold">
          <h4>
            {{$Ejemplar->NombreComun}}
          </h4>
        </div>

      </div>
    </div>
    @endforeach

  </div>
  <div class="container mt-1" v-show="!seen">
    <div class="row justify-content-center">
      {{$Ejemplares->links()}}
    </div>
  </div>

  <div class="card mt-3" v-show="seen">
    <div class="card-header">
      <strong>
        <h2 class="text-center">Lista de ejemplares</h2>
      </strong>
    </div>

    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>ID</th>
            <th>NombreCientífico</th>
            <th>Nombre común</th>
            <th>Clave</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ejemplar in Ejemplares">
            <td></td>
            <td> @{{ejemplar.id}}</td>
            <td> @{{ejemplar.Nombre}}</td>
            <td> @{{ejemplar.NombreC}}</td>
            <td> @{{ejemplar.Clave}}</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th>Imagen</th>
            <th>ID</th>
            <th>NombreCientífico</th>
            <th>Nombre común</th>
            <th>Clave</th>
          </tr>
        </tfoot>

      </table>
    </div>
  </div>


</div>






</div>
@push('scripts')
<script src="{{asset('Dash/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('Dash/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Dash/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('Dash/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

</script>
<script>
  var app = new Vue({
  el: '#fondo',
  data: {
    Ejemplares:[],
    seen:false,
   
    
  },
  methods: {
  CambiaVista: function () {
     this.seen=true
    
    }
  },
  mounted: function () {
  this.$nextTick(
    function () {
    @foreach($EjemplaresJava as $Ejemplar)
                this.Ejemplares.push({
                    "id":'{{$Ejemplar->id}}',
                    "Nombre":'{{$Ejemplar->NombreComun}}',
                    "NombreC":'{{$Ejemplar->NombreCientifico}}',
                    "Clave":'{{$Ejemplar->Clave}}'
                });
    @endforeach    
  })
}, 


})

</script>

@endpush
@endsection