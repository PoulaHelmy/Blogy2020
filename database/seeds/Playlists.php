<?php

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Playlists extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $ids = [1,2,3,4,5,6,7,8,9];

        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'cat_id' => 1,
                'published' => rand(0,1),
                'des' => $faker->paragraph,
                'user_id' => 1,
                'level'=>'Middle'
            ];
            $playlist = \App\Models\Playlist::create($array);
            $photo='images/doZoaRNal3Ss6VOBLNSjQhuVNfkd8p1ZXAznrfUQ.jpeg';
            Photo::create([
                    'src'=> $photo,
                    'photoable_type'=> 'App\Models\Playlist',
                    'photoable_id'=> $playlist->id
                ]
            );
            $playlist->skills()->sync(array_rand($ids , 2));
            $playlist->tags()->sync(array_rand($ids , 3));
        }
    }
}
