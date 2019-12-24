<?php
require_once 'app.php';

function displayMovies() {
	$movies = Movie::getAll();
	
	echo '<div class="movie-list">';
		foreach ($movies as $movie) {
			include 'Views/movie.php';
		}
	echo '</div>';
}