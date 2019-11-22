<?php
include_once 'config.php';

$name = isset($_GET['name']) ? $_GET['name'] : '';

$sql = "SELECT id, ship_name, ship_address FROM orders
WHERE ship_name LIKE :name";

$stmt = $db->prepare($sql);

$stmt->execute([':name' => '%' . $name . '%',]);

$result = $stmt->fetchAll();

/* echo '<pre>';
var_dump($result);
echo '</pre>'; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Orders</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
<table>
<form action="index.php" method="get">
	<input type="text" name="name" id="" placeholder="naam" class="text">
	<button type="submit" class="button">Search</button>
</form>
	<tr>
		<th>ID</th>
		<th>ship name</th>
		<th>ship address</th>
	</tr>
	<?php
	foreach ($result as $order) {
		// print_r($order);
		include 'views/order.php';
	}
	?>
</table>
</body>
</html>