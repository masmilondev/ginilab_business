<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of Bangladeshi brand name with business id 1
        $list = array(
            array(
                'business_id' => 1,
                'name' => "Aarong",
            ),
            array(
                'business_id' => 1,
                'name' => "RFL",
            ),
        );

        foreach ($list as $key) {
            $brand = new Brand();
            $brand->business_id = $key['business_id'];
            $brand->name = $key['name'];

            $brand->save();
        }

    }
}
