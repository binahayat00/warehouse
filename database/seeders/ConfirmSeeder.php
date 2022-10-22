<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('confirms')->insert(array(
            array(
                'id' => 1,
                'name' => 'تایید خرید',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 2,
                'name' => 'تایید تحویل',
                'created_at' => now(),
                'updated_at' => now(),
            ),
                array(
                    'id' => 3,
                    'name' => 'تایید فنی',
                    'created_at' => now(),
                    'updated_at' => now(),
                )
            )
        );
    }
}
