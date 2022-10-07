<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = array('English', 'Arabic', "Bangla");

        foreach ($list as $key) {
            $language = new Language();
            $language->name = $key;
            $language->save();
        }
    }
}