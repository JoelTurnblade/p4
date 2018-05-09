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

    return view('layouts.navigation')->with([
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
        })->get();

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

// Overrides the 'get' login route from Auth:routes()
// Source: https://stackoverflow.com/questions/42695917/laravel-5-4-disable-register-route
// @fixme: add link to readme file
Route::match('get', 'login', function(){
    return view('errors.404');
})->middleware('auth');

// Blocking out this page for now, might implement later
Route::match('get', 'password/reset', function(){
    return view('errors.404');
});

// Debug Section

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});


