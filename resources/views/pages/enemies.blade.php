@extends('layouts.navigation')
@section('enemies')
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
                <th>Max Hp</th>
                <th>Current Hp</th>
                <th>Gold</th>
                <th>Armor</th>
                <th>Armor AC<br>Bonus</th>
                <th>Weapon</th>
                <th>Ranged or<br>Melee</th>
                <th>Maximum Weapon<br>Damage</th>
                <th class='table-select-heading'>Select</th>
            </tr>
            @foreach($characters as $character)
                <tr>
                    <th id='{{ $character->id }}.1'>{{ $character->name }}</th>
                    <th id='{{ $character->id }}.2'>{{ $character->race }}</th>
                    <th id='{{ $character->id }}.3'>{{ $character->class }}</th>
                    <th id='{{ $character->id }}.4'>{{ $character->status }}</th>
                    <th id='{{ $character->id }}.5'>{{ $character->level }}</th>
                    <th id='{{ $character->id }}.6'>{{ $character->str }}</th>
                    <th id='{{ $character->id }}.7'>{{ $character->dex }}</th>
                    <th id='{{ $character->id }}.8'>{{ $character->con }}</th>
                    <th id='{{ $character->id }}.9'>{{ $character->int }}</th>
                    <th id='{{ $character->id }}.10'>{{ $character->wis }}</th>
                    <th id='{{ $character->id }}.11'>{{ $character->cha }}</th>
                    <th id='{{ $character->id }}.12'>{{ $character->max_hp }}</th>
                    <th id='{{ $character->id }}.13'>{{ $character->current_hp }}</th>
                    <th id='{{ $character->id }}.14'>{{ $character->gold }}</th>
                    <th id='{{ $character->id }}.15'>{{ $character->armor_name }}</th>
                    <th id='{{ $character->id }}.16'>{{ $character->armor_ac_bonus }}</th>
                    <th id='{{ $character->id }}.17'>{{ $character->weapon_name }}</th>
                    <th id='{{ $character->id }}.18'>
                        @if($character->ranged_weapon) {{ 'Ranged' }} @else {{ 'Melee' }} @endif
                    </th>
                    <th id='{{ $character->id }}.19'>{{ $character->weapon_max_dmg }}</th>
                    <th class='centered'>
                        <button class='table-button' onclick='populate("{{ $character->id }}")'></button>
                    </th>
                </tr>
            @endforeach
            <tr>
                <th colspan='1' class='table-blank-row'></th>
            </tr>
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
                <th>Max Hp</th>
                <th>Current Hp</th>
                <th>Gold</th>
                <th>Armor</th>
                <th>Armor AC<br>Bonus</th>
                <th>Weapon</th>
                <th>Ranged or<br>Melee</th>
                <th>Maximum Weapon<br>Damage</th>
            </tr>
            <form method='POST' action='/enemies' id='form'>
                {{ csrf_field() }}
                <tr>
                    <th>
                        <textarea id='name' name='name' rows='2' class='table-text-area'>{{ old('name') }}
                        </textarea>
                    </th>
                    <th>
                        <textarea id='race' name='race' rows='2' class='table-text-area'>{{ old('race') }}
                        </textarea>
                    </th>
                    <th>
                        <textarea id='class' name='class' rows='2' class='table-text-area'>{{ old('class') }}
                        </textarea>
                    </th>
                    <th>
                        <select id='status' name='status' size='3'>
                            <option value='Active'
                            @if((old('status') == 'Active')){{ 'selected' }}@endif>Active</option>
                            <option value='Inactive'
                            @if((old('status') == 'Inactive')){{ 'selected' }}@endif>Inactive</option>
                            <option value='Dead'
                            @if((old('status') == 'Dead')){{ 'selected' }}@endif>Dead</option>
                        </select>
                    </th>
                    <th>
                        <input id='level' name='level' type='text' class='table-text-box'
                               value='{{ old('level') }}'>
                    </th>
                    <th>
                        <input id='str' name='str' type='text' class='table-text-box'
                               value='{{ old('str') }}'>
                    </th>
                    <th>
                        <input id='dex' name='dex' type='text' class='table-text-box'
                               value='{{ old('dex') }}'>
                    </th>
                    <th>
                        <input id='con' name='con' type='text' class='table-text-box'
                               value='{{ old('con') }}'>
                    </th>
                    <th>
                        <input id='int' name='int' type='text' class='table-text-box'
                               value='{{ old('int') }}'>
                    </th>
                    <th>
                        <input id='wis' name='wis' type='text' class='table-text-box'
                               value='{{ old('wis') }}'>
                    </th>
                    <th>
                        <input id='cha' name='cha' type='text' class='table-text-box'
                               value='{{ old('cha') }}'>
                    </th>
                    <th>
                        <input id='max-hp' name='max-hp' type='text' class='table-text-box'
                               value='{{ old('max-hp') }}'>
                    </th>
                    <th>
                        <input id='current-hp' name='current-hp' type='text' class='table-text-box'
                               value='{{ old('current-hp') }}'>
                    </th>
                    <th>
                        <input id='gold' name='gold' type='text' class='table-text-box'
                               value='{{ old('gold') }}'>
                    </th>
                    <th>
                        <textarea id='armor' name='armor' rows='2' class='table-text-area'>{{ old('armor') }}
                        </textarea>
                    <th>
                        <input id='armor-ac-bonus' name='armor-ac-bonus' type='text' class='table-text-box'
                               value='{{ old('armor-ac-bonus') }}'>
                    </th>
                    <th>
                        <textarea id='weapon' name='weapon' cols='2' class='table-text-area'>{{ old('weapon')}}
                        </textarea>
                    </th>
                    <th>
                        <select id='ranged-or-melee' name='ranged-or-melee' size='2'>
                            <option value='TRUE'
                            @if((old('ranged-or-melee') == 'TRUE')){{ 'selected' }}@endif>Ranged</option>
                            <option value='FALSE'
                            @if((old('ranged-or-melee') == 'FALSE')){{ 'selected' }}@endif>Melee</option>
                        </select>
                    </th>
                    <th>
                        <input id='max-weapon-dmg' name='max-weapon-dmg' type='text' class='table-text-box'
                               value='{{ old('max-weapon-dmg') }}'>
                    </th>
                </tr>
                <tr>
                    <th colspan='19' class='table-blank-row-submit'>
                        <div class='navigation-container'>
                            <input type='hidden' id='id' name='id'>
                            <input type='hidden' id='opp' name='opp' value='save'>
                            <input type='submit' class='navigation border-white' value='Save'>
                            <button type='button' class='navigation border-white' onclick='deleteData()'>
                                Delete
                            </button>
                            <button type='button' class='navigation border-white' onclick='createData()'>
                                Create
                            </button>
                            <button type='button' class='navigation border-white' onclick='transferData()'>
                                Transfer to Characters
                            </button>
                        </div>
                    </th>
                </tr>
            </form>
        </table>
        @if($errors->any())
            @foreach ($errors->all() as $errorMessage)
                <li class='error'>{{ $errorMessage }}</li>
            @endforeach
        @endif
    </div>
@endsection