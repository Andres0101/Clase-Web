jQuery(document).ready(function() {

	// Cuando el documento está vacio muestra el mapa
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 13,
		center: new google.maps.LatLng(3.38212, -76.53046),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	// Al hacer mouseover sobre el div entonces...
	$(".flip").mouseover(function(){
	    $(".opciones").slideDown("slow"); // Hace un slideDown del div opciones
	    document.getElementById("arrow").src = "img/up.png"; // Cambia la imagen de la flecha
	    $(".arrow").css("cursor", "hand"); // Cambia el puntero a la mano
  	});

  	// Al hacer click sobre el div entonces...
  	$(".flip").click(function(){
	    $(".opciones").slideUp("slow"); // Hace un slideUp del div opciones
	    document.getElementById("arrow").src = "img/down.png"; // Cambia la imagen de la flecha
  	});

	// Al hacer drop entonces...
	$(document).on('drop', function(e) {
		e.preventDefault();
		var tipo = $("#type").val(); // Se crea una variable con el valor dado en el evento drop del js
		console.log(tipo);

		$.ajax({
			type: "POST",
			url: "api/sitios.php",
			data: {tipo: tipo}
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){ // Al ejecutarse el ajax correctamente entonces...
			var locations = JSON.parse(result); // Se crea una variable con las localizaciones del php ($list)

			// Se visualiza el mapa
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 13,
				center: new google.maps.LatLng(3.38212, -76.53046),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var infowindow = new google.maps.InfoWindow();

			var marker, i;

			// Recorre la variable...
			for (i = 0; i < locations.length; i++) {
				marker = new google.maps.Marker({ // Se crean los marcadores en el mapa dependiendo del elemento arrastrado en el canvas
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
				});

				// Al hacer click en un marcador...
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						// Se hace visible el nombre del lugar por medio de una pequeña ventana de información
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}	
		}).error(function(error){
			console.log("Error: " + error);
		})
	})

});