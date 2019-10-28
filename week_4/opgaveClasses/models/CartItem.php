<?php
class CartItem {
	public $product_code;
	public $price;
	public $quantity;

	public function __construct(string $product_code, float $price, int $quantity = 1){
		$this->product_code = $product_code;
		$this->price = $price;
		$this->quantity = $quantity;
	}

	public function getSubTotal() : float {
		return $this->price * $this->quantity;
	}
}