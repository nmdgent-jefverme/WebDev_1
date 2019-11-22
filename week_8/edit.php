<?php
include_once 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT flight_id as id, flight_date as date, departure.name as departure_city, arival.name as arival_city from flight inner join airport as departure on flight.from = departure.airport_id inner join airport as arival on flight.to = arival.airport_id where flight_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id,]);
$result = $stmt->fetchAll();
print_r($result);
if(!empty($_POST)){
	echo 'posted';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<form action="edit.php?id=<?php echo $id ?>" method="post">
		<button type="submit">Edit flight</button>
	</form>
</body>
</html>