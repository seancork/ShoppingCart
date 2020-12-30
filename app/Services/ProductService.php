<?php

namespace App\Services;

use App\Product;

class ProductService {

   // get all products in database
    public function getProducts()
    {
        return $this->data = Product::all();
    }

    // get product by product id
    public function getProduct($product_id)
    {
        return collect($this->getProducts())
            ->where('id', $product_id)
            ->first();
    }

}
