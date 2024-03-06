<!-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Webcam Capture</title>
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
                })
                .catch(function(err) {
                    console.error('Error accessing webcam:', err);
                });
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
                    // Filtrar predicciones para mostrar solo las personas
                    var peoplePredictions = predictions.filter(prediction => prediction.class === 'person');
                    
                    // Dibujar cuadros delimitadores alrededor de las personas detectadas
                    drawBoundingBoxes(peoplePredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var ctx = video.getContext('2d');
                ctx.clearRect(0, 0, video.width, video.height);
                ctx.drawImage(video, 0, 0, video.width, video.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor de la persona detectada
                    ctx.strokeStyle = '#00FF00';
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5);
                });
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
                    // Filtrar predicciones para mostrar solo las personas
                    var peoplePredictions = predictions.filter(prediction => prediction.class === 'person');
                    
                    // Dibujar cuadros delimitadores alrededor de las personas detectadas
                    drawBoundingBoxes(peoplePredictions);

                    // Llamar de nuevo a la función detectObjects() para detectar objetos continuamente
                    requestAnimationFrame(detectObjects);
                })
                .catch(function(error) {
                    console.error('Error detecting objects:', error);
                });
            }

            function drawBoundingBoxes(predictions) {
                var ctx = video.getContext('2d');
                ctx.clearRect(0, 0, video.width, video.height);
                ctx.drawImage(video, 0, 0, video.width, video.height);
                ctx.font = '16px Arial';

                predictions.forEach(function(prediction) {
                    var x = prediction.bbox[0];
                    var y = prediction.bbox[1];
                    var width = prediction.bbox[2];
                    var height = prediction.bbox[3];

                    // Dibujar un cuadro delimitador alrededor de la persona detectada
                    ctx.strokeStyle = '#00FF00';
                    ctx.lineWidth = 2;
                    ctx.strokeRect(x, y, width, height);
                    ctx.fillStyle = '#00FF00';
                    ctx.fillText(prediction.class, x, y - 5);
                });
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
</html>