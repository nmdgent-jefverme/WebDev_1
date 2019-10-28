<div class="product_item">
    <a href="detail.php?product_code=<?php echo $product->code; ?>">
    <img src="<?php echo $product->photo; ?>">
    <h2><?php echo $product->name; ?></h2>
    &euro; <?php echo $product->price; ?>
    </a>
    <a href="add_to_cart.php?product_code=<?php echo $product->code; ?>">Add to cart</a>
</div>