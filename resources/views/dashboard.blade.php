<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>
    <div class="swiper-container">
        <div class="swiper-wrapper d-flex align-items-center">
            <div class="swiper-slide"><img src="Images/18 de Julio.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Amanecer.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Barrio obrero.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Bella Vista.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Boca de sacra.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Bohemios.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Boston.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Casa Blanca.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Centenario.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Charrua.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Deportivo America.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Esperanza.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Estudiantil.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Guaviyú.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Huracan.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Independencia.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Independiente.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Juventud Unida.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Litoral.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Los Sauces.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Nuevo Paysandú.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Olímpico.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Piedras Coloradas.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Progreso.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Queguay.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Racing.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Rampla.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/San Felix.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Sud América.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Vialidad.png" alt="Escudo Equipo"></div>
            <div class="swiper-slide"><img src="Images/Wanderers.png" alt="Escudo Equipo"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div id="accesosDirectos" class="p-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-3">
            <div class="card m-5" style="width: 18rem;">
                <img src="/Images/Escudos.webp" class="card-img-top w-70 p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Clubes</h5>
                    <p class="card-text">¡Echa un vistazo a todos los clubes afiliados existentes en el futbol de la
                        Region!</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
            <div class="card m-5" style="width: 18rem;">
                <img src="/Images/Barreto.PNG" class="card-img-top w-70 p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ídolos</h5>
                    <p class="card-text">Les presentamos los máximos ídolos y más reconocidos futbolistas del fútbol de
                        Paysandú, arriba vemos a Carlos "Loncho" Barreto, ídolo máximo de Paysandú en el siglo XX</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
            <div class="card m-5" style="width: 18rem;">
                <img src="/Images/Luca Giossa.PNG" class="card-img-top w-70 p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Palmarés</h5>
                    <p class="card-text">Aquí les mostraremos el gran éxito en títulos de la selección sanducera.</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
            <div class="card m-5" style="width: 18rem;">
                <img src="/Images/alzugaray.webp" class="card-img-top w-70 p-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">El Interior Sanducero</h5>
                    <p class="card-text">También serán testigos de los campeonatos e Ídolos, que han dicho presente en
                        el
                        interior mismo del departamento a lo largo de la historia. Aquí vemos al "Pitufo" José
                        Alzugaray,
                        exjugador profesional naciente en Quebracho</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    @auth
        @role('admin_Liga')
        @endrole
    @endauth
</x-app-layout>
