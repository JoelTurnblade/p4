@extends('layouts.master')
@section('login-panel')
    <div class='heading'>
        @if(isset($user))
            <form class='right' method='POST' id='logout' action='/logout'>
                {{ csrf_field() }}
                <input class='button' type='submit' value='logout'>
            </form>
            <div class='welcome-user'>Welcome: <br> {{ $userName }}</div>
        @else
            <form method='GET' id='register' action='/register'>
                {{ csrf_field() }}
                <div class='right container'>
                    <input class='button' type='submit' value='register'>
                </div>
            </form>
            <form method='POST' id='login' action='/login'>
                {{ csrf_field() }}
                <div class='right container'>
                    <input class='button' type='submit' value='login'>
                </div>
                <div class='right container'>
                    <input name='email' placeholder='email' size='25' value='{{ old('email') }}'>
                    <br>
                    <input name='password' type='password' placeholder='password' size='25'>
                    <br>
                    @if(!empty(old('email'))) <div class='login-fail'>Login Failed</div> @endif
                </div>
            </form>
        @endif
    </div>
    @if(isset($user))
        @yield('navigation')
    @endif
@endsection

