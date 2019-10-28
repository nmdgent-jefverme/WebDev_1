<?php
class Cart{
	private $items;

	public function __construct(){
		$this->items = isset($_COOKIE['cart'])? unserialize($_COOKIE['cart']) : [];
	}

	public function addToCart(cartItem $item) {
		$this->items[] = $item;
		$this->updateCookie();
	}

	public function getCartPrice() : float {
		$price = 0;
		foreach($this->items as $item){
			$price += $item->getSubTotal();
		}
		return $price;
	}

	public function getCart() : array {
		return $this->items;
	}
	public function updateCookie(){
		setcookie('cart', serialize($this->items));
	}
}