<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\User;
use Illuminate\Support\Facades\Auth;

class SharingController extends Controller
{
    public function link(Request $request) {

        $user = Auth::user();
        if($user) {

            $message = '';

            $linkCharacter = Character::whereHas('users', function($query) {
                $query->where('name', '<>', Auth::user()->name);
            })->where('sharing', '=', $request->input('code'))->first();

            if($linkCharacter) {
                $user->characters()->save($linkCharacter);
                $message = '<br>Character successfully linked to your account';
                $success = true;
            } else {
                $message = '<br>The submitted code did not match an external character';
                $success = false;
            }


            $characters = Character::whereHas('users', function($query) {
                $query->where('name', '=', Auth::user()->name);
            })->get();


            return view('pages.sharing')->with([
                'user' => $user,
                'userName' => $user->name,
                'characters' => $characters,
                'message' => $message,
                'success' => $success,
            ]);

        } else {
            return view('errors.404');
        }
    }
}
