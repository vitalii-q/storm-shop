<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([ // добавляем категорию в БД
            [
                'name' => 'Куртки',
                'name_en' => 'Jackets',
                'code' => 'jackets',
                'description' => 'Мода 2021',
                'description_en' => 'Fashion 2021',
                'image' => ''
            ],
            [
                'name' => 'Толстовки',
                'name_en' => 'Sweatshirts',
                'code' => 'sweatshirts',
                'description' => 'Мода 2021',
                'description_en' => 'Fashion 2021',
                'image' => ''
            ],
            [
                'name' => 'Рубашки',
                'name_en' => 'Shirts',
                'code' => 'shirts',
                'description' => 'Мода 2021',
                'description_en' => 'Fashion 2021',
                'image' => ''
            ],
            [
                'name' => 'Джинсы',
                'name_en' => 'Jeans',
                'code' => 'jeans',
                'description' => 'Мода 2021',
                'description_en' => 'Fashion 2021',
                'image' => ''
            ],
            [
                'name' => 'Аксессуары',
                'name_en' => 'Accessories',
                'code' => 'accessories',
                'description' => 'Мода 2021',
                'description_en' => 'Fashion 2021',
                'image' => ''
            ],
        ]);
    }
}
