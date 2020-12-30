<?php

namespace App\Services;

class CartService
{
    public $cart;

    public function __construct()
    {
        $this->cart = session('cart'); //get value from session
    }

    //get current amount in cart
    public function quantityOfProduct($product_id)
    {
        if (!empty($this->cart[$product_id])) {
            return $this->cart[$product_id];
        }
        return 0;
    }

    //remove item from cart by id
    public function removeItem($product_id)
    {
        $this->updateProduct($product_id, 0);
    }

    //update amount of item in a cart, 0 means removed
    public function updateProduct($product_id, $amount = 1)
    {
        if ($amount == 0) {
            unset($this->cart[$product_id]);
        } else {
            $this->cart[$product_id] = $amount;
        }
        // Store the current cart in the session
        session(
            [
                'cart' => $this->cart
            ]
        );
    }

    //get all current items in cart and get amount and total cost - cart page
    public function currentCart()
    {
        $productService = app()->make(ProductService::class);
        return collect($this->cart)->map(
                function ($amount, $product_id) use ($productService) {

                    if ($product = $productService->getProduct($product_id)) { //get each product and get amount and total cost
                        $product['amount'] = $amount;
                        $product['total_price'] = $amount * $product['price']; //get total cost
                        return $product;
                    }
                }
            )
            ->filter() // Filter null
            ->toArray();
    }

    //get the total price of items in cart
    public function totalCost()
    {
        return collect($this->currentCart())->sum('total_price');
    }

    //get item count in cart
    public function itemCount()
    {
        return collect($this->cart)->sum();
    }

}
