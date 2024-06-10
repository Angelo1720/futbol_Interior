window.clearInput = function(inputId) {
    const inputFocus = document.getElementById(inputId);
    inputFocus.value = '';
    if (inputId == 'nomEquipoLocal') {
        document.getElementById('alineacionLOCAL').innerHTML = '';
        document.getElementById('suplentesLOCAL').innerHTML = '';
    } else {
        document.getElementById('alineacionVISITANTE').innerHTML = '';
        document.getElementById('suplentesVISITANTE').innerHTML = '';
    }
}

window.checkInput = function(id) {
    const inputTyped = document.getElementById(id);

    const inputLocal = document.getElementById('nomEquipoLocal');
    const inputVisitante = document.getElementById('nomEquipoVisitante');
    if (inputVisitante.value == inputLocal.value) {
        inputTyped.value = '';
    }
}


window.cargarSelect = function(inputId) {
    const dataContainer = document.getElementById('data-container');
    const equiposJugadores = JSON.parse(dataContainer.getAttribute('data-equipos-jugadores'));
    const equipo = document.getElementById(inputId).value;
    const select = inputId == 'nomEquipoLocal' ? document.getElementById('alineacionLOCAL') : document
        .getElementById('alineacionVISITANTE');
    const selectSuplentes = inputId == 'nomEquipoLocal' ? document.getElementById('suplentesLOCAL') : document
        .getElementById('suplentesVISITANTE');
    // Limpiar las opciones anteriores
    select.innerHTML = '';
    selectSuplentes.innerHTML = '';

    if (equiposJugadores[equipo]) {
        const jugadores = equiposJugadores[equipo];

        for (const [posicion, nombres] of Object.entries(jugadores)) {
            const optgroupAlign = document.createElement('optgroup');
            const optgroupSuplies = document.createElement('optgroup');
            optgroupAlign.label = posicion;
            optgroupSuplies.label = posicion;

            nombres.forEach(nombre => {
                const optionAlign = document.createElement('option');
                const optionSuplies = document.createElement('option');
                optionAlign.value = nombre;
                optionAlign.textContent = nombre;
                optionAlign.setAttribute("data-position", posicion);
                optgroupAlign.appendChild(optionAlign);

                optionSuplies.value = nombre;
                optionSuplies.textContent = nombre;
                optionSuplies.setAttribute("data-position", posicion);
                optgroupSuplies.appendChild(optionSuplies);
            });

            select.appendChild(optgroupAlign);
            selectSuplentes.appendChild(optgroupSuplies);
        }
    }
}

window.prepareFormData = function() {
    const alineacionLocal = document.getElementById('alineacionLOCAL');
    const suplentesLocal = document.getElementById('suplentesLOCAL');
    const alineacionVisitante = document.getElementById('alineacionVISITANTE');
    const suplentesVisitante = document.getElementById('suplentesVISITANTE');

    const dataEquipoLocal = {
        alineacion: Array.from(alineacionLocal.options)
                    .filter(option => option.selected)
                    .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') })),
                    suplentes: Array.from(suplentesLocal.options)
                    .filter(option => option.selected)
                    .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') }))
    };

    const dataEquipoVisitante = {
        alineacion: Array.from(alineacionVisitante.options)
                        .filter(option => option.selected)
                        .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') })),
        suplentes: Array.from(suplentesVisitante.options)
                        .filter(option => option.selected)
                        .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') }))
    };
    document.getElementById('dataEquipoLocal').value = JSON.stringify(dataEquipoLocal);
    document.getElementById('dataEquipoVisitante').value = JSON.stringify(dataEquipoVisitante);
}