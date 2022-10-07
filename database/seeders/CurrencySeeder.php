<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array(
            array('name' => "Bangladeshi Taka", 'symbol' => "৳"),
            array('name' => "Saudi Riyal", 'symbol' => "SAR"),
            array('name' => "US Doller", 'symbol' => "$"),
            array('name' => "Pound sterling", 'symbol' => "£"),
        );

        foreach ($list as $currency) {
            $cr = new Currency();
            $cr->name = $currency['name'];
            $cr->symbol = $currency['symbol'];

            $cr->save();
        }
    }
}