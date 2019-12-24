<div class="movie-card">
	<img src="<?php echo $movie['photo'] ?>" alt="">
	<p><?php echo $movie['title'] ?></p>
	<p><?php echo $movie['start_date'] ?> <?php echo $movie['name'] ?></p>
	<a href="order.php?movie_id=<?php echo $movie['movie_id'] ?>">tickets bestellen</a>
</div>