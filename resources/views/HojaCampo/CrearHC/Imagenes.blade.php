<div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
    <div class="col mb-4" v-for="(a, index) in archivos">
        <div class="card w-100 ">
            <h5 class="card-title text-center">@{{a.parteP}}</h5>
            <div class="card-body">
                <img class="card-img-top " v-if="a.imagen!=''" :id="a.nombre" :src="a.imagen" alt="Card image cap">
            </div>

            <div class="card-footer pl-5">
                <small class="text-muted">
                    <input type="file" accept="image/png,image/jpeg"  :id="'fileImg'+index" :name="'fileImg'+index" class="inp"
                        @change="cargarImagen($event,index)" />
                </small>
           
            </div>
        </div>
    </div>
</div>
<div class="alert alert-warning text-right" role="alert">
    <b>
        La previsualización de las imagenes no representa la calidad real de las mismas.*
    </b>
</div>




