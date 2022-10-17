<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
            array(
                'name' => "Laptop 1",
                'business_id' => 1,
                'category_id'=> 1,
                'unit_id' => 1,
                'sell_price' => 12.35,
                'cost_price' => 10.00,
                'vat' => 5,
                'stock' => 5,
                'service_type_id' => 1,
            ),
            array(
                'name' => "Monitor",
                'business_id' => 1,
                'category_id'=> 1,
                'unit_id' => 1,
                'sell_price' => 16.00,
                'cost_price' => 9.65,
                'vat' => 3,
                'stock' => 10,
                'service_type_id' => 1,
            ),
        );

        foreach ($list as $product) {
            $pr = new Product();
            $pr->name = $product['name'];
            $pr->business_id = $product['business_id'];
            $pr->category_id = $product['category_id'];
            $pr->unit_id = $product['unit_id'];
            $pr->sell_price = $product['sell_price'];
            $pr->cost_price = $product['cost_price'];
            $pr->vat = $product['vat'];
            $pr->stock = $product['stock'];
            $pr->service_type_id = $product['service_type_id'];

            $pr->save();
        }

        
        
    }
}
