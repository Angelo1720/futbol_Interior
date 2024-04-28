<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @auth
        @role('admin_Liga')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __('Eres un administrador de Liga!') }}
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat in eum laborum commodi corrupti at
                            earum repudiandae omnis quae similique, alias laudantium et aspernatur minima molestiae neque itaque
                            quam possimus?</p>
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
                        </div>
                    </div>
                </div>
            </div>
        @endrole
    @endauth
</x-app-layout>
