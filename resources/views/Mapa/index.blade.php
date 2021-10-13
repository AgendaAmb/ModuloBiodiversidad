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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAp2D_woF_DvIpYQrystCSSSjko70ezw&libraries=places">
</script>
<script>
    var app = new Vue({
      el: '#fondo',
      data: {
        message: 'Hola Vue!',
        prospectos:[]
      },
      methods: {
        CargarDatos:function(){
            @foreach($Planta as $P)
                this.prospectos.push({
                    "id":'{{$P->id}}',
                    "Latitud":'{{$P->SituacionEntorno->Latitud}}',
                    "Altitud":'{{$P->SituacionEntorno->Altitud}}',
                    "NombreComun":'{{$P->NombreEjem->NombreComun}}',
                    "NombreCien":'{{$P->NombreEjem->NombreCientifico}}',
                    "Diametro":'{{$P->Morfologia->DiametroCopa}}'
                });
            @endforeach
        },
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
                
    
                t.prospectos.map((n) => {
                const contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h1 class="NombreComun">' + n.NombreComun+'</h1>'+
                    '<div id="bodyContent" class="NombreCienMap">' +n.NombreCien+
                    "</div>" +
                    "</div>";
                    const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                   
                    });
                    myLatlng = new google.maps.LatLng(parseFloat(n.Latitud), parseFloat(n.Altitud));
                    marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: n.NombreComun
                    });
                    const cityCircle = new google.maps.Circle({
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.35,
                        map,
                        center: myLatlng,
                        radius: Math.sqrt(n.Diametro/2)*10,

                    });
                    map.addListener("center_changed", () => {
                    // 3 seconds after the center of the map has changed, pan back to the
                    // marker.
                        window.setTimeout(() => {
                        map.panTo(marker.getPosition());
                        }, 3000);
                    });
                    marker.addListener("click", () => {
                        map.setZoom(15);
                        map.setCenter(marker.getPosition());
                        infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false,
                    });
                });
            });   
        }
      },
      mounted:
  function() {
    this.$nextTick(
        function () {
            this.CargarDatos();
            this.CargarMapa();
    })
      
  },
      
    })
</script>
@endpush

@endsection