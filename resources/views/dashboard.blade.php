<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Inicio') }}
        </h2>
    </x-slot>
    <div class="banner">
        <div class="banner-inner">
            <img src="Images/Amanecer.png" alt="Escudo Equipo">
            <img src="Images/Barrio obrero.png" alt="Escudo Equipo">
            <img src="Images/Bella Vista.png" alt="Escudo Equipo">
            <img src="Images/Boca de sacra.png" alt="Escudo Equipo">
            <img src="Images/Bohemios.png" alt="Escudo Equipo">
            <img src="Images/Boston.png" alt="Escudo Equipo">
            <img src="Images/Casa Blanca.png" alt="Escudo Equipo">
            <img src="Images/Centenario.png" alt="Escudo Equipo">
            <img src="Images/Charrua.png" alt="Escudo Equipo">
            <img src="Images/Deportivo America.png" alt="Escudo Equipo">
            <img src="Images/Esperanza.png" alt="Escudo Equipo">
            <img src="Images/Estudiantil.png" alt="Escudo Equipo">
            <img src="Images/Guaviyú.png" alt="Escudo Equipo">
            <img src="Images/Huracan.png" alt="Escudo Equipo">
            <img src="Images/Independencia.png" alt="Escudo Equipo">
            <img src="Images/Independiente.png" alt="Escudo Equipo">
            <img src="Images/Juventud Unida.png" alt="Escudo Equipo">
            <img src="Images/Litoral.png" alt="Escudo Equipo">
            <img src="Images/Los Sauces.png" alt="Escudo Equipo">
            <img src="Images/Nuevo Paysandú.png" alt="Escudo Equipo">
            <img src="Images/Olímpico.png" alt="Escudo Equipo">
            <img src="Images/Piedras Coloradas.png" alt="Escudo Equipo">
            <img src="Images/Progreso.png" alt="Escudo Equipo">
            <img src="Images/Queguay.png" alt="Escudo Equipo">
            <img src="Images/Racing.png" alt="Escudo Equipo">
            <img src="Images/Rampla.png" alt="Escudo Equipo">
            <img src="Images/San Felix.png" alt="Escudo Equipo">
            <img src="Images/Sud América.png" alt="Escudo Equipo">
            <img src="Images/Vialidad.png" alt="Escudo Equipo">
            <img src="Images/Wanderers.png" alt="Escudo Equipo">
        </div>
    </div>

    <section id="clubes" class="seccionesDashboard mb-5 mt-2">
        <div class="sectionDiv">
            <div>
                <h2>Clubes</h2>
            </div>
            <div class="sectionDescriptions">
                <h2>¡Echa un vistazo a todos los clubes afiliados existentes en el futbol de la
                    Region!</h2>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section id="idolos" class="seccionesDashboard mb-5 mt-2">
        <div class="sectionDiv">
            <div>
                <h2>Ídolos</h2>
            </div>
            <div class="sectionDescriptions">
                <h2>Les presentamos los máximos ídolos y más
                    reconocidos futbolistas del fútbol de
                    Paysandú, arriba vemos a Carlos "Loncho" Barreto, ídolo máximo de Paysandú en el siglo XX.</h2>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section id="palmarés" class="seccionesDashboard mb-5 mt-2">
        <div class="sectionDiv">
            <div>
                <h2>Palmarés</h2>
            </div>
            <div class="sectionDescriptions">
                <h2>Aquí les mostraremos el gran éxito en títulos de la selección sanducera.</h2>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section id="interiorSanducero" class="seccionesDashboard mb-5 mt-2">
        <div class="sectionDiv">
            <div>
                <h2>El Interior Sanducero</h2>
            </div>
            <div class="sectionDescriptions">
                <h2>También serán testigos de los campeonatos e Ídolos, que han dicho presente en
                    el
                    interior mismo del departamento a lo largo de la historia. Aquí vemos al "Pitufo" José
                    Alzugaray,
                    exjugador profesional naciente en Quebracho</h2>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section id="ejemplosJugadaoresHistoricos" class="seccionesDashboard mb-5 mt-2">
        <h2 style="color: gold">Históricos</h2>
        <div class="divCartas">
            <div class="card">
                <div class="card2">
                    <img src="Images/alzugaray.webp" class="imagenCartaJugador" alt="Jugador">
                </div>
                <span>"Pitufo" José Alzugaray</span>
            </div>
            <div class="card">
                <div class="card2">
                    <img src="Images/collares.jpg" class="imagenCartaJugador" alt="Jugador">
                </div>
                <span>Luis Alfredo Collares (Negro)</span>
            </div>
            <div class="card">
                <div class="card2">
                    <img src="Images/colita-merentiel.webp" class="imagenCartaJugador" alt="Jugador">
                </div>
                <span>Julio “Colita” Merentiel</span>
            </div>
        </div>
    </section>
    @auth
        @role('admin_Liga')
        @endrole
    @endauth
</x-app-layout>
