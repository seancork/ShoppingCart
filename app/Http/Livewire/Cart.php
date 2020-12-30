<?php

namespace App\Http\Livewire;

use App\RemovedProduct;
use App\Product;
use App\Services\CartService;
use Livewire\Component;

class Cart extends Component
{
    public $cart;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cart = $this->cartService()->currentCart();
    }

    public function remove($product_id)
    {
        $data = Product::find($product_id);

        // saved removed products to database
        RemovedProduct::create(
            [
                'product_id'        => $product_id,
                'quantity'          => $this->cartService()->quantityOfProduct(
                    $product_id
                ),
                'cost_when_removed' => $data->price
            ]
        );

        $this->cartService()->removeItem($product_id);
        $this->updateCart();
    }

    public function cartService()
    {
        return app()->make(CartService::class);
    }

    public function render()
    {
        return view(
            'livewire.cart', [
            'cart'        => $this->cart,
            'total_price' => $this->cartService()->totalCost()
        ]
        );
    }
}
