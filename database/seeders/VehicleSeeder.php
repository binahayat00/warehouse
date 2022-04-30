<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert(array(
            array(
                'name' => 'موتور',
                'number' => "24/3645",
                'description' => 'مدل 87 - رنگ قرمز'
            ),
            ));
        
    }
}
