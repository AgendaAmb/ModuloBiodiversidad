<div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
    <div class="col mb-4" v-for="(a, index) in archivos">
        <div class="card w-100 ">
            <h5 class="card-title text-center">@{{a.parteP}} </h5>
            @if ($nuevo)
            <div class="card-body">
                <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre" :src="a.imagen" alt="Card image cap">
            </div>
            @else
            <div class="card-body">
                <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre" :src="'{{asset('storage/')}}'+a.imagen" alt="Card image cap">
            </div>
            @endif
           

            <div class="card-footer pl-5">
                @if ($nuevo)
                <small class="text-muted">
                    <input type="file" accept="image/png,image/jpeg" :id="'fileImg'+index" :name="'fileImg'+index" class="inp"
                        @change="cargarImagen($event)" />
                </small>
<<<<<<< HEAD
=======
                <!-- Botón para abrir la cámara -->
                <label for="cameraInput" class="text-muted">
                    <input type="button" id="cameraInput" class="d-none" @click="abrirVentanaEmergente">
                    <i class="fas fa-camera"></i> Abrir Cámara
                </label>
                <!-- Fin del botón -->
>>>>>>> d47101ec715bb564ba6e5fc2239247122641275c
                @else

                @endif
            </div>
        </div>
    </div>
</div>
<div class="alert alert-warning text-right" role="alert">
    <b>
        La previsualización de las imagenes no representa la calidad real de las mismas.*
    </b>
</div>

<<<<<<< HEAD
=======
<!-- @push('scripts')
<script>
    var app = new Vue({
      el: '#fondo',
      data: {
        message: 'Hola Vue!',
        prospectos:[]
      },
      methods: {
            abrirCamara() {
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
        }
    });
</script>
@endpush -->

<!-- @push('scripts')
<script>
    var app = new Vue({
      el: '#fondo',
      data: {
        message: 'Hola Vue!',
        prospectos:[]
      },
      methods: {
            abrirCamara() {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(stream => {
                        // Muestra la vista previa de la cámara
                        const video = document.createElement('video');
                        video.srcObject = stream;
                        video.setAttribute('autoplay', '');
                        video.setAttribute('playsinline', '');
                        document.body.appendChild(video);

                        video.onloadedmetadata = () => {
                            // Captura la imagen
                            const canvas = document.createElement('canvas');
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            const context = canvas.getContext('2d');
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const imgDataUrl = canvas.toDataURL('image/jpeg');
                            // Haz lo que necesites con la imagen capturada
                            console.log('Imagen capturada:', imgDataUrl);
                            // Cierra el stream de video
                            stream.getTracks().forEach(track => track.stop());
                            // Remueve el elemento de video del DOM
                            video.remove();
                        };
                    })
                    .catch(error => {
                        console.error('Error al abrir la cámara:', error);
                        // Muestra un mensaje de error al usuario
                        alert('No se pudo acceder a la cámara. Por favor, asegúrate de permitir el acceso a la cámara.');
                    });
            }
        }
    });
</script>
@endpush -->
>>>>>>> d47101ec715bb564ba6e5fc2239247122641275c
