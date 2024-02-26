<!DOCTYPE html>
<html lang="es">
@unless(Route::currentRouteName() == 'HojaCampo')

<head>
    @include('Parciales.head')
</head>
@extends('dashboard.main')

@section('contenido')
<body>

    <h1 class="alert alert-primary text-center">Habilitar Acceso a la Cámara</h1>
    <div style="display: flex; align-items: center;">
    <p style="flex: 1; text-align: left;">Por favor, permita el acceso a la cámara.</p>
    <button style="flex: 0;" onclick="abrirCamara()">Permitir Acceso</button>
    </div>

    <script>
        function abrirCamara() {
            // Solicitar acceso a la cámara
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    // Muestra la vista previa de la cámara en la ventana emergente
                    const video = document.createElement('video');
                    video.srcObject = stream;
                    video.setAttribute('autoplay', '');
                    video.setAttribute('playsinline', '');
                    document.body.appendChild(video);
                })
                .catch(error => {
                    console.error('Error al abrir la cámara:', error);
                    // Muestra un mensaje de error al usuario
                    alert('No se pudo acceder a la cámara. Por favor, asegúrese de permitir el acceso a la cámara.');
                });
        }
    </script>
</body>
@endsection

@endif
</html>

