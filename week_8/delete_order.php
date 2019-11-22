<?php
include_once 'config.php';
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;
$flight_id = isset($_GET['flight_id']) ? $_GET['flight_id'] : null;
if($order_id !== null) {
	$sql = "DELETE from order_detail where order_detail_id = :id";
	$stmt = $db->prepare($sql);
	$stmt->execute([':id' => $order_id,]);
	/* echo '<pre>';
	var_dump($result);
	echo '</pre>'; */
	header('Location: detail.php?id='.$flight_id);
}
?>