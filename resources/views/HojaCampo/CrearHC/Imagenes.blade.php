<!-- Captura, muestra, en ventana index -->

<!-- <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
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
                <button class="btn btn-secondary btn-sm ml-3" onclick="openWelcomePopup()">Abrir Cámara</button>
                @else
                
                @endif
            </div>
        </div>
    </div>
</div> 
<div class="alert alert-warning text-right" role="alert">
    <b>
        La previsualización de las imágenes no representa la calidad real de las mismas.*
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
</script> -->
<!-- 
se muestra dos imagenes desde ventana emergente -->

<!-- <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
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
                <button class="btn btn-secondary btn-sm ml-3" @click="openWelcomePopup(index)">Abrir Cámara</button>
                @else
                
                @endif
            </div>
        </div>
    </div>
</div> 
<div class="alert alert-warning text-right" role="alert">
    <b>
        La previsualización de las imágenes no representa la calidad real de las mismas.*
    </b>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        // Definimos una función dentro del evento DOMContentLoaded
        function createOpenWelcomePopup(index) {
            // Esta función interna actúa como un closure y captura el contexto de la variable 'index'
            return function() {
                // Dentro de esta función anidada, tenemos acceso a 'index' sin necesidad de pasarlo como parámetro
                // Abre una nueva ventana emergente con la URL '/welcome' y pasa el índice del archivo
                console.log("Vamos a la ventana emergente:", event.data);
                window.open('/welcome?index=' + index, 'WelcomeWindow', 'width=600,height=400');
            };
        }

        // Iteramos sobre los botones de abrir cámara y les asignamos la función createOpenWelcomePopup con el índice correspondiente
        var buttons = document.querySelectorAll('.btn-secondary');
        buttons.forEach(function(button, index) {
            button.addEventListener('click', createOpenWelcomePopup(index));
        });
    });

    window.addEventListener('message', function(event) {
        console.log("Mensaje recibido en la ventana principal:", event.data);

        if (event.data && event.data.image && event.data.imageId) {
            var imageSrc = event.data.image;
            var imageId = event.data.imageId;
            var imgElement = document.getElementById(imageId);
            if (imgElement) {
                imgElement.src = imageSrc;
                console.log("Imagen recibida:", imageSrc);
            } else {
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
</script> -->

<!-- 
Abre ventana emergente, toma foto, y se muestra en la ventana principal -->

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
                <button class="btn btn-secondary btn-sm ml-3" @click="openWelcomePopup(index)">Abrir Cámara</button>
                @else
                
                @endif
            </div>
        </div>
    </div>
</div> 
<div class="alert alert-warning text-right" role="alert">
    <b>
        La previsualización de las imágenes no representa la calidad real de las mismas.*
    </b>
</div>

<script>
    var currentIndex = 0; // Inicializamos currentIndex en 0

    // Función para abrir la ventana emergente y pasar el índice
    function openWelcomePopup(index) {
        console.log("Vamos a la ventana emergente:", index);
        window.open('/welcome?index=' + index, 'WelcomeWindow', 'width=600,height=400');
    }

    // Escuchador de eventos para abrir la ventana emergente con el índice correspondiente
    window.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.btn-secondary');
        buttons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                openWelcomePopup(index);
                currentIndex = index; // Actualizamos currentIndex al índice del botón clickeado
            });
        });
    });
    // Escuchar mensajes del popup
    window.addEventListener('message', function(event) {
        // Verificar si el mensaje proviene del popup
        if (event.source === popup && event.data) {
            // Verificar si el mensaje contiene un índice válido
            if (typeof event.data.index !== 'undefined') {
                // Actualizar el valor en la casilla correspondiente
                document.getElementById('casilla_' + event.data.index).innerText = event.data.index;
            } else {
                console.error('Mensaje recibido desde el popup sin índice válido:', event.data);
            }
        }
    });
    window.addEventListener('message', function(event) {
        console.log("Mensaje recibido en la ventana principal:", event.data);

        if (event.data && event.data.image && event.data.imageId && event.data.index !== undefined) {
            var imageSrc = event.data.image;
            var imageId = event.data.imageId;
            var index = event.data.index;

            // Buscar el cuadro correspondiente al índice recibido
            var imgElement = document.getElementById(imageId);
            if (imgElement) {
                imgElement.src = imageSrc;
                console.log("Imagen recibida:", imageSrc);
            } else {
                var cardBody = document.querySelectorAll('.card-body')[index];
                if (cardBody) {
                    var newImg = document.createElement('img');
                    newImg.setAttribute('class', 'card-img-top');
                    newImg.setAttribute('id', imageId);
                    newImg.setAttribute('alt', 'Card image cap');
                    newImg.src = imageSrc;
                    cardBody.appendChild(newImg);
                    console.log("Nueva imagen añadida:", imageSrc);
                } else {
                    console.error("No se encontró el bloque card-body para el índice:", index);
                }
            }
        }
    });
</script>