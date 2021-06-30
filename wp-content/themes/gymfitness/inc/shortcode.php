<?php 

function gymfitness_insert_map() {
	$ubicacion = get_field('ubicacion');
?>

	<div class="ubicacion">
		<input type="hidden" id="lat" value="<?php echo $ubicacion['lat'];?>"/>
		<input type="hidden" id="lng" value="<?php echo $ubicacion['lng'];?>"/>
		<input type="hidden" id="address" value="<?php echo $ubicacion['address'];?>"/>
		<div id="mapa">
		</div>
	</div>

<?php
}
add_shortcode( 'leaflet_map', 'gymfitness_insert_map' );

?>
