<!-- Captura, muestra, en ventana index -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var allPredictions = predictions;
                    // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
                    drawBoundingBoxes(allPredictions);
                    // var peopleAndVegetationPredictions = predictions.filter(prediction => {
                    //     return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    // });

                    // // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    // drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot() {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';

                // Enviar la imagen capturada al escucha en la ventana principal
                // Enviar la imagen capturada al escucha en la ventana principal
                window.opener.postMessage({ image: data_uri, imageId: 'imagen_capturada' }, '*');
                //window.opener.postMessage({ image: imageData, imageId: cardId }, '*');
                //window.opener.postMessage({ image: data_uri, imageId: cardId }, '*');
            }

            
            submitButton.addEventListener('click', function() {
                // Código para hacer lo que sea necesario antes de cerrar la ventana emergente

                // Enviar un mensaje al escucha en la ventana principal
                window.opener.postMessage({ message: "Se ha cerrado la ventana emergente" }, '*');

                window.close(); // Esto cerrará la ventana emergente
            });

        });
    </script>
</body>
</html> -->

<!-- 
Se envia imagen con el mismo nombre -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot" onclick="take_snapshot(0)">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        // $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var allPredictions = predictions;
                    // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
                    drawBoundingBoxes(allPredictions);
                    // var peopleAndVegetationPredictions = predictions.filter(prediction => {
                    //     return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    // });

                    // // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    // drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot(index) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';

                // Definir el id único para la imagen capturada
                var imageId = 'imagen_capturada_' + index;

                // Enviar la imagen capturada al escucha en la ventana principal
                console.log("Enviando imagen capturada");
                window.opener.postMessage({ image: data_uri, imageId: imageId }, '*');
                console.log("Se ha enviado imagen capturada");
            }

            
            submitButton.addEventListener('click', function() {
                console.log("Enviando mensaje a la ventana principal...");
                // Enviar un mensaje al escucha en la ventana principal
                window.opener.postMessage({ message: "Se ha cerrado la ventana emergente" }, '*');
                console.log("Mensaje enviado a la ventana principal");

                window.close(); // Esto cerrará la ventana emergente
            });

        // });
    </script>
