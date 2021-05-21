@extends('dashboard.main')

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
@section('contenido')

<body>
    <div class="card">
        <div class="card-header">
           <strong>
               <h2 class="text-center">Lista de usuarios</h2>
           </strong> 
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
                    @if (session()->has('message'))
                   
                    <div class="alert alert-success text-center">
                        <span>
                            {{session()->get('message') }}
                        </span>
                    
                    </div>
                    @else
                    @if(session()->has('errors'))
                    <div class="alert alert-danger text-center">
                       <span>
                           {{session()->get('errors')->first()}}
                       </span>
                    
                    </div>
                    @endif
                    @endif
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td> @foreach ($usuario->roles as $rol)
                            {{$rol->nombre}}
                            @endforeach</td>
                        <td>
                            <a class="edit" data-toggle="modal" id={{$usuario->id}} data-target="#exampleModal"
                                onclick="pasarIdUser({{$usuario->id}});"><i class="fas fa-edit"></i></a>
                            <a class="delete" data-toggle="modal" id={{$usuario->id}} data-target="#modalEliminarU"  
                                onclick="pasarIdUserE({{$usuario->id}});"><i class="far fa-trash-alt"></i></a>
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
    
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modalEliminarU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <form action="{{route('EliminarUser')}}" method="POST">
                @csrf
                <input id="idUserR" name="idUser" type="hidden" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                               <span>¿Estas seguro de eliminar a este usuario?</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">Cerrar</button>
                        <button type="submit" class="btn btn-success" value="Submit">Aceptar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <form action="{{route('CambiaRol')}}" method="POST">
                @csrf
                <input id="idUser" name="idUser" type="hidden" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <select class="select2" multiple name="roles[]" id="roles"
                                    data-placeholder="Selecciona los roles" style="width: 100%;">
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">Cerrar</button>
                        <button type="submit" class="btn btn-success" value="Submit">Guardar Cambios</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
   
</body>

@endsection

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
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
<script>
    function pasarIdUser(id){
        document.getElementById("idUser").value = id;
    }
</script>
<script>
    function pasarIdUserE(id){
        document.getElementById("idUserR").value = id;
    }
</script>

@endpush


  
 
  