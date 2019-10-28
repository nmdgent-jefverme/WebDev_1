<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Webstore</title>
	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
<?php
include_once 'products_data.php';
echo $_GET['name'];
foreach ($products as $product) {
	if($products['code'] === $_GET['name']){
		$detail = $product;	
	} 
}
print_r($detail);
?>
</div>
</body>
</html>


