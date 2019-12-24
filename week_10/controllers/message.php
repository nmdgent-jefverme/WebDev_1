<?php
define('BASE_PATH', dirname(__FILE__));
function displayMessages($messages, $tags) {
	foreach ($messages as $message) {
		include '../views/message.php';
	}
}