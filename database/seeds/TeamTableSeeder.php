<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            [
                'name' => 'Евгений',
                'name_en' => 'MR Eugene',
                'description' => 'Генеральный директор и основатель',
                'description_en' => 'CEO & Founder',
                'image' => 'images\about\our_team\img-1.jpg'
            ],
            [
                'name' => 'Альберт',
                'name_en' => 'Mr Albert',
                'description' => 'Основатель',
                'description_en' => 'Founder',
                'image' => 'images\about\our_team\img-2.jpg'
            ],
            [
                'name' => 'Кристина',
                'name_en' => 'Ms christina',
                'description' => 'Менеджер по дизайну',
                'description_en' => 'Design Manager',
                'image' => 'images\about\our_team\img-3.jpg'
            ],
            [
                'name' => 'Ксения',
                'name_en' => 'Ms Ksenia',
                'description' => 'Обслуживание клиентов',
                'description_en' => 'Client Care',
                'image' => 'images\about\our_team\img-4.jpg'
            ],
        ]);
    }
}
