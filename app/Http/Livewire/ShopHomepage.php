<?php

namespace App\Http\Livewire;

use App\Product;
use App\Services\CartService;
use App\Services\ProductService;
use Livewire\Component;

class ShopHomepage extends Component
{

    public $products = [];

    protected $listeners = [
        'update_your_cart' => 'updateProducts',
    ];

    public function mount()
    {
        $this->products = $this->products();
    }

    public function updateProducts()
    {
        $this->products = $this->products();
    }

    protected function products()
    {
        return $this->data = Product::all();
    }

    public function cartService()
    {
        return app()->make(CartService::class);
    }

    //for database
    public function productService()
    {
        return app()->make(ProductService::class);
    }

    public function render()
    {
        return view('livewire.shop-homepage', [
            'total' => $this->cartService()->itemCount()
        ]);
    }
}
