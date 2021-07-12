@extends('Parciales.carouselindex')

@section('contenido')

<div class="container-fluid ml-1 mr-1 pt-5 " id="fondo">
    <div
        class="row justify-content-xl-end justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-center mr-xl-3">
        <p><a href="{{route('Bio')}}" class="text-white text-decoration-none" id="txtBio">BIODIVERSIDAD</a></p>
    </div>
    <div class="row justify-content-center mt-5 mb-lg-4 mb-md-4 mb-sm-4 mb-3">
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" id="btnEsp" href="#" role="button">Especies</a>
        <a class="btn btn-light btn-lg mr-2 mb-2 btnBio" id="btnEsp" href="#" role="button">Contacto</a>

    </div>

    
        <div id="dvMap" style="width: 100%; height: 400px;margin-bottom: 50px;"></div>


    


</div>


</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy5kHqFi0_c44jWFWEmQhq5IVYEScngn8&libraries=places"></script>
<script>
    var app = new Vue({
      el: '#fondo',
      data: {
        message: 'Hola Vue!'
      },
      methods: {
        CargarMapa:function () {
            let t = this;
                mapOptions = {
                    center: new google.maps.LatLng(parseFloat('22.1455389'), parseFloat('-101.0139005')),
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                var myLatlng = null;
                var marker = null;
                /*
                t.prospectos.map((n) => {
                    myLatlng = new google.maps.LatLng(parseFloat(n.lat), parseFloat(n.long));
                    marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: n.name,
                        icon: '/layout/images/pin.png'
                    });
                });
                */
        }
      },
      mounted:
  function() {
    this.$nextTick(
        function () {
            this.CargarMapa();
    })
      
  },
      
    })
    </script>
@endpush

@endsection