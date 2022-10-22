<?php

namespace Database\Seeders;

use App\Models\FilesCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files_categories')->insert(array(
            array(
                'id' => 1,
                'name' => "جزییات درخواست",
                'link' => 'public/requestDetails',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 2,
                'name' => 'جزییات خرید',
                'link' => 'public/buyDetails',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 3,
                'name' => "دسته بندی نشده",
                'link' => 'public/uncategories',
                'created_at' => now(),
                'updated_at' => now(),
                ),
            ));
    }
}
