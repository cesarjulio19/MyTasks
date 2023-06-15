<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table: 'users')->insert( values: [ 
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'date' => '1999-08-18',
            'role' => 'A',
            'password' => Hash::make('admin123'),
        ]);
    }
}
