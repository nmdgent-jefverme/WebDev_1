<?php
include_once 'config.php';

class User {

	public static function getById($id) {
		$sql = "select * from user where user_id = :user_id";
		$stmt = $db->prepare($sql);
		$stmt->execute([':user_id' => $id]);
		return $stmt->fetchAll();
	}
}