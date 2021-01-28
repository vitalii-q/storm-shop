<?php

use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_value')->insert([
            [
                'name' => 'Белый',
                'name_en' => 'White',
                'value' => '#f7f7f7',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Бирюзовый',
                'name_en' => 'Turquoise',
                'value' => '#1ec7a6',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Синий',
                'name_en' => 'Blue',
                'value' => '#3700ff',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Голубой',
                'name_en' => 'Blue',
                'value' => '#02a8f3',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Красный',
                'name_en' => 'Red',
                'value' => '#ed2b2b',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Зеленый',
                'name_en' => 'Green',
                'value' => '#4bba5b',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Вишневый',
                'name_en' => 'Cherry',
                'value' => '#bf0b26',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Оранжевый',
                'name_en' => 'Orange',
                'value' => '#f28f00',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Черный',
                'name_en' => 'Black',
                'value' => '#222222',
                'attribute_id' => '2',
            ],
            [
                'name' => 'Салатовый',
                'name_en' => '',
                'value' => '#9cb130',
                'attribute_id' => '2',
            ],
            [
                'name' => 'XS',
                'name_en' => 'XS',
                'value' => 'XS',
                'attribute_id' => '1',
            ],
            [
                'name' => 'S',
                'name_en' => 'S',
                'value' => 'S',
                'attribute_id' => '1',
            ],
            [
                'name' => 'M',
                'name_en' => 'M',
                'value' => 'M',
                'attribute_id' => '1',
            ],
            [
                'name' => 'L',
                'name_en' => 'L',
                'value' => 'L',
                'attribute_id' => '1',
            ],
            [
                'name' => 'XL',
                'name_en' => 'XL',
                'value' => 'XL',
                'attribute_id' => '1',
            ],
            [
                'name' => 'XXL',
                'name_en' => 'XXL',
                'value' => 'XXL',
                'attribute_id' => '1',
            ],
        ]);
    }
}
