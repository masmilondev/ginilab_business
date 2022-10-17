<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'business_id' => 1,
                'name' => "Electronics",
                'color' => 'primary',
            ),
            array(
                'business_id' => 1,
                'name' => "Plastics",
                'color' => 'primary',
            ),
            array(
                'business_id' => 1,
                'name' => "Foods",
                'color' => 'primary',
            ),
        );

        foreach ($list as $key) {
            $category = new Category();
            $category->business_id = $key['business_id'];
            $category->name = $key['name'];
            $category->color = $key['color'];
            $category->save();
        }

    }
}
