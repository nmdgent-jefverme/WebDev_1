<?php

class Order {

	public static function getAll($id = 0) {
		global $db;
		if($id > 0) {
			return 'er is een id';
		} else {
			$sql = "select * from kinepolis.order";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
	}

	public static function getAllDetails($id = 0) {
		global $db;
		if($id > 0) {
			return 'er is een id';
		} else {
			$sql = "select * from kinepolis.order_detail";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
}