@extends('layouts.navigation')
@section('sharing')
    <div class='table-container'>
        <table align='center'>
            <tr class='table-heading'>
                <th>Name</th>
                <th>Race</th>
                <th>Class</th>
                <th>Status</th>
                <th>Level</th>
                <th>Str</th>
                <th>Dex</th>
                <th>Con</th>
                <th>Int</th>
                <th>Wis</th>
                <th>Cha</th>
                <th>Character Code</th>
            </tr>
            @foreach($characters as $character)
                <tr>
                    <th>{{ $character->name }}</th>
                    <th>{{ $character->race }}</th>
                    <th>{{ $character->class }}</th>
                    <th>{{ $character->status }}</th>
                    <th>{{ $character->level }}</th>
                    <th>{{ $character->str }}</th>
                    <th>{{ $character->dex }}</th>
                    <th>{{ $character->con }}</th>
                    <th>{{ $character->int }}</th>
                    <th>{{ $character->wis }}</th>
                    <th>{{ $character->cha }}</th>
                    <th>{{ $character->sharing }}</th>
                </tr>
            @endforeach
        </table>
    </div>
    <div align='center' class='combat-container'>
        <table align='center' class='sharing-table'>
            <tr class='combat-table-heading'>
                <th>Connect Character to Account using Character Code</th>
            </tr>
            <tr>
                <th>
                    <form align='center' method='POST' action='/sharing'>
                        {{ csrf_field() }}
                        <input type='text' name='code' class='sharing-input'>
                        <br>
                        <div class='sharing-padding'>
                            <input type='submit' value='Link'>
                            <div class='font-small @if(!$success) red @endif'>
                                {!! $message !!}
                            </div>
                        </div>
                    </form>
                </th>
            </tr>
        </table>
    </div>
@endsection