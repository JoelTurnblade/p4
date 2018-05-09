<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Character;
use App\User;

class CombatController extends Controller
{
    public function attack(Request $request) {

        $request->flash();

        $user = Auth::user();

        if($user) {

            $userName = $user->name;
            $message = '';

            $characters = Character::whereHas('users', function($query) {
                $query->where('name', '=', Auth::user()->name);
            })->where([
                ['friendly', '=', true],
                ['status', '=', 'Active'],
            ])->get();

            $enemies = Character::whereHas('users', function($query) {
                $query->where('name', '=', Auth::user()->name);
            })->where([
                ['friendly', '=', false],
                ['status', '=', 'Active'],
            ])->get();

            $attacker = Character::where('id', '=', $request->input('attacker'))->first();
            $defender = Character::where('id', '=', $request->input('defender'))->first();

            $attackerRoll = rand(1, 20);
            $defenderRoll = rand(1, 20);

            $message = $message . $attacker->name . ' rolls a ' . $attackerRoll . ' against ' .
                $defender->name . '\'s ' . $defenderRoll . '+' . $defender->armor_ac_bonus .
                ' defense,';

            if($attackerRoll > ($defenderRoll + $defender->armor_ac_bonus)) {
                $damage = rand(1, $attacker->weapon_max_dmg);
                $message = $message . '<br>and hits for ' . $damage . ' points of damage.';
                $defender->current_hp = $defender->current_hp - $damage;
                if($defender->current_hp <= 0) {
                    $defender->status = 'Dead';
                    $message = $message . '<br>' . $defender->name . ' is now dead.';
                }
                $defender->save();
            } else {
                $message = $message . '<br> but fails to hit.';
            }


            $characters = Character::whereHas('users', function($query) {
                $query->where('name', '=', Auth::user()->name);
            })->where([
                ['friendly', '=', true],
                ['status', '=', 'Active'],
            ])->get();;

            $enemies = Character::whereHas('users', function($query) {
                $query->where('name', '=', Auth::user()->name);
            })->where([
                ['friendly', '=', false],
                ['status', '=', 'Active'],
            ])->get();


            return view('pages.combat')->with([
                'user' => $user,
                'userName' => $userName,
                'message' => $message,
                'characters' => $characters,
                'enemies' => $enemies,
            ]);

        } else {
            return view('errors.404');
        }

    }
}
