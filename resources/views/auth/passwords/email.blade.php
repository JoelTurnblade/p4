@extends('layouts.master')

@section('content')
<div class='heading'></div>
<div class='register'>
    <form method="POST" action="{{ route('password.email') }}">

        {{ csrf_field() }}

        Email Address<br>
        <input id='email' name='email' type='text' size='35' value='{{ old('email') }}'>
        @if ($errors->has('email'))
            <div class='small-font red'>{{ $errors->first('email') }}</div>
        @else
            <div class='small-font'><br></div>
        @endif
        <br>

        <input type='submit' value='Send Password Reset Link'>

    </form>
</div>
@endsection