document.addEventListener('DOMContentLoaded', function(){
    new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto', // Mostrar el número máximo de diapositivas posibles por vista
        spaceBetween: 10, // Espacio entre diapositivas
        navigation: {
            nextEl: '.swiper-button-next', // Selector para el botón de siguiente
            prevEl: '.swiper-button-prev', // Selector para el botón de anterior
        },
        breakpoints: {
            // Configuración para pantallas más pequeñas
            768: {
                slidesPerView: 3, // Mostrar 3 diapositivas por vista
                spaceBetween: 20 // Incrementa el espacio entre diapositivas
            },
            // Configuración para pantallas medianas
            992: {
                slidesPerView: 4, // Mostrar 4 diapositivas por vista
                spaceBetween: 30 // Incrementa aún más el espacio entre diapositivas
            },
            // Configuración para pantallas grandes
            1200: {
                slidesPerView: 5, // Mostrar 5 diapositivas por vista
                spaceBetween: 40 // Incrementa más el espacio entre diapositivas
            }
        }
    });
});
