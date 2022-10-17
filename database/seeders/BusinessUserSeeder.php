<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $business = Business::first();

        // We can attach by object or id or array of ids
        // $user->businesses()->attach([1,2,3]);
        $user->businesses()->attach($business);

        // We can detach by object or id or array of ids
        // $user->businesses()->detach([1,2,3]);
        // $user->businesses()->detach($business);

        // We can sync by object or id or array of ids
        // $user->businesses()->sync([1,2,3]);
        // $user->businesses()->sync($business);
    }
}
