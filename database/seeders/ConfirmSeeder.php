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
            ),
            array(
                'id' => 2,
                'name' => 'تایید تحویل',
            )
            )
        );
    }
}
