<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
        [
            'name' => 'Gucci',
            'name_en' => 'Gucci',
            'code' => 'gucci',
            'description' => 'Gucci мода 2021',
            'description_en' => 'Gucci fashion 2021',
            'image' => ''
        ],
        [
            'name' => 'Prada',
            'name_en' => 'Prada',
            'code' => 'prada',
            'description' => 'Prada мода 2021',
            'description_en' => 'Prada fashion 2021',
            'image' => ''
        ],
        [
            'name' => 'Versace',
            'name_en' => 'Versace',
            'code' => 'versace',
            'description' => 'Versace мода 2021',
            'description_en' => 'Versace fashion 2021',
            'image' => ''
        ],
        [
            'name' => 'Louis Vuitton',
            'name_en' => 'Louis Vuitton',
            'code' => 'louis_vuitton',
            'description' => 'Louis Vuitton мода 2021',
            'description_en' => 'Louis Vuitton fashion 2021',
            'image' => ''
        ],
        ]);
    }
}
