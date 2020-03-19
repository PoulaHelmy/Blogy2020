<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $images = [
            '1557522399WcPLaLQWh0.png',
            '1557521022RN6bZNDxRt.jpg'
        ];



        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'title' => $faker->word,
                'cat_id' => 1,
                'image' => $images[rand(0,1)],
                'description' => $faker->paragraph,
                'content' => $faker->paragraph,
                'user_id' => 1
            ];
            $post = \App\Models\Post::create($array);
            $post>skills()->sync(array_rand($ids , 2));
            $post->tags()->sync(array_rand($ids , 3));
        }
    }
}
