<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(array(
            array(
                'id' => 1,
                'name' => 'برنامه نویسی',
                'created_at' => now(),
                'updated_at' => now(),
            ),
                array(
                    'id' => 2,
                    'name' => 'تولید',
                    'created_at' => now(),
                    'updated_at' => now(),
                )
            )
        );
    }
}
