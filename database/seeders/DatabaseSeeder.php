<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        
        $this->call([
            fileCategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            WarehouseSeeder::class,
            StatusSeeder::class,
            UnitSeeder::class,
            ConfirmSeeder::class,
            DeliverySeeder::class,
            VehicleSeeder::class,
        ]);
    }
}
