<?php
require_once 'app.php';
$id = isset($_GET['movie_id']) ?? 0;
$schedule = Schedule::getAll($id);
echo '<pre>';
print_r($schedule);
echo '</pre>';