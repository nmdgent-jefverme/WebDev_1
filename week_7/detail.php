<?php
include_once 'config.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;

/* $sql = 'SELECT id FROM orders';
$id_array = $db->query($sql)->fetchAll();
*/ 

if($id === null || $id === ''/* || in_array($id, $id_array) */){
	header('Location: index.php');
}

$query = 'SELECT * from order_details INNER JOIN orders ON order_details.order_id = orders.id INNER JOIN products on order_details.product_id = products.id WHERE orders.id = :id';
$stmt = $db->prepare($query);
$stmt->execute([':id' => $id ,]);
$result = $stmt->fetchAll();
/*
echo '<pre>';
print_r($result);
echo '</pre>';
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detail</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<h1>Order <?php echo $id ?></h1>
	<table>
		<tr>
			<th>Product code</th>
			<th>Product name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		<?php
			foreach($result as $product){
				include 'views/products.php';
			}
		?>
		<tr>
			<th></th>
			<th></th>
			<th>total price: </th>
			<th><?php
				$total = 0;
				foreach($result as $product){
					$total += $product['quantity'] * $product['list_price']; 
				}
				echo $total;
			?>&euro;
			</th>
		</tr>
	</table>
	<a href="index.php">return</a>
</body>
</html>