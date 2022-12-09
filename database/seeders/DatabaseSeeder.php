<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'nama'=>'saya',
        'username'=>'admin',
        'password'=>Hash::make('bismillahsukses'),
        'role'=>'admin'
      ]);
    }
}
