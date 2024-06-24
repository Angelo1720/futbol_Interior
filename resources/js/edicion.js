window.quitarEquipoEdicion = function(idEquipo, idEdicion, index) {
    const url = '/ediciones/${idEdicion}';
    const spanElement = document.getElementById(index);
    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            idEquipo: idEquipo
        })
    })
    .then(response => response.json())
    .then(data => {
         if (data.success) {
            spanElement.remove();
         } else {
            alert('Error al eliminar equipo.')
         }
     })
     .catch(error => {
         console.error('Error:', error);
     });
}