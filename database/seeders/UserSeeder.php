<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'first_name' => 'منیژه',
                'last_name' => "مهرنژاد",
                'mobile' => '09131234123',
                'user_name' => '1234',
                'personnel_code' => '1234',
                'password' => '1234',
            ),
            ));
    }
}
