<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678')
        ]);
        $a->assignRole('admin');

        $b = User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('12345678')
        ]);

        $b->assignRole('user');
    }
}
