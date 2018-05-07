@extends('layouts.master')
@section('register')
<div class='heading'></div>
<div class='register'>
    <form method='POST' action='/register'>

        {{ csrf_field() }}

        Name<br>
        <input id='name' type='text' name='name' size='35' value='{{ old('name') }}'>
        @if ($errors->has('name'))
            <div class='small-font red'>{{ $errors->first('name') }}</div>
        @else
            <div class='small-font'><br></div>
        @endif
        <br>

        Email<br>
        <input id='email' type='text' name='email' size='35' value='{{ old('email') }}'>
        @if ($errors->has('email'))
            <div class='small-font red'>{{ $errors->first('email') }}</div>
        @else
            <div class='small-font'><br></div>
        @endif
        <br>

        Password<br>
        <input id='password' type='password' name="password" size='35'>
        @if ($errors->has('password'))
            <div class='small-font red'>{{ $errors->first('password') }}</div>
        @else
            <div class='small-font'><br></div>
        @endif
        <br>

        Confirm Password<br>
        <input id='password-confirm' type='password' name='password_confirmation' size='35'>
        <br><br><br>

        <input type='submit' value='Register'>

    </form>
</div>
@endsection
