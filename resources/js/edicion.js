window.quitarEquipoEdicion = async function(idEquipo, idEdicion) {
    const url = `/ediciones/${idEdicion}`;
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            idEquipo: idEquipo
        })
    })
    .then(response => response.json())
    .then(data => {
         if (data.success) {
            location.reload();
         } else {
            alert('Error al eliminar equipo.')
         }
     })
     .catch(error => {
         console.error('Error:', error);
     });
}