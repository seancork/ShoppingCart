<?php

namespace App\Http\Controllers;

use App\RemovedProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiController extends Controller
{
    //this is just to turn day, month, year into carbon date
    public function getCarbonDate($range) {

        $date_range = Carbon::now()->subHours(24);

        if($range == 'month'){
            $date_range = Carbon::now()->subMonth();
        }else if($range == 'day'){
            $date_range = Carbon::now()->subHours(24);
        }else if($range == 'hour'){
            $date_range = Carbon::now()->subHours(1);
        }else if($range == 'year'){
            $date_range = Carbon::now()->subWeeks(52);
        }else{

        }
        return $date_range;
    }

    //get all removed products from database by date range: hour, day, month, year
    public function getDateRange($range) {

        $date_range = $this->getCarbonDate($range);

        $data =  RemovedProduct::with(array('productDetails' =>function($query){
            $query->select('id','product_name','description','price');
        }))->whereBetween('created_at', [$date_range, Carbon::now()])->get();

        $data->makeHidden(['updated_at']); //this data is not needed in the api

        return response($data, 200);
    }

    //get all removed products from database
    public function getAllRemovedProducts() {

        $data = RemovedProduct::with(array('productDetails' =>function($query){
            $query->select('id','product_name','description','price');
        }))->get();

        $data->makeHidden(['updated_at']);

        return $data;
    }

    //get all removed products from database by product name
    public function getRemovedProductsByName($product) {

        $data_product = function($query) use($product) {
            $query->select('id','product_name','description','price')->where('product_name', $product);
        };

        $data = RemovedProduct::whereHas('productDetails', $data_product)->with(['productDetails' => $data_product])->get();

        $data->makeHidden(['updated_at']);

        return $data;
    }

    //get all removed products from database by date product name and date range
    public function getRemovedProductsByNameAndDateRange($range, $product) {

        $data_product = function($query) use($product, $range) {
            $query->select('id','product_name','description','price')->where('product_name', $product);
        };

        $data = RemovedProduct::whereHas('productDetails', $data_product)->with(['productDetails' => $data_product])->
            whereBetween('created_at', [$this->getCarbonDate($range), Carbon::now()])->get();

        $data->makeHidden(['updated_at']);

        return $data;

    }
}
