<?php
use App\Character;

Route::get('/', function () {

    $user = Auth::user();
    if($user) {
        $userName = $user->name;
    }
    else {
        $userName = null;
    }

    return view('pages.home')->with([
    'user' => $user,
    'userName' => $userName,
    ]);
});


Auth::routes();


Route::get('/characters', function () {

    $user = Auth::user();
    if($user) {

        $characters = Character::whereHas('users', function($query) {
            $query->where('name', '=', Auth::user()->name);
        })->where('friendly', '=', true)->get();

        return view('pages.characters')->with([
            'user' => $user,
            'userName' => $user->name,
            'characters' => $characters,
        ]);
    }

    else {
        return view('errors.404');
    }

});


Route::post('/characters', 'CharacterController@update');


Route::get('/enemies', function () {

    $user = Auth::user();
    if($user) {

        $characters = Character::whereHas('users', function($query) {
            $query->where('name', '=', Auth::user()->name);
        })->where('friendly', '=', false)->get();

        return view('pages.enemies')->with([
            'user' => $user,
            'userName' => $user->name,
            'characters' => $characters,
        ]);
    }

    else {
        return view('errors.404');
    }
});


Route::post('/enemies', 'CharacterController@update');


Route::get('/combat', function() {

    $user = Auth::user();
    if($user) {
        $userName = $user->name;
    }
    else {
        $userName = null;
    }

    return view('pages.combat')->with([
        'user' => $user,
        'userName' => $userName,
    ]);
});


Route::match('get', 'login', function(){
    return view('errors.404');
})->middleware('auth');


Route::match('get', 'password/reset', function(){
    return view('errors.404');
});