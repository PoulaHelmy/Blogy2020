<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Posts extends Seeder
{

    public function run()
    {
        $faker = Faker::create();



        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'des' => $faker->paragraph,
                'content' => $faker->paragraph,
                'user_id' => 1
            ];
            $post = \App\Models\Post::create($array);
            $post->skills()->sync(array_rand($ids , 2));
            $post->tags()->sync(array_rand($ids , 3));
            $photo='images/doZoaRNal3Ss6VOBLNSjQhuVNfkd8p1ZXAznrfUQ.jpeg';
            \App\Models\Photo::create([
                    'src'=> $photo,
                    'photoable_type'=> 'App\Models\Post',
                    'photoable_id'=> $post->id
                ]
            );
        }
    }
}
