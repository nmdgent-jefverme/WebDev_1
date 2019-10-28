<?php
function getProductsGrid( array $products){
	foreach ($products as $product) {
		include 'views/products_view.php';
	}
}