<?php

use Illuminate\Database\Seeder;

class SkusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skus')->insert([
            [
                'product_id' => '16',
                'quantity' => '5',
            ],
            [
                'product_id' => '16',
                'quantity' => '5',
            ],
            [
                'product_id' => '16',
                'quantity' => '10',
            ],
            [
                'product_id' => '16',
                'quantity' => '10',
            ],
            [
                'product_id' => '17',
                'quantity' => '5',
            ],
            [
                'product_id' => '17',
                'quantity' => '10',
            ],
        ]);
    }
}
