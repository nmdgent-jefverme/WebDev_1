<?php

class Movie {

	public static function getAll($id = 0) {
		global $db;
		if($id > 0) {
			$sql = "select * from schedule inner join movie on schedule.movie_id = movie.movie_id inner join room on schedule.room_id = room.room_id where movie.movie_id=:id";
			$stmt = $db->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetchAll();
		} else {
			$sql = "select * from schedule inner join movie on schedule.movie_id = movie.movie_id inner join room on schedule.room_id = room.room_id";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
	}
}