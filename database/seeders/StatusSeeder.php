<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array(
            array(
                'id' => 1,
                'name' => 'ثبت اولیه',
                'title' => 'ثبت اولیه',
                'priority' => 1,
                'description' => 'ثبت اولیه',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 2,
                'name' => 'گرفتن مجوزها',
                'title' => 'گرفتن مجوزها',
                'priority' => 2,
                'description' => 'گرفتن مجوزها',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 3,
                'name' => 'کارتابل پیک',
                'title' =>  'کارتابل پیک',
                'priority' => 3,
                'description' => 'کارتابل پیک',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 4,
                'name' => 'تحویل مامور پیک',
                'title' => 'تحویل مامور پیک',
                'priority' => 4,
                'description' => 'تحویل مامور پیک',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 5,
                'name' => 'بازگشت به انبار',
                'title' => 'بازگشت به انبار',
                'priority' => 5,
                'description' => 'بازگشت به انبار',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 6,
                'name' => 'لغو شده',
                'title' => 'لغو شده',
                'priority' => 6,
                'description' => 'لغو شده',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 7,
                'name' => 'آرشیو شده',
                'title' => 'آرشیو شده',
                'priority' => 7,
                'description' => 'آرشیو شده',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            )
        );
    }
}
