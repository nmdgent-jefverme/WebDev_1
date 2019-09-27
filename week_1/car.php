<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Document</title>
</head>

<body>
	<?php
		require_once 'data.php';
		$search = '';
		if(isset($_GET['search'])){
			$search = $_GET['search'];
		}
		foreach($cars as $car){
			if(strpos($car['brand'], $search) !== false){
			
			?>
			<div class="car-card">
				<img src="img/<?php echo $car['image'] ?>" alt="">
				<p class="brand">brand: <?php echo $car['brand'] ?> </p>
				<p class="type">type: <?php echo $car['type'] ?></p>
				<p class="fuel">fuel: <?php echo $car['fuel'] ?></p>
				<p class="price">price: <?php echo $car['price_from'] ?> &euro;</p>
			</div>
			<?php
			}
		}
	?>

</body>

</html>