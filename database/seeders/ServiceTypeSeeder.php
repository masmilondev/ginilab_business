<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array('all', 'collection', 'delivery', 'din-in');

        foreach ($list as $key) {
            $t = new ServiceType();
            $t->name = $key;
            $t->save();
        }
    }
}