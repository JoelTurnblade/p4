@extends('auth.login-panel')
@section('navigation')
    <div class='navigation-bar' align='center'>
        <form class='navigation-container' method='GET' id='characters' action='/characters'>
            <input class='navigation' type='submit' value='Characters'>
        </form>
        <form class='navigation-container' method='GET' id='enemies' action='/enemies'>
            <input class='navigation' type='submit' value='Enemies'>
        </form>
        <form class='navigation-container' method='GET' id='enemies' action='/combat'>
            <input class='navigation' type='submit' value='Combat'>
        </form>
    </div>
    @yield('characters')
    @yield('enemies')
    @yield('home')
    @yield('combat')
@endsection