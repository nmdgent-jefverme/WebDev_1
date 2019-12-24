<?php
// GEBRUIK DEZE KLASSES OM DATA OP EEN CORRECTE MANIER OP TE HALEN EN TERUG TE GEVEN.
// WIJZIG DE NAAM VAN HET BESTAND EN DE KLASSE NAAR HET TYPE DATA DAT JE WIL OPVRAGEN
class Model {

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