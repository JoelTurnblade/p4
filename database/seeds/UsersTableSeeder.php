<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'name' => 'Jill Harvard'],
            ['password' => Hash::make('helloworld')]
        );

        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'name' => 'Jamal Harvard'],
            ['password' => Hash::make('helloworld')]
        );

        $user = User::updateOrCreate(
            ['email' => 'Admin', 'name' => 'Admin'],
            ['password' => Hash::make('AdminAccount')]
        );
    }
}
