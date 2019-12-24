<?php
require '../app.php';
header('Content-Type: application/json');

$page = $_GET['page'] ?? 1;

$tags = Tag::getTags();
$messages = Message::getAll($page);
echo displayMessages($messages, $tags);