</body>
</html> -->
<!-- 
Abre ventana emergente, toma foto, y se muestra en la ventana principal -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot" data-index="{{ $index }}">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        // Obtener el índice de la URL
        var takeSnapshotButton = document.getElementById('take_snapshot');
        // Obtener el valor de index de la URL
        var urlParams = new URLSearchParams(window.location.search);
        var index = urlParams.get('index');
        console.log("Valor de index en la ventana emergente:", index);

        takeSnapshotButton.addEventListener('click', function() {
            // Obtener el índice del botón
            //var index = parseInt(this.getAttribute('data-index'));
            console.log("Valor de index en la ventana emergente:", index);
            // Llamar a take_snapshot() con el índice obtenido
            take_snapshot(index);
        });
        // $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            // Función para solicitar permisos de ventana emergente
            function requestPopupPermission() {
                // Preguntar al usuario si desea abrir la ventana emergente
                if (window.confirm('¿Quieres abrir la ventana con la dirección URL especificada?')) {
                    // Abrir la dirección URL especificada en una nueva ventana
                    window.open('http://127.0.0.1:8000/Ejemplares', '_blank');
                }
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    //console.log("Detecciones realizadas:", predictions);
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var allPredictions = predictions;
                    // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
                    drawBoundingBoxes(allPredictions);
                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detectando objetos:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                // Agregar evento de clic en el canvas
                

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro

                    canvas.addEventListener('click', function(event) {
                        console.log("Evento de clic en el canvas detectado.");
                        var rect = canvas.getBoundingClientRect();
                        var clickX = event.clientX - rect.left;
                        var clickY = event.clientY - rect.top;

                        // Verificar si el clic está dentro del cuadro delimitador actual
                        if (clickX >= x && clickX <= x + width && clickY >= y && clickY <= y + height) {
                            // Solicitar permisos de ventana emergente
                            //requestPopupPermission();
                            window.open('http://127.0.0.1:8000/Ejemplares');
                        }
                    });

                    
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            // Iniciar la detección de objetos
            detectObjects();
            // function detectObjects() {
            //     detector.detect(video)
            //     .then(function(predictions) {
            //         console.log("Detecciones realizadas:", predictions);
            //         // Filtrar predicciones para mostrar solo personas y vegetación
            //         var allPredictions = predictions;
            //         // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
            //         drawBoundingBoxes(allPredictions);
            //         // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
            //         requestAnimationFrame(detectObjects);
            //     })
            //     .catch(function(error) {
            //         console.error('Error detectando objetos:', error);
            //     });
            // }

            // function drawBoundingBoxes(predictions) {
            //     var canvas = document.createElement('canvas');
            //     canvas.width = video.videoWidth;
            //     canvas.height = video.videoHeight;
            //     var ctx = canvas.getContext('2d');

            //     ctx.clearRect(0, 0, canvas.width, canvas.height);
            //     ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //     ctx.font = '16px Arial';

            //     predictions.forEach(function(prediction) {
            //         var x = prediction.bbox[0];
            //         var y = prediction.bbox[1];
            //         var width = prediction.bbox[2];
            //         var height = prediction.bbox[3];

            //         // Dibujar un cuadro delimitador alrededor del objeto detectado
            //         ctx.strokeStyle = '#00FF00'; // Color verde
            //         ctx.lineWidth = 2;
            //         ctx.strokeRect(x, y, width, height);
            //         ctx.fillStyle = '#00FF00';
            //         ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro

            //         // Agregar evento de clic en el canvas
            //         canvas.addEventListener('click', function(event) {
            //             console.log("Evento de clic en el canvas detectado.");
            //             var rect = canvas.getBoundingClientRect();
            //             var clickX = event.clientX - rect.left;
            //             var clickY = event.clientY - rect.top;

            //             // Verificar si el clic está dentro del cuadro delimitador actual
            //             if (clickX >= x && clickX <= x + width && clickY >= y && clickY <= y + height) {
            //                 // Preguntar al usuario si desea abrir la ventana
            //                 if (window.confirm('¿Quieres abrir la ventana con la dirección URL especificada?')) {
            //                     // Abrir la dirección URL especificada en una nueva ventana
            //                     window.open('http://127.0.0.1:8000/Ejemplares', '_blank');
            //                 }
            //             }
            //         });
            //     });

            //     // Mostrar el canvas en lugar del video
            //     var resultsDiv = document.getElementById('results');
            //     resultsDiv.innerHTML = '';
            //     resultsDiv.appendChild(canvas);
            // }

            // // Iniciar la detección de objetos
            // detectObjects();
            // function detectObjects() {
            //     detector.detect(video)
            //     .then(function(predictions) {
            //         // Filtrar predicciones para mostrar solo personas y vegetación
            //         var allPredictions = predictions;
            //         // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
            //         drawBoundingBoxes(allPredictions);
            //         // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
            //         requestAnimationFrame(detectObjects);
            //     })
            //     .catch(function(error) {
            //         console.error('Error detecting objects:', error);
            //     });
            // }

            // function drawBoundingBoxes(predictions) {
            //     var canvas = document.createElement('canvas');
            //     canvas.width = video.videoWidth;
            //     canvas.height = video.videoHeight;
            //     var ctx = canvas.getContext('2d');

            //     ctx.clearRect(0, 0, canvas.width, canvas.height);
            //     ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //     ctx.font = '16px Arial';

            //     predictions.forEach(function(prediction) {
            //         var x = prediction.bbox[0];
            //         var y = prediction.bbox[1];
            //         var width = prediction.bbox[2];
            //         var height = prediction.bbox[3];

            //         // Dibujar un cuadro delimitador alrededor del objeto detectado
            //         ctx.strokeStyle = '#00FF00'; // Color verde
            //         ctx.lineWidth = 2;
            //         ctx.strokeRect(x, y, width, height);
            //         ctx.fillStyle = '#00FF00';
            //         ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro

            //         // Agregar evento de clic en el canvas
            //         canvas.addEventListener('click', function(event) {
            //             var rect = canvas.getBoundingClientRect();
            //             var clickX = event.clientX - rect.left;
            //             var clickY = event.clientY - rect.top;

            //             // Verificar si el clic está dentro del cuadro delimitador actual
            //             if (clickX >= x && clickX <= x + width && clickY >= y && clickY <= y + height) {
            //                 // Preguntar al usuario si desea abrir la ventana
            //                 if (window.confirm('¿Quieres abrir la ventana con la dirección URL especificada?')) {
            //                     // Abrir la dirección URL especificada en una nueva ventana
            //                     window.open('http://127.0.0.1:8000/Ejemplares', '_blank');
            //                 }
            //             }
            //         });
            //     });

            //     // Mostrar el canvas en lugar del video
            //     var resultsDiv = document.getElementById('results');
            //     resultsDiv.innerHTML = '';
            //     resultsDiv.appendChild(canvas);
            // }
            // function detectObjects() {
            //     detector.detect(video)
            //     .then(function(predictions) {
            //         // Filtrar predicciones para mostrar solo personas y vegetación
            //         var allPredictions = predictions;
            //         // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
            //         drawBoundingBoxes(allPredictions);
            //         // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
            //         requestAnimationFrame(detectObjects);
            //     })
            //     .catch(function(error) {
            //         console.error('Error detecting objects:', error);
            //     });
            // }

            // function drawBoundingBoxes(predictions) {
            //     var canvas = document.createElement('canvas');
            //     canvas.width = video.videoWidth;
            //     canvas.height = video.videoHeight;
            //     var ctx = canvas.getContext('2d');

            //     ctx.clearRect(0, 0, canvas.width, canvas.height);
            //     ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //     ctx.font = '16px Arial';

            //     predictions.forEach(function(prediction) {
            //         var x = prediction.bbox[0];
            //         var y = prediction.bbox[1];
            //         var width = prediction.bbox[2];
            //         var height = prediction.bbox[3];

            //         // Dibujar un cuadro delimitador alrededor del objeto detectado
            //         ctx.strokeStyle = '#00FF00'; // Color verde
            //         ctx.lineWidth = 2;
            //         ctx.strokeRect(x, y, width, height);
            //         ctx.fillStyle = '#00FF00';
            //         ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro

            //         // Agregar evento de clic en el canvas
            //         canvas.addEventListener('click', function(event) {
            //             var rect = canvas.getBoundingClientRect();
            //             var clickX = event.clientX - rect.left;
            //             var clickY = event.clientY - rect.top;

            //             // Verificar si el clic está dentro del cuadro delimitador actual
            //             if (clickX >= x && clickX <= x + width && clickY >= y && clickY <= y + height) {
            //                 // Abrir la dirección URL especificada en una nueva ventana
            //                 window.open('http://127.0.0.1:8000/Ejemplares', '_blank');
            //             }
            //         });
            //     });

            //     // Mostrar el canvas en lugar del video
            //     var resultsDiv = document.getElementById('results');
            //     resultsDiv.innerHTML = '';
            //     resultsDiv.appendChild(canvas);
            // }
            // function detectObjects() {
            //     detector.detect(video)
            //     .then(function(predictions) {
            //         // Filtrar predicciones para mostrar solo personas y vegetación
            //         var allPredictions = predictions;
            //         // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
            //         drawBoundingBoxes(allPredictions);
            //         // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
            //         requestAnimationFrame(detectObjects);
            //     })
            //     .catch(function(error) {
            //         console.error('Error detecting objects:', error);
            //     });
            // }

            // function drawBoundingBoxes(predictions) {
            //     var canvas = document.createElement('canvas');
            //     canvas.width = video.videoWidth;
            //     canvas.height = video.videoHeight;
            //     var ctx = canvas.getContext('2d');

            //     ctx.clearRect(0, 0, canvas.width, canvas.height);
            //     ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //     ctx.font = '16px Arial';

            //     predictions.forEach(function(prediction) {
            //         var x = prediction.bbox[0];
            //         var y = prediction.bbox[1];
            //         var width = prediction.bbox[2];
            //         var height = prediction.bbox[3];

            //         // Dibujar un cuadro delimitador alrededor del objeto detectado
            //         ctx.strokeStyle = '#00FF00'; // Color verde
            //         ctx.lineWidth = 2;
            //         ctx.strokeRect(x, y, width, height);
            //         ctx.fillStyle = '#00FF00';
            //         ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro

            //         // Agregar evento de clic en el canvas
            //         canvas.addEventListener('click', function(event) {
            //             var rect = canvas.getBoundingClientRect();
            //             var clickX = event.clientX - rect.left;
            //             var clickY = event.clientY - rect.top;

            //             // Verificar si el clic está dentro del cuadro delimitador actual
            //             if (clickX >= x && clickX <= x + width && clickY >= y && clickY <= y + height) {
            //                 // Abrir la dirección URL especificada en una nueva ventana
            //                 window.open('http://127.0.0.1:8000/Ejemplares');
            //             }
            //         });
            //     });

            //     // Mostrar el canvas en lugar del video
            //     var resultsDiv = document.getElementById('results');
            //     resultsDiv.innerHTML = '';
            //     resultsDiv.appendChild(canvas);
            // }
            // function detectObjects() {
            //     detector.detect(video)
            //     .then(function(predictions) {
            //         // Filtrar predicciones para mostrar solo personas y vegetación
            //         var allPredictions = predictions;
            //         // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
            //         drawBoundingBoxes(allPredictions);
            //         // var peopleAndVegetationPredictions = predictions.filter(prediction => {
            //         //     return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
            //         // });

            //         // // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
            //         // drawBoundingBoxes(peopleAndVegetationPredictions);

            //         // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
            //         requestAnimationFrame(detectObjects);
            //     })
            //     .catch(function(error) {
            //         console.error('Error detecting objects:', error);
            //     });
            // }

            // function drawBoundingBoxes(predictions) {
            //     var canvas = document.createElement('canvas');
            //     canvas.width = video.videoWidth;
            //     canvas.height = video.videoHeight;
            //     var ctx = canvas.getContext('2d');

            //     ctx.clearRect(0, 0, canvas.width, canvas.height);
            //     ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            //     ctx.font = '16px Arial';

            //     predictions.forEach(function(prediction) {
            //         var x = prediction.bbox[0];
            //         var y = prediction.bbox[1];
            //         var width = prediction.bbox[2];
            //         var height = prediction.bbox[3];

            //         // Dibujar un cuadro delimitador alrededor del objeto detectado
            //         ctx.strokeStyle = '#00FF00'; // Color verde
            //         ctx.lineWidth = 2;
            //         ctx.strokeRect(x, y, width, height);
            //         ctx.fillStyle = '#00FF00';
            //         ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
            //     });

            //     // Mostrar el canvas en lugar del video
            //     var resultsDiv = document.getElementById('results');
            //     resultsDiv.innerHTML = '';
            //     resultsDiv.appendChild(canvas);
            // }

            // takeSnapshotButton.addEventListener('click', function() {
            //     take_snapshot();
            // });

            function take_snapshot(index) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';

                // Definir el id único para la imagen capturada
                var imageId = 'imagen_capturada_' + index;

                console.log("Valor de index antes de enviar la imagen:", index);
                // Enviar la imagen capturada y el índice al escucha en la ventana principal
                console.log("Enviando imagen capturada y índice del cuadro");
                window.opener.postMessage({ image: data_uri, imageId: imageId, index: index }, '*');
                console.log("Se ha enviado imagen capturada y índice del cuadro");
            }

            
            submitButton.addEventListener('click', function() {
                console.log("Enviando mensaje a la ventana principal...");
                // Enviar un mensaje al escucha en la ventana principal
                window.opener.postMessage({ message: "Se ha cerrado la ventana emergente" }, '*');
                console.log("Mensaje enviado a la ventana principal");

                window.close(); // Esto cerrará la ventana emergente
            });

        // });
    </script>
</body>
</html>

<!-- Detection of person and vegetation, webcam up, detection center, image down -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var peopleAndVegetationPredictions = predictions.filter(prediction => {
                        return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    });

                    // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot() {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            }

            submitButton.addEventListener('click', function() {
                var image = $(".image-tag").val();
                var formData = new FormData();
                formData.append("image", image);

                $.ajax({
                    type: "POST",
                    url: "{{ route('webcam.capture') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html> -->

<!-- Detection of person and vegetation, webcam up, detection center, image down -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var peopleAndVegetationPredictions = predictions.filter(prediction => {
                        return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    });

                    // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot() {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';
            }

            submitButton.addEventListener('click', function() {
                var image = $(".image-tag").val();
                var formData = new FormData();
                formData.append("image", image);

                $.ajax({
                    type: "POST",
                    url: "{{ route('webcam.capture') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html> -->

<!-- Detection of person and vegetation, webcam up, detection center, image down -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var allPredictions = predictions;
                    // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
                    drawBoundingBoxes(allPredictions);
                    // var peopleAndVegetationPredictions = predictions.filter(prediction => {
                    //     return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    // });

                    // // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    // drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot() {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';
            }

            submitButton.addEventListener('click', function() {
                var image = $(".image-tag").val();
                var formData = new FormData();
                formData.append("image", image);

                $.ajax({
                    type: "POST",
                    url: "{{ route('webcam.capture') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        // Abre una ventana vacía y luego la cierra
                        var newWindow = window.open('', '_self', '');
                        newWindow.close();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #results { font-size: 14px; padding: 10px; margin: 20px; border: 1px solid; }
        video { width: 100%; max-width: 490px; height: auto; }
        #snapshot { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capture an image from your webcam</h1>
        <button id="request_camera_access">Request Camera Access</button>
        <div id="camera_container" style="display: none;">
            <video id="video" autoplay></video>
            <br/>
            <button id="take_snapshot">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
            <div id="results">Your captured image will appear here...</div>
            <div id="snapshot"></div> 
            <br/>
            <button class="btn btn-primary" id="submit_button" disabled>Submit</button>
        </div>
    </div>

    <script language="JavaScript">
        $(document).ready(function(){
            var video = document.getElementById('video');
            var requestCameraAccessButton = document.getElementById('request_camera_access');
            var cameraContainer = document.getElementById('camera_container');
            var takeSnapshotButton = document.getElementById('take_snapshot');
            var submitButton = document.getElementById('submit_button');
            var detector;

            requestCameraAccessButton.addEventListener('click', function() {
                requestCameraAccess();
            });

            function requestCameraAccess() {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    cameraContainer.style.display = 'block';
                    requestCameraAccessButton.style.display = 'none';
                    submitButton.disabled = false;

                    // Cargar el modelo preentrenado COCO-SSD
                    cocoSsd.load()
                    .then(function(model) {
                        detector = model;
                        detectObjects();
                    })
                    .catch(function(error) {
                        console.error('Error loading COCO-SSD model:', error);
                    });
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
            }

            function detectObjects() {
                detector.detect(video)
                .then(function(predictions) {
                    // Filtrar predicciones para mostrar solo personas y vegetación
                    var allPredictions = predictions;
                    // Dibujar cuadros delimitadores alrededor de todas las clases detectadas
                    drawBoundingBoxes(allPredictions);
                    // var peopleAndVegetationPredictions = predictions.filter(prediction => {
                    //     return prediction.class === 'person' || prediction.class === 'tree' || prediction.class === 'plant';
                    // });

                    // // Dibujar cuadros delimitadores alrededor de las personas y vegetación detectadas
                    // drawBoundingBoxes(peopleAndVegetationPredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');

                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor del objeto detectado
                    ctx.strokeStyle = '#00FF00'; // Color verde
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5); // Etiqueta de clase sobre el cuadro
                });

                // Mostrar el canvas en lugar del video
                var resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(canvas);
            }

            takeSnapshotButton.addEventListener('click', function() {
                take_snapshot();
            });

            function take_snapshot() {
                var canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                var data_uri = canvas.toDataURL('image/jpeg');
                $(".image-tag").val(data_uri);
                
                // Mostrar la foto capturada debajo del cuadro de detección de objetos
                var snapshotDiv = document.getElementById('snapshot');
                snapshotDiv.innerHTML = '<img src="'+data_uri+'"/>';

                // Enviar la imagen capturada al escucha en la ventana principal
                window.opener.postMessage({ image: data_uri, imageId: 'imagen_capturada' }, '*');
            }

            
                // Coloca aquí tu código JavaScript que interactúa con elementos del DOM
                submitButton.addEventListener('click', function() {
                    // Código para hacer lo que sea necesario antes de cerrar la ventana emergente

                    // Enviar un mensaje al escucha en la ventana principal
                    window.opener.postMessage({ message: "Se ha cerrado la ventana emergente" }, '*');

                    window.close(); // Esto cerrará la ventana emergente
                });

        });
    </script>
</body>
</html> -->