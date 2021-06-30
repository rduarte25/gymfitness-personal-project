jQuery(document).ready(function($) {
	$('.site-header .menu-principal .menu').slicknav({
		label:'',
		appendTo:'.site-header',
	});

	//Agregando bxslider.

	if ($('.listado-testimoniales').length > 0) {
		$('.listado-testimoniales').bxSlider({
			auto:true,
			mode:'fade',
			controls:false,
		});
	}
	


	const lat = $('#lat').val();
	const lng = $('#lng').val();
	const address = $('#address').val();

	if (lat && lng && address) {
		var map = L.map('mapa').setView([lat, lng], 15);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker([lat, lng]).addTo(map)
		    .bindPopup(address)
		    .openPopup();
		}



	

});


/** Agregar posicioón fija en el header al hacer scroll **/

window.onscroll = () => {
	const scroll = window.scrollY;
	const headerNav = document.querySelector('.barra-navegacion');
	const documentBody = document.querySelector('body');


	if (scroll > 300) {
		headerNav.classList.add('fixed-top');
		documentBody.classList.add('ft-activo');
	} else {
		documentBody.classList.remove('ft-activo');
		headerNav.classList.remove('fixed-top');		
	}
}