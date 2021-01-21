<?php

use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_tag')->insert([
            [
                'blog_id' => 1,
                'tag_id' => 1,
            ],
            [
                'blog_id' => 1,
                'tag_id' => 2,
            ],
            [
                'blog_id' => 1,
                'tag_id' => 4,
            ],
            [
                'blog_id' => 2,
                'tag_id' => 2,
            ],
            [
                'blog_id' => 2,
                'tag_id' => 5,
            ],
            [
                'blog_id' => 2,
                'tag_id' => 6,
            ],
            [
                'blog_id' => 3,
                'tag_id' => 5,
            ],
            [
                'blog_id' => 3,
                'tag_id' => 6,
            ],
        ]);
    }
}
