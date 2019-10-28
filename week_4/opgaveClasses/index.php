<?php 
include_once 'models/Cart.php'; 
include_once 'models/CartItem.php';
$cart = new Cart();
/*
$cartItem = new CartItem('ABC123', 11.98, 8);
$cartItem2 = new CartItem('DEF456', 17.50, 3);
$cartItem3 = new CartItem('GHI789', 140.7, 1);

$cart->addToCart($cartItem);
$cart->addToCart($cartItem2);
$cart->addToCart($cartItem3);
$cartItem4 = new CartItem('FHGH', 14.7, 5);
$cart->addToCart($cartItem4);
$cartItem5 = new CartItem('FHGH', 14.7, 5);
$cart->addToCart($cartItem5);*/
$cart->getCartprice();
?>
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
include_once 'controllers/products.php';
getProductsGrid($products);
?>
</div>
</body>
</html>


