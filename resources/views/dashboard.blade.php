<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Inicio') }}
        </h2>
    </x-slot>
    <div class="banner">
        <div class="banner-inner">
            <img src="Images/Amanecer.png" alt="Escudo Equipo">
            <img src="Images/Barrio_obrero.png" alt="Escudo Equipo">
            <img src="Images/Bella_Vista.png" alt="Escudo Equipo">
            <img src="Images/Boca_de_sacra.png" alt="Escudo Equipo">
            <img src="Images/Bohemios.png" alt="Escudo Equipo">
            <img src="Images/Boston.png" alt="Escudo Equipo">
            <img src="Images/Casa_Blanca.png" alt="Escudo Equipo">
            <img src="Images/Centenario.png" alt="Escudo Equipo">
            <img src="Images/Charrua.png" alt="Escudo Equipo">
            <img src="Images/Deportivo_America.png" alt="Escudo Equipo">
            <img src="Images/Esperanza.png" alt="Escudo Equipo">
            <img src="Images/Estudiantil.png" alt="Escudo Equipo">
            <img src="Images/Guaviyu.png" alt="Escudo Equipo">
            <img src="Images/Huracan.png" alt="Escudo Equipo">
            <img src="Images/Independencia.png" alt="Escudo Equipo">
            <img src="Images/Independiente.png" alt="Escudo Equipo">
            <img src="Images/Juventud_Unida.png" alt="Escudo Equipo">
            <img src="Images/Litoral.png" alt="Escudo Equipo">
            <img src="Images/Los_Sauces.png" alt="Escudo Equipo">
            <img src="Images/Nuevo_Paysandu.png" alt="Escudo Equipo">
            <img src="Images/Olimpico.png" alt="Escudo Equipo">
            <img src="Images/Piedras_Coloradas.png" alt="Escudo Equipo">
            <img src="Images/Progreso.png" alt="Escudo Equipo">
            <img src="Images/Queguay.png" alt="Escudo Equipo">
            <img src="Images/Racing.png" alt="Escudo Equipo">
            <img src="Images/Rampla.png" alt="Escudo Equipo">
            <img src="Images/San_Felix.png" alt="Escudo Equipo">
            <img src="Images/Sud_America.png" alt="Escudo Equipo">
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
                <h2>¡Echa un vistazo a todos los clubes afiliados existentes en el fútbol de la
                    Región!</h2>
                <a href="{{route('equipos.guest')}}"  class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section hidden id="idolos" class="seccionesDashboard mb-5 mt-2">
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
    <section id="palmares" class="seccionesDashboard mb-5 mt-2">
        <div class="background-image"></div>
            <div class="content">
                <div class="sectionDiv">
                <h2>Palmarés</h2>
                <div class="sectionDescriptions">
                    <h2>Aquí encontrarán el gran éxito en títulos de la selección sanducera.</h2>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </section>
    <section id="interiorSanducero" class="seccionesDashboard mb-5 mt-2">
        <div class="sectionDiv">
            <div>
                <h2>El Interior Sanducero</h2>
            </div>
            <div class="sectionDescriptions">
                <h2>También serán testigos de los campeonatos y momentos que han dicho presente en el
                    interior del departamento a lo largo de la historia.
                </h2>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </section>
    <section id="ejemplosJugadaoresHistoricos" class="seccionesDashboard mb-5 mt-2">
        <h2 style="color: gold" class="d-flex justify-content-center pb-2 fw-bold">Jugadores Históricos</h2>
        <div class="divCartas">
            <div class="cartaLegendaria">
                <div class="card2">
                    <img src="Images/alzugaray.png" class="imagenCartaJugador" alt="Jugador">
                </div>
                <span>"Pitufo" José Alzugaray</span>
            </div>
            <div class="cartaLegendaria">
                <div class="card2">
                    <img src="Images/collares.jpg" class="imagenCartaJugador" alt="Jugador">
                </div>
                <span>Luis Alfredo Collares</span>
            </div>
            <div class="cartaLegendaria">
                <div class="card2">
                    <img src="Images/colita-merentiel.png" class="imagenCartaJugador" alt="Jugador">
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
