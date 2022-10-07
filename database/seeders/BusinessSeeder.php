<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = new Business();
        $business->name = "Bin Dawood";
        $business->website = "bindawood.com";
        $business->business_type_id = 3;
        $business->city = "Madinah";
        $business->country = "Saudi Arabia";
        $business->mobile = "0537263119";
        $business->email = "masmilonbd@gmail.com";

        $business->save();
    }
}