
@if ($vista=="HC")
<div class="modal fade" id="{{$idModal}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        @if ($isRechazada=="true")
        <form action="{{route('RechazarHC')}}" method="post">
            @else
            <form action="{{route('VerificarHC')}}" method="post">
                @endif
                @csrf
                <input id={{$isRechazada=="true"?'idPlantaR':'idPlanta'}} name="idPlanta" type="hidden" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$modalTitle}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @if ($isRechazada=="true")
                        <span>¿Estas seguro de Rechazar esta hoja de campo? si es asi menciona cual es la razón del
                            rechazo</span>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">Motivos de rechazo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea  aria-label="With textarea" 
                                    id="Rechazo" type="text" name="MRechazo"  
                                    autocomplete="" 
                                    autofocus="autofocus"
                                     class="form-control ">
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        @else
                        <span>¿Estas seguro de verificar esta hoja de campo? recuerda que al verificar otras personas
                            podran visualizarla </span>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-danger" role="button" data-dismiss="modal">Cerrar</a>
                        <button type="submit" class="btn btn-success">Confirmar</button>


                    </div>
                </div>

            </form>

    </div>
</div>
@else
<div class="modal fade" id="{{$idModal}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        @if ($isRechazada=="true")
        <form action="{{route('RechazarFT')}}" method="post">
            @else
            <form action="{{route('VerificarFT')}}" method="post">
                @endif
                @csrf
                <input id={{$isRechazada=="true"?'idFichaTR':'idFichaT'}} name="idFichaT" type="hidden" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$modalTitle}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @if ($isRechazada=="true")
                        <span>¿Estas seguro de Rechazar esta Ficha técnica? si es asi menciona cual es la razón del
                            rechazo</span>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">Motivos de rechazo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea  aria-label="With textarea" 
                                    id="Rechazo" type="text" name="MRechazo"  
                                    autocomplete="" 
                                    autofocus="autofocus"
                                     class="form-control ">
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        @else
                        <span>¿Estas seguro de verificar esta Ficha Técnica? recuerda que al verificar otras personas
                            podran visualizarla </span>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-danger" role="button" data-dismiss="modal">Cerrar</a>
                        <button type="submit" class="btn btn-success">Confirmar</button>


                    </div>
                </div>

            </form>

    </div>
</div>
@endif
