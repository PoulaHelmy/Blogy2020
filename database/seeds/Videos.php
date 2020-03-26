<?php

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();



        $youtube = [
            'https://www.youtube.com/watch?v=ReCMory5weE',
            'https://www.youtube.com/watch?v=G7Gp9gzIHU8&t=85s',
            'https://www.youtube.com/watch?v=unY2PbFh5gs',
            'https://www.youtube.com/watch?v=R0BqKo7vUOg'
        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        for ($i = 0 ;$i< 10 ;$i++) {
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'youtube' => $youtube[rand(0, 3)],
                'published' => rand(0, 1),
                'des' => $faker->paragraph,
                'user_id' => 1
            ];
            $video = \App\Models\Video::create($array);
            $photo='images/I4Srgioo0c5zUU6t5rnjj1ZSxULV4JgQ4nTJU3SG.jpeg';
            Photo::create(
                [
                    'src'=> $photo,
                    'photoable_type'=> 'App\Models\Video',
                    'photoable_id'=> $video->id
                ]
            );
            $video->skills()->sync(array_rand($ids, 2));
            $video->tags()->sync(array_rand($ids, 3));
            $video->playlists()->sync(array_rand($ids, 1));
            $video->cat()->sync(array_rand($ids, 1));
        }
    }
}
