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
                'first_name' => 'علی',
                'last_name' => "کمالی",
                'mobile' => '09193250000',
                'user_name' => '3276',
                'personnel_code' => '3276',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'امیر رضا',
                'last_name' => "زارع",
                'mobile' => '09131234567',
                'user_name' => '5240',
                'personnel_code' => '5240',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'منیژه',
                'last_name' => "مهرنژاد",
                'mobile' => '09131234123',
                'user_name' => '1234',
                'personnel_code' => '1234',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'رامین',
                'last_name' => "اقتداری",
                'mobile' => '09193251970',
                'user_name' => '4847',
                'personnel_code' => '4847',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'علی رضا',
                'last_name' => "کمالی",
                'mobile' => '09193250012',
                'user_name' => '3232',
                'personnel_code' => '3232',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'علی رضا',
                'last_name' => "محمدی",
                'mobile' => '09193250082',
                'user_name' => '2525',
                'personnel_code' => '2525',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'محمد رضا',
                'last_name' => "غفاری",
                'mobile' => '09193250212',
                'user_name' => '5210',
                'personnel_code' => '5210',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'محمد',
                'last_name' => "غفاری",
                'mobile' => '09193250212',
                'user_name' => '4242',
                'personnel_code' => '4242',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'کمال',
                'last_name' => "جعفری",
                'mobile' => '09193250212',
                'user_name' => '3636',
                'personnel_code' => '3636',
                'password' => bcrypt('123456'),
            ),
            array(
                'first_name' => 'سارا',
                'last_name' => "قلی زاده",
                'mobile' => '09193250212',
                'user_name' => '3290',
                'personnel_code' => '3290',
                'password' => bcrypt('123456'),
            )
            ));
    }
}
