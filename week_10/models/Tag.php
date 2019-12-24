<?php

class Tag {
	public static function getTags() {
		global $db;
		$sql_message_tag = "select * from message_tag inner join tag on message_tag.tag_id = tag.tag_id";
		$stmt2 = $db->prepare($sql_message_tag);
		$stmt2->execute([]);
		return $stmt2->fetchAll();
	}
}