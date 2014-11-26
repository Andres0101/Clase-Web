function init() {
    var canvas = document.getElementById("graphCanvas");
    var context = canvas.getContext("2d");
    
    context.lineWidth = 0;
}

function allowDrop(ev) { // Función que permite el evento drop
    ev.preventDefault();
}

function drag(ev) { // Función que permite arrastrar los elementos draggable
    ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("Text"); // Variable que es igual al id del elemento soltado

    if(data == "img1"){ // Si es igual entonces...
        $("#type").val('3'); // Setea la variable del input a 3
    }
    if(data == "img2"){ // Si es igual entonces...
        $("#type").val('1'); // Setea la variable del input a 1
    }
    if(data == "img3"){ // Si es igual entonces...
        $("#type").val('2'); // Setea la variable del input a 2
    }

    // Se crea una "background" al canvas para evitar que las imagenes arrastradas se muestren se queden en el canvas
    document.getElementById("graphCanvas").getContext("2d").fillStyle="#f1f1f1";
    document.getElementById("graphCanvas").getContext("2d").fillRect(0, 0, 150, 150);

	document.getElementById("graphCanvas").getContext("2d").drawImage(document.getElementById(data), 53, 47); // Dibuja la imagen
}