<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\User;
use Illuminate\Support\Facades\Auth;


class CharacterController extends Controller
{
    public function update(Request $request) {


        $user = Auth::user();

        if($user) {

            $request->validate([
                'name' => 'required',
                'race' => 'required',
                'class' => 'required',
                'level' => 'required|integer',
                'str' => 'required|integer',
                'dex' => 'required|integer',
                'con' => 'required|integer',
                'int' => 'required|integer',
                'wis' => 'required|integer',
                'cha' => 'required|integer',
                'status' => 'required',
                'max-hp' => 'required|integer',
                'current-hp' => 'required|integer',
                'gold' => 'required|integer',
                'armor' => 'required',
                'armor-ac-bonus' => 'required|integer',
                'weapon' => 'required',
                'max-weapon-dmg' => 'required|integer',
                'ranged-or-melee' => 'required',
            ]);


            if($request->input('opp') == 'save') {

                $character = Character::whereHas('users', function($query) {
                    $query->where('name', '=', Auth::user()->name);
                })->where('id', '=', $request->input('id'))->first();

                $character->name = $request->input('name');
                $character->race = $request->input('race');
                $character->class = $request->input('class');
                $character->level = $request->input('level');
                $character->str = $request->input('str');
                $character->dex = $request->input('dex');
                $character->con = $request->input('con');
                $character->int = $request->input('int');
                $character->wis = $request->input('wis');
                $character->cha = $request->input('cha');
                $character->status = $request->input('status');
                $character->max_hp = $request->input('max-hp');
                $character->current_hp = $request->input('current-hp');
                $character->gold = $request->input('gold');
                $character->armor_name = $request->input('armor');
                $character->armor_ac_bonus = $request->input('armor-ac-bonus');
                $character->weapon_name = $request->input('weapon');
                $character->weapon_max_dmg = $request->input('max-weapon-dmg');
                $character->ranged_weapon = (boolean)$request->input('ranged-or-melee');

                $character->save();

            }


            if($request->input('opp') == 'delete') {

                $character = Character::whereHas('users', function($query) {
                    $query->where('name', '=', Auth::user()->name);
                })->where('id', '=', $request->input('id'))->first();

                $character->users()->detach();
                $character->delete();

            }


            if($request->input('opp') == 'create') {

                $character = new Character;

                $character->name = $request->input('name');
                $character->race = $request->input('race');
                $character->class = $request->input('class');
                $character->level = $request->input('level');
                $character->str = $request->input('str');
                $character->dex = $request->input('dex');
                $character->con = $request->input('con');
                $character->int = $request->input('int');
                $character->wis = $request->input('wis');
                $character->cha = $request->input('cha');
                $character->status = $request->input('status');
                $character->max_hp = $request->input('max-hp');
                $character->current_hp = $request->input('current-hp');
                $character->gold = $request->input('gold');
                $character->armor_name = $request->input('armor');
                $character->armor_ac_bonus = $request->input('armor-ac-bonus');
                $character->weapon_name = $request->input('weapon');
                $character->weapon_max_dmg = $request->input('max-weapon-dmg');
                $character->ranged_weapon = (boolean)$request->input('ranged-or-melee');
                $character->sharing = hash('sha256', $character->id . $character->name);

                if($request->path() == 'characters') {
                    $character->friendly = true;
                } else {
                    $character->friendly = false;
                }

                $character->save();

                $user->characters()->save($character);

                $admin = User::where('name', '=', 'Admin')->first();
                if($user->id != $admin->id) {
                    $admin->characters()->save($character);
                }
            }


            if($request->input('opp') == 'transfer') {

                $character = Character::whereHas('users', function($query) {
                    $query->where('name', '=', Auth::user()->name);
                })->where('id', '=', $request->input('id'))->first();

                if($character->friendly) {
                    $character->friendly = false;
                } else {
                    $character->friendly = true;
                }

                $character->save();
            }


            if($request->path() == 'characters') {
                $characters = Character::whereHas('users', function($query) {
                    $query->where('name', '=', Auth::user()->name);
                })->where('friendly', '=', true)->get();
            } else {
                $characters = Character::whereHas('users', function($query) {
                    $query->where('name', '=', Auth::user()->name);
                })->where('friendly', '=', false)->get();
            }
            
            return view('pages.' . $request->path())->with([
                'user' => $user,
                'userName' => $user->name,
                'characters' => $characters,
            ]);

        } else {
            return view('errors.404');
        }

    }
}
