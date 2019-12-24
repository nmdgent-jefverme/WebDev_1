<?php
class Schedule {

	public static function getAll($id = 0) {
		global $db;
		if($id > 0) {
			$sql = "select * from schedule inner join room on schedule.room_id = room.room_id where schedule.movie_id=:id";
			$stmt = $db->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetchAll();
		} else {
			$sql = "select * from schedule inner join room on schedule.room_id = room.room_id";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
	}
}