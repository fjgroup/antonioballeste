<!-- Class Timetable Start -->
<div class="container py-5 gym-feature">
    <div class="mb-5 text-center d-flex flex-column">
        <!-- <h4 class="text-primary font-weight-bold">Class Timetable</h4> -->
        <h4 class="display-4 font-weight-bold">Próximas Formaciones y Encuentros Académicos</h4>
    </div>
    <div class="tab-class">
        <div class="tab-content">
            <div id="class-all" class="container p-0 tab-pane active">
                <div class="table-responsive">
                    <div id="formations-container" style="min-height: 300px; background: #000; padding: 20px;">
                        <div style="text-align:center; color:white; padding:40px;">
                            <i class="fa fa-circle-notch fa-spin fa-2x"></i> <br><br> Cargando calendario de formaciones...
                        </div>
                    </div>
                    <!-- 
                        Al estar en el mismo dominio, podemos usar ruta relativa o helper url().
                        El widget buscará autmáticamente si no se le pasa data-url, 
                        o podemos forzarlo a la ruta de API local.
                    -->
                    <script 
                        src="{{ asset('js/widget-formations.js') }}?v=2" 
                        data-url="{{ url('/api/trainings') }}">
                    </script>
                </div>
            </div>      
        </div>
    </div>
</div>
<!-- Class Timetable Start -->


<!-- Gym Class Start -->
<div class="container mb-5 gym-class" style="margin-top: 90px;">
    <div class="px-3 row">
        <div class="p-0 col-md-6">
            <div class="px-5 py-5 text-right text-white gym-class-box d-flex flex-column align-items-end justify-content-center bg-primary">
                <i class="flaticon-six-pack"></i>
                <h3 class="mb-3 text-white display-4 font-weight-bold">Escuela Europea de Medicina Ortopédica</h3>
                <p>
                    Una de las más reconocidas escuelas de razonamiento clínico creada por James Cyriax, uno de los tres principales exponentes a nivel mundial de la medicina ortopédica, pone a disposición su post grado internacional.
                </p>
                <!-- <a href="" class="px-4 mt-4 btn btn-lg btn-outline-light">Join Now</a> -->

            </div>
        </div>
        <div class="p-0 col-md-6">
            <div class="px-5 py-5 text-left text-white gym-class-box d-flex flex-column align-items-start justify-content-center bg-secondary">
                <i class="flaticon-bodybuilding"></i>
                <h3 class="mb-3 text-white display-4 font-weight-bold">Sport Development</h3>
                <p>
                    conoce nuestros programas de entrenamiento y se parte además de nuestra filosofía en formaciones académicas.
                </p>
                <!--  <a href="" class="px-4 mt-4 btn btn-lg btn-outline-light">Join Now</a> -->

            </div>
        </div>
    </div>
</div>
<!-- Gym Class End -->
