<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
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
                'name' => "Royal",
                'city' => 'Riyad',
                'country' => 'Saudi Arabia',
                'mobile' => '01301675750',
                'email' => 'royalbindowood@gmail.com',
                'vat' => 5,
                'service_type_id' => 1,
            ),
            array(
                'business_id' => 1,
                'name' => "Asad",
                'city' => 'Jeddah',
                'country' => 'Saudi Arabia',
                'mobile' => '01301675755',
                'email' => 'asadbindowood@gmail.com',
                'vat' => 5,
                'service_type_id' => 1,
            ),
        );

        foreach ($list as $key) {
            $branch = new Branch();
            $branch->business_id = $key['business_id'];
            $branch->name = $key['name'];
            $branch->city = $key['city'];
            $branch->country = $key['country'];
            $branch->mobile = $key['mobile'];
            $branch->email = $key['email'];
            $branch->vat = $key['vat'];
            $branch->service_type_id = $key['service_type_id'];

            $branch->save();
        }
    }
}