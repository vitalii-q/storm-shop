<?php

use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insert([
            [
                'name' => 'Красота',
                'name_en' => 'Beauty',
                'code' => 'beauty',
                'description' => '',
                'description_en' => '',
                'image' => ''
            ],
            [
                'name' => 'Мода',
                'name_en' => 'Fashion',
                'code' => 'fashion',
                'description' => '',
                'description_en' => '',
                'image' => ''
            ],
            [
                'name' => 'Еда',
                'name_en' => 'Food',
                'code' => 'food',
                'description' => '',
                'description_en' => '',
                'image' => ''
            ],
            [
                'name' => 'Стиль жизни',
                'name_en' => 'Life Style',
                'code' => 'life style',
                'description' => '',
                'description_en' => '',
                'image' => ''
            ],
            [
                'name' => 'Путешествия',
                'name_en' => 'Travel',
                'code' => 'travel',
                'description' => '',
                'description_en' => '',
                'image' => ''
            ],
        ]);
    }
}
