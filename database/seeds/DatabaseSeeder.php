<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //LaratrustSeeder::class,
          // Users::class,
            Categories::class,
            Skills::class,
            Tags::class,
            Videos::class,
            Posts::class,
         //   Playlists::class,

        ]);
    }
}
