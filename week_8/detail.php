<?php
include_once 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id !== null) {
	$sql = "SELECT * from orders inner join order_detail on orders.order_id = order_detail.order_id inner join flight on order_detail.flight_id = flight.flight_id where order_detail.flight_id = :id";
	$stmt = $db->prepare($sql);
	$stmt->execute([':id' => $id,]);
	$result = $stmt->fetchAll();
	/* echo '<pre>';
	var_dump($result);
	echo '</pre>'; */
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="main.css">
	<script src="https://kit.fontawesome.com/42eaed6607.js" crossorigin="anonymous"></script>
</head>
<body>
<table>
	<tr>
		<th>id</th>
		<th>firstname</th>
		<th>lastname</th>
		<th>seat</th>
		<th>price</th>
		<th></th>
	</tr>
	<?php
	foreach ($result as $flight) {
		include 'views/flight_detail.php';
	}
	?>
</table>
</body>
</html>