<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
                'id' => 1,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 2,
                'description' => null,
                'company_name' =>'HN',
                'country' => 'VN',
                'street_address' =>'nguyen sinhsac',
                'postcode_zip' => '863',
                'town_city' => 'HN',
                'phone' => '01234567',
        ]);
        DB::table('users')->insert([
            
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ]);
            
    }
}

