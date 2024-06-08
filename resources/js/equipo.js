window.borrarImagenEscudo = function(id) {
    const inputEscudo = document.getElementById('imgEscudo');
    if (document.getElementById(id).name == "NOborrarImgEscudo") { //Escudo img empieza con name="NOborrarImgEscudo" para NO borrar
        document.getElementById(id).name = "BORRARimgEscudo";
        inputEscudo.disabled = true; //Deshabilita el input 
    } else {
        document.getElementById(id).name = "NOborrarImgEscudo";
        inputEscudo.disabled = false;  //Habilita input
    }
}

window.borrarImagenCancha = function(id) {
    const inputCancha = document.getElementById('imgCancha');
    if (document.getElementById(id).name == "NOborrarImgCancha") { //Cancha img empieza con name="NOborrarImgCancha" para NO borrar
        document.getElementById(id).name = "BORRARimgCancha";
        inputCancha.disabled = true; //Deshabilita el input
    } else {
        document.getElementById(id).name = "NOborrarImgCancha";
        inputCancha.disabled = false;  //Habilita input
    }
}