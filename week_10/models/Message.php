<?php

class Message {

	public static function getAll($page) {

		global $db;

		$offset = 20 * ($page - 1);
		$sql = "select * from message inner join user on message.user_id = user.user_id LIMIT :offset , 20";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function getById($id) {
		global $db;
		$sql = "select * from message inner join user on message.user_id = user.user_id where message_id = :id";
		$stmt = $db->prepare($sql);
		$stmt->execute([':id' => $id]);
		return $stmt->fetchAll();
	}
}