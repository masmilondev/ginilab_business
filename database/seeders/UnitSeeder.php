<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of units name with business id 1
        $list = array(
            array(
                'business_id' => 1,
                'name' => "Kg",
            ),
            array(
                'business_id' => 1,
                'name' => "Pcs",
            ),
            array(
                'business_id' => 1,
                'name' => "Box",
            ),
            array(
                'business_id' => 1,
                'name' => "Bottle",
            ),
            array(
                'business_id' => 1,
                'name' => "Can",
            ),
            array(
                'business_id' => 1,
                'name' => "Packet",
            ),
            array(
                'business_id' => 1,
                'name' => "Bag",
            ),
            array(
                'business_id' => 1,
                'name' => "Meter",
            ),
            array(
                'business_id' => 1,
                'name' => "Liter",
            ),
            array(
                'business_id' => 1,
                'name' => "Gallon",
            ),
            array(
                'business_id' => 1,
                'name' => "Dozen",
            ),
            array(
                'business_id' => 1,
                'name' => "Pair",
            ),
            array(
                'business_id' => 1,
                'name' => "Roll",
            ),
            array(
                'business_id' => 1,
                'name' => "Carton",
            ),
            array(
                'business_id' => 1,
                'name' => "Bundle",
            ),
            array(
                'business_id' => 1,
                'name' => "Piece",
            ),
            array(
                'business_id' => 1,
                'name' => "Pack",
            ),
            array(
                'business_id' => 1,
                'name' => "Set",
            ),
            array(
                'business_id' => 1,
                'name' => "Pouch",
            ),
            array(
                'business_id' => 1,
                'name' => "Bunch",
            ),
            array(
                'business_id' => 1,
                'name' => "Feet",
            ),
            array(
                'business_id' => 1,
                'name' => "Inch",
            ),
        );

        foreach ($list as $key) {
            $unit = new Unit();
            $unit->business_id = $key['business_id'];
            $unit->name = $key['name'];

            $unit->save();
        }
    }
}
