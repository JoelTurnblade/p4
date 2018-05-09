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
        $jill = User::where('name', '=', 'Jill Harvard')->first();
        $jamal = User::where('name', '=', 'Jamal Harvard')->first();

        foreach ($characters as $character) {
            $admin->characters()->save($character);
            if($character->name == 'Aveth' || $character->name == 'Gandalf') {
                $jill->characters()->save($character);
            } else {
                $jamal->characters()->save($character);
            }
        }
    }
}
