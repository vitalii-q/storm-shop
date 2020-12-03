<?php

use Illuminate\Database\Seeder;

class AdvantagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advantages')->insert([
            [
                'title' => 'FREE SHIPPING',
                'title_en' => 'БЕСПЛАТНАЯ ДОСТАВКА',
                'text' => 'Бесплатная доставка при заказе на сумму выше 2000₽',
                'text_en' => 'Free Shipping On All Order Or Order above $250',
                'icon_class' => 'flaticon-delivery',
            ],
            [
                'title' => '100% ДЕНЕЖНАЯ ГАРАНТИЯ',
                'title_en' => '100% MONEY GUARANTEE',
                'text' => 'Просто верните товар в течение 30 дней для обмена.',
                'text_en' => 'Simply Return it With 30 Days For an Exchange.',
                'icon_class' => 'flaticon-money-bag',
            ],
            [
                'title' => 'ПОДДЕРЖКА 24/7',
                'title_en' => 'SUPPORT 24/7',
                'text' => 'Связь с нами 24 часа в сутки 7 дней в неделю',
                'text_en' => 'Contact Us 24 Hours a Day 7 Days a Week',
                'icon_class' => 'flaticon-support',
            ],
            [
                'title' => 'СПОСОБ ОПЛАТЫ',
                'title_en' => 'PAYMENT METHOD',
                'text' => 'Мы обеспечиваем безопасную оплату',
                'text_en' => 'We Ensure Secure Payment',
                'icon_class' => 'flaticon-pay',
            ],
        ]);
    }
}
