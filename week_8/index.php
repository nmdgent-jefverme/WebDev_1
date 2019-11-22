<?php
include_once 'config.php';

$sql = "select flight_id as id, flight_date as date, departure.name as departure_city, arival.name as arival_city from flight inner join airport as departure on flight.from = departure.airport_id inner join airport as arival on flight.to = arival.airport_id ORDER BY flight_date";
//$sql = "SELECT * from flight";
$stmt = $db->prepare($sql);
$stmt->execute([]);
$result = $stmt->fetchAll();

/*echo '<pre>';
var_dump($result);
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Arteair</title>
	<link rel="stylesheet" href="main.css">
	<script src="https://kit.fontawesome.com/42eaed6607.js" crossorigin="anonymous"></script>
</head>
<body>
<table>
	<tr>
		<th>id</th>
		<th>date</th>
		<th>from</th>
		<th>to</th>
		<th></th>
		<th></th>
	</tr>
	<?php
	foreach ($result as $flight) {
		include 'views/flight_overview.php';
	}
	?>
</table>
</body>
</html>