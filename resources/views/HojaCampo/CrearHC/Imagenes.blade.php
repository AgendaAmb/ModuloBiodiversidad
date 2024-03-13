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
                        @change="cargarImagen($event, index)" />
                </small>
                <button class="btn btn-secondary btn-sm ml-3" onclick="openWelcomePopup()">Abrir Cámara</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('message', function(event) {
            if (event.data && event.data.image && event.data.imageId) {
                var imageSrc = event.data.image;
                var imageId = event.data.imageId;
                var imgElement = document.getElementById(imageId);
                if (imgElement) {
                    imgElement.src = imageSrc;
                    console.log("Imagen recibida:", imageSrc);
                } else {
                    // Si no se encuentra el elemento de imagen con el ID dado,
                    // crea un nuevo elemento de imagen y agrégalo al bloque card-body
                    var cardBody = document.querySelector('.card-body');
                    if (cardBody) {
                        var newImg = document.createElement('img');
                        newImg.setAttribute('class', 'card-img-top');
                        newImg.setAttribute('id', imageId);
                        newImg.setAttribute('alt', 'Card image cap');
                        newImg.src = imageSrc;
                        cardBody.appendChild(newImg);
                        console.log("Nueva imagen añadida:", imageSrc);
                    } else {
                        console.error("No se encontró el bloque card-body");
                    }
                }
            }
        });
    });
    function openWelcomePopup() {
        // Abre una nueva ventana emergente con la URL '/welcome'
        window.open('/welcome', 'WelcomeWindow', 'width=600,height=400');
    }
</script>