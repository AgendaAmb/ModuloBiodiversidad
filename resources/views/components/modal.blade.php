
<div class="modal fade" id="{{$idModal}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$modalTitle}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                @if ($isRechazada=="true")
                <span>¿Estas seguro de Rechazar esta hoja de campo? si es asi menciona cual es la razón del rechazo</span>
                <div>
                    <label for="recipient-name" class="col-form-label">Motivos de rechazo</label>
                    <input type="text" class="form-control" id="Rechazo">
                </div>
                
                @else
                <span>¿Estas seguro de verificar esta hoja de campo? recuerda que al verificar otras personas podran visualizarla </span>
                @endif

            </div>

            <div class="modal-footer">
                <a class="btn btn-danger" role="button" data-dismiss="modal">Cerrar</a>
                @if ($isRechazada=="true")
                <a class="btn btn-success" role="button"  href="{{route('EjemplaresP')}}" >Confirmar</a>
                @else
                <a class="btn btn-success" role="button"  href="{{route('EjemplaresP')}}" >Confirmar</a>
                    
                @endif
                
            </div>
        </div>
    </div>
</div>