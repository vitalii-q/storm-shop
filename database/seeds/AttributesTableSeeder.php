<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            [
                'name' => 'Размер',
                'name_en' => 'Size',
                'code' => 'size',
            ],
            [
                'name' => 'Цвет',
                'name_en' => 'Color',
                'code' => 'color',
            ],
        ]);
    }
}
