@extends('layouts.navigation')
@section('combat')
    <div class='combat-container'>
        <table class='combat-table' align='left'>
            <tr>
                <th colspan='5' class='combat-table-heading'>Active Characters</th>
            </tr>
            <tr class='table-heading'>
                <th>Name</th>
                <th>Race</th>
                <th>Class</th>
                <th>Max Hp</th>
                <th>Current Hp</th>
            </tr>
            @foreach($characters as $character)
                <tr>
                    <th>{{ $character->name }}</th>
                    <th>{{ $character->race }}</th>
                    <th>{{ $character->class }}</th>
                    <th>{{ $character->max_hp }}</th>
                    <th>{{ $character->current_hp }}</th>
                </tr>
            @endforeach
        </table>
        <div align='center' class='combat-form'>
            <form method='POST' action='/combat'>
                {{ csrf_field() }}
                <select name='attacker'>
                    @foreach($characters as $character)
                        <option value='{{ $character->id }}'
                            @if($character->id == old('attacker')) selected @endif>
                            {{ $character->name }}
                        </option>
                    @endforeach
                    @foreach($enemies as $enemy)
                        <option value='{{ $enemy->id }}'
                            @if($enemy->id == old('attacker')) selected @endif>
                            {{ $enemy->name }}
                        </option>
                    @endforeach
                </select>
                attacks
                <select name='defender'>
                    @foreach($characters as $character)
                        <option value='{{ $character->id }}'
                            @if($character->id == old('defender')) selected @endif>
                            {{ $character->name }}
                        </option>
                    @endforeach
                    @foreach($enemies as $enemy)
                        <option value='{{ $enemy->id }}'
                            @if($enemy->id == old('defender')) selected @endif>
                            {{ $enemy->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <br>
                <input type='submit' value='Confirm'>
            </form>
        </div>
        <table class='combat-table' align='right'>
            <tr>
                <th colspan='5' class='combat-table-heading'>Active Enemies</th>
            </tr>
            <tr class='table-heading'>
                <th>Name</th>
                <th>Race</th>
                <th>Class</th>
                <th>Max Hp</th>
                <th>Current Hp</th>
            </tr>
            @foreach($enemies as $enemy)
                <tr>
                    <th>{{ $enemy->name }}</th>
                    <th>{{ $enemy->race }}</th>
                    <th>{{ $enemy->class }}</th>
                    <th>{{ $enemy->max_hp }}</th>
                    <th>{{ $enemy->current_hp }}</th>
                </tr>
            @endforeach
        </table>
    </div>
    <div align='center'>
        {!! $message !!}
    </div>
@endsection