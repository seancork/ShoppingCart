<?php

namespace Tests\Feature;

use App\Product;
use App\RemovedProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{

    //get a radnom removed product from database
    public function getDatabaseData()
    {
        $data =  RemovedProduct::select('product_id')
            ->inRandomOrder()
            ->first();

        return $data->oneProduct->product_name;
    }

    /** @test */
    public function checkAllRemovedResponse()
    {
        $this->json('get', 'api/removed')
            ->assertStatus(200);
    }

    /** @test */
    public function getProductByDateRange()
    {
        $this->json('get', 'api/removed/year')
            ->assertStatus(200);
    }

    /** @test */
    public function getProductByDateRangeAndName()
    {
        $db_data = $this->getDatabaseData();

        $this->json('get', 'api/removed/year/name/'.$db_data)
            ->assertStatus(200);
    }

    /** @test */
    public function getRepsonceStrcture()
    {
        $db_data = $this->getDatabaseData();

        $this->json('get', '/api/removed/year/name/'.$db_data)
            ->assertJsonStructure(
                [
                    '*' => ['id',
                            'product_details' => [
                                '*' => [
                                    'id',
                                     'product_name',
                                    'description',
                                    'price'
                                ]],
                            'cost_when_removed',
                            'product_id'],
                ]
            );

    }

}
