<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=\App\Models\User::create([
            'name'=> 'SuperAdmin',
            'email' => 'superadmin@app.com',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
    }
}
