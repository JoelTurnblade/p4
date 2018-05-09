@extends('auth.login-panel')
@section('navigation')
    <div class='navigation-bar' align='center'>
        <form class='navigation-container' method='GET' action='/characters'>
            <input class='navigation' type='submit' value='Characters'>
        </form>
        <form class='navigation-container' method='GET' action='/enemies'>
            <input class='navigation' type='submit' value='Enemies'>
        </form>
        <form class='navigation-container' method='GET' action='/combat'>
            <input class='navigation' type='submit' value='Combat'>
        </form>
        <form class='navigation-container' method='GET' action='/sharing'>
            <input class='navigation' type='submit' value='Sharing'>
        </form>
    </div>
    @yield('characters')
    @yield('enemies')
    @yield('home')
    @yield('combat')
    @yield('sharing')
@endsection