<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use App\Services\ProductService;
use Livewire\Component;

class AddToCart extends Component
{

    public $productId;
    public $amountToAdd = 1;

    public function addToCart()
    {
        $this->updateCart($this->cartService()->quantityOfProduct($this->productId) + $this->amountToAdd);
    }

    public function cartService()
    {
        return app()->make(CartService::class);
    }

    public function productService()
    {
        return app()->make(ProductService::class);
    }

    protected function updateCart($amount)
    {
        $cartService = app()->make(CartService::class);
        $cartService->updateProduct($this->productId, $amount);
        $this->emit('update_your_cart'); //update cart count
    }

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function render()
    {
        return view('livewire.add-to-cart', [
            'price' => $this->productService()->getProduct($this->productId)['price'] * $this->amountToAdd
        ]);
    }
}
