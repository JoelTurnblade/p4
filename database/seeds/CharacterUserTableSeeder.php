<?php

use Illuminate\Database\Seeder;
use App\Character;
use App\User;

class CharacterUserTableSeeder extends Seeder
{
    public function run()
    {
        $characters = Character::all();
        $admin = User::where('name', '=', 'Admin')->first();
        foreach ($characters as $character) {
            $admin->characters()->save($character);
        }
    }
}
