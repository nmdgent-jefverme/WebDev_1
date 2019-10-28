<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/week04Klas/css/style.css">
</head>
<body>
<section>
<?php
    require_once 'products_data.php';
    require_once 'controllers/products.php';

/*
    $cart = new stdClass();
    $cart->numberOfProducts = 5;
    $cart->totalPrice = 99.99;
*/


    getProductsGrid($products);

?>
</section>
</body>
</html>
