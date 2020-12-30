<?php

use Illuminate\Database\Seeder;

use App\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            'product_name' => 'Pioneer DJ Mixer',
            'price' => '699',
            'description' => 'Take your performance to new heights, which features our first ever 64-bit mixing processor for a warmer, more nuanced sound. We’ve fine-tuned the EQ and fader curves and enhanced the FX controls to give you even more creative choice.'
        ]);

        Product::insert([
            'product_name' => 'Roland Wave Sampler',
            'price' => '485',
            'description' => 'Get creative and take to the stage. The Roland SP-404A Linear Wave Sampler is an innovative performance sampler, and the latest addition to the AIR instrument range.The Roland SP-404A is ideal for live digital musicians.'
        ]);

        Product::insert([
            'product_name' => 'Reloop Headphone',
            'price' => '159',
            'description' => 'Reloops range of premium quality over-ear, on-ear and in-ear headphones make listening to or working with music an absolute aural pleasure.'
        ]);


        Product::insert([
            'product_name' => 'Rokit Monitor',
            'price' => '189.9',
            'description' => 'premium headphone. Reloops premium headphones offer an outstandingly powerful sound performance in an incredibly sturdy and stylish housing.'
        ]);

        Product::insert([
            'product_name' => 'Fisherprice Baby Mixer',
            'price' => '120',
            'description' => 'Your baby can mix up lots of yummy pretend play with the Fisher-Price Laugh & Learn Magic colour Mixing Bowl!'
        ]);

    }
}
