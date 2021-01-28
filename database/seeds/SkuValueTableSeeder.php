<?php

use Illuminate\Database\Seeder;

class SkuValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sku_value')->insert([
            [
                'sku_id' => '1',
                'attribute_value_id' => '11',
            ],
            [
                'sku_id' => '1',
                'attribute_value_id' => '5',
            ],
            [
                'sku_id' => '2',
                'attribute_value_id' => '14',
            ],
            [
                'sku_id' => '2',
                'attribute_value_id' => '7',
            ],
            [
                'sku_id' => '3',
                'attribute_value_id' => '16',
            ],
            [
                'sku_id' => '3',
                'attribute_value_id' => '3',
            ],
            [
                'sku_id' => '4',
                'attribute_value_id' => '11',
            ],
            [
                'sku_id' => '4',
                'attribute_value_id' => '8',
            ],
        ]);
    }
}
