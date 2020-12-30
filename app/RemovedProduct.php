<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemovedProduct extends Model
{
    protected $fillable
        = [
            'product_id', 'amount', 'quantity', 'cost_when_removed',
        ];

    public function productDetails()
    {
        return $this->hasMany('App\Product', 'id', 'product_id');
    }

    public function oneProduct()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

}

