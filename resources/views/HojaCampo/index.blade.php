<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')
</head>

<body>
    <div class="container-fluid justify-content-between mt-5 p-5">
        <h2 class="text-center alert alert-dark">Hoja de campo</h2>
        <form method="POST" action="{{route('GHC')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" id="imagen1" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" id="imagen2" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" id="imagen2" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" id="imagen2" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" id="imagen2" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" id="imagen2" src=" " alt="Card image cap">
                    <div class="card-body">
                        <input type="file" id="fileImg" onchange=readImage(this) />
                    </div>
                </div>
            </div>
            @include('HojaCampo.DGenerales')
            @include('HojaCampo.ReconocimientoE')

            <div class=" d-flex justify-content-xl-end mb-2">
                <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    function readImage (input) {
      
     
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          
           
          $('#imagen2').attr('src', e.target.result); // Renderizamos la imagen
      }
      const div = document.querySelector('#imagen2');

// Apply style to div
    div.setAttribute('style', 'visibility: visible');
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>