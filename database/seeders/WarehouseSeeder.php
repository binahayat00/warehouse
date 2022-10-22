<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert(
            array(
                array(
                    'rayvarz_id' => 10,
                    'active' => true,
                    'name' => '	انبار مواد اوليه مرکزي',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 100,
                    'active' => false,
                    'name' => 'انبار رک مشترک گمرک ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 101,
                    'active' => false,
                    'name' => '	انبار گچين ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 102,
                    'active' => false,
                    'name' => '	انبار گمرک شهيد باهنر ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 103,
                    'active' => false,
                    'name' => '	انبار گمرک شهيد رجائي',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 104,
                    'active' => false,
                    'name' => '	انبار گمرک گناوه ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 105,
                    'active' => false,
                    'name' => '	انبار گمرک بوشهر ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 106,
                    'active' => false,
                    'name' => '	انبار ضايعات گمرکات  ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 11,
                    'active' => true,
                    'name' => '	انبار مواد اوليه صنايع جانبي (شيميايي)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 15,
                    'active' => false,
                    'name' => '	انبار آلومينيوم',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 20,
                    'active' => true,
                    'name' => '	انبار مرکزي (ابزارآلات و ملزومات مصرفي)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 200,
                    'active' => false,
                    'name' => '	اماني کربنات نزد شيشه',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 21,
                    'active' => true,
                    'name' => '	انبار ابزارآلات اماني دست دوم',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 22,
                    'active' => false,
                    'name' => '	انبار رک',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 25,
                    'active' => false,
                    'name' => '	انبار مصرفي هبلکس',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 30,
                    'active' => true,
                    'name' => '	انبار قطعات يدكي',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 31,
                    'active' => true,
                    'name' => '	انبار قطعات يدكي ( دست دوم )',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 32,
                    'active' => true,
                    'name' => '	انبار لجستيک',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 40,
                    'active' => false,
                    'name' => '	انبار دارائي ثابت',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 45,
                    'active' => false,
                    'name' => '	انبار فرآوري ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 46,
                    'active' => false,
                    'name' => '	انبار هبلکس',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 50,
                    'active' => false,
                    'name' => '	انبار محصول فلوت',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 52,
                    'active' => false,
                    'name' => '	انبار نجاري ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 55,
                    'active' => false,
                    'name' => '	انبار محصول صنايع جانبي',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 56,
                    'active' => false,
                    'name' => '	انبار غير محصول',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 60,
                    'active' => false,
                    'name' => '	انبار مواد سوختي',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 70,
                    'active' => false,
                    'name' => '	انبار درجريان ساخت(صنايع جانبي)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 80,
                    'active' => false,
                    'name' => '	انبار صحار عمان',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 81,
                    'active' => false,
                    'name' => '	انبار عجمان امارات',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 82,                    
                    'active' => false,                    
                    'name' => '	انبار قطر ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 83,                    
                    'active' => false,                    
                    'name' => '	انبار کويت',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 84,                    
                    'active' => false,                    
                    'name' => '	انبار بصره',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 85,                    
                    'active' => false,                    
                    'name' => '	انبار اسکله',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 86,                    
                    'active' => false,                    
                    'name' => '	انبار هبلکس شلمچه',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 90,                    
                    'active' => true,                    
                    'name' => '	انبار مازاد',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 98,                    
                    'active' => false,                    
                    'name' => '	انبار ضايعات',
                    'created_at' => now(),
                    'updated_at' => now(),
                ), array(
                    'rayvarz_id' => 99,                    
                    'active' => true,                    
                    'name' => '	انبار تعميرات /اماني',
                    'created_at' => now(),
                    'updated_at' => now(),
                )
            )

        );
    }
}
