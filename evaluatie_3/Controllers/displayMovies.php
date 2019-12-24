<?php
require_once 'app.php';

// GEBRUIK DEZE FUNCTIES OM DATA OP TE HALEN EN TE VERWERKEN OM VISUEEL DOOR TE GEVEN.
// IN DE CONTROLLER WORDEN ALLE GEGEVENS OOK GECONTROLLEERD ALVORENS ZE WORDEN DOORGEGEVEN AAN DE MODEL
function display() {
	// VOORBEELD
	$movies = Movie::getAll();
	
	echo '<div class="movie-list">';
		foreach ($movies as $movie) {
			include 'Views/view.php';
		}
	echo '</div>';
}