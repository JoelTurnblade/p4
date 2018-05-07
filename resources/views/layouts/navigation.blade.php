@extends('auth.login-panel')
@section('navigation')
    <div class='navigation-bar border white' align='center'>
        <form class='navigation-container' method='GET' id='characters' action='/characters'>
            <input class='navigation' type='submit' value='Characters'>
        </form>
    </div>
    @yield('characters')
@endsection