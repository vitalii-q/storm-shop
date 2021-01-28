<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => 'Мода',
                'name_en' => 'Fashion',
                'code' => 'fashion',
            ],
            [
                'name' => 'Одежда',
                'name_en' => 'Clothing',
                'code' => 'clothing',
            ],
            [
                'name' => 'Ювилирные украшения',
                'name_en' => 'Jewelry',
                'code' => 'jewelry',
            ],
            [
                'name' => 'Аксессуары',
                'name_en' => 'Accessories',
                'code' => 'accessories',
            ],
            [
                'name' => 'Обувь',
                'name_en' => 'Shoes',
                'code' => 'shoes',
            ],
            [
                'name' => 'Спорт',
                'name_en' => 'Sport',
                'code' => 'sport',
            ],
        ]);
    }
}
