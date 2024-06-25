window.borrarImagenJHistorico = function(id) {
    const inputPortada = document.getElementById('imgJugador');
    if (document.getElementById(id).name == "NOborrarImgPortada") { //Escudo img empieza con name="NOborrarImgEscudo" para NO borrar
        document.getElementById(id).name = "BORRARimgPortada";
        inputPortada.disabled = true; //Deshabilita el input 
    } else {
        document.getElementById(id).name = "NOborrarImgPortada";
        inputPortada.disabled = false;  //Habilita input
    }
}