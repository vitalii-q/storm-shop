<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            [
                'title' => 'Styling belt bags and over the knee boots',
                'code' => 'styling_belt_bags_1',
                'category_id' => '2',
                'preview_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt rrrrr',
                'image' => 'storage\images\blog\big-blog-1.jpg',
            ],
            [
                'title' => 'Styling belt bags and over the knee boots',
                'code' => 'styling_belt_bags_2',
                'category_id' => '1',
                'preview_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt rrrrr',
                'image' => 'storage\images\blog\big-blog-2.jpg',
            ],
            [
                'title' => 'Styling belt bags and over the knee boots',
                'code' => 'styling_belt_bags_3',
                'category_id' => '2',
                'preview_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt rrrrr',
                'image' => 'storage\images\blog\big-blog-3.jpg',
            ],
        ]);
    }
}
