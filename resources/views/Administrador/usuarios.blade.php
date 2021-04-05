@extends('dashboard.main')
<head>
    @include('head')
    @push('styles')
        <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('Dash/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @endpush
</head>
@section('contenido')

<body>
    @foreach ($usuarios as $U)
    <tr>
        <td>{{$U->name}}</td>
        <td>{{$U->email}}</td>
        <td> @foreach ($U->roles as $a)
            @if ($U->id==$a->pivot->user_id)
            {{$a->nombre}}
            @break;
            @endif
            @endforeach</td>
        <td>@foreach ($U->roles as $a)
            @if ($U->id==$a->pivot->user_id)
            {{$a->Descripcion}}
            @break;
            @endif
            @endforeach</td>
    </tr>
    @endforeach

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de usuarios</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td> @foreach ($usuario->roles as $rol)
                            @if ($usuario->id==$rol->pivot->user_id)
                            {{$rol->nombre}}
                            @break;
                            @endif
                            @endforeach</td>
                            <td >
                                <a href="./EditarUser/{{$usuario->id}}" class="edit" ><i class="fas fa-edit"></i></a>
                                <a href="./EliminarUser/{{$usuario->id}}" class="delete" ><i class="far fa-trash-alt"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
    </div>
    

</body>
@endsection

@push('scripts')
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
@endpush