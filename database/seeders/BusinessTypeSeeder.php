<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array('Restaurant', 'Pharmacy', 'Supershop', 'Hardware store');

        foreach ($types as $type) {
            $t1 = new BusinessType();
            $t1->name = $type;
            $t1->save();
        }
    }
}