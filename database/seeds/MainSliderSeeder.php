<?php

use Illuminate\Database\Seeder;

class MainSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_slider')->insert([ // добавляем категорию в БД
            [
                'text_top' => 'Получите скидку до 15%',
                'text_top_en' => 'Get up to 15% OFf',
                'text' => 'Модная обувь 2021',
                'text_en' => 'Fashion Shoes 2021',
                'text_bottom' => 'Ваш мир моды в цифрах',
                'text_bottom_en' => 'Your world of fashion in numbers',
                'text_position' => 'text-center',
                'button' => 1,
                'image' => 'files/pages/main/slider/shoes-1.jpg',
            ],
            [
                'text_top' => 'Получите скидку до 25%',
                'text_top_en' => 'Get up to 25% OFf',
                'text' => 'Модная обувь 2021',
                'text_en' => 'Fashion Shoes 2021',
                'text_bottom' => 'Ваш мир моды в цифрах',
                'text_bottom_en' => 'Your world of fashion in numbers',
                'text_position' => 'text-right',
                'button' => 1,
                'image' => 'files/pages/main/slider/shoes-2.jpg',
            ],
            [
                'text_top' => 'Получите скидку до 50%',
                'text_top_en' => 'Get up to 50% OFf',
                'text' => 'Модная обувь 2021',
                'text_en' => 'Fashion Shoes 2021',
                'text_bottom' => 'Ваш мир моды в цифрах',
                'text_bottom_en' => 'Your world of fashion in numbers',
                'text_position' => 'text-left',
                'button' => 1,
                'image' => 'files/pages/main/slider/shoes-3.jpg',
            ],
        ]);
    }
}
