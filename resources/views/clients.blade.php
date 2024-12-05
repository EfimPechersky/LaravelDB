@extends('layouts.app')

@section('title', 'Таблица')

@section('css')
    <link rel="stylesheet" href="css/main.css">
@endsection




@section('content')
        
<h>Клиенты</h>

<table>
<tr><td>Имя</td>
    <td>Фамилия</td>
    <td>Дата рождения</td>
    <td>Телефон</td></tr>
@foreach($info as $el)
    <tr><form action="/clients/change" method="POST">@csrf
    <td><input type="text" name="first_name" value="{{$el['firstname']}}"></td>
    <td><input type="text" name="last_name" value="{{$el['lastname']}}"></td>
    <td><input type="date" name="birth_date" value="{{$el['birthdate']}}"></td>
    <td><input type="text" name="phone_number" value="{{$el['phone']}}"></td>
    <td><input type="text" name="client_id" value="{{$el['client_id']}}" style="display:none"><input type="submit" value="Изменить"></form></td></td>
    </form>
    <td><form action="/clients/delete" method="POST">@csrf<input type="text" name="client_id" value="{{$el['client_id']}}" style="display:none"><input type="submit" value="Удалить"></form></td></tr>
@endforeach
<form action="/clients/store" method="POST">
@csrf
<tr><td><input type="text" name="first_name" class="@error('firstname') is-invalid @enderror" value="@if($errors->any()){{ old('firstname') }}@endif"></td>
<td><input type="text" name="last_name" class="@error('lastname') is-invalid @enderror" value="@if($errors->any()){{ old('lastname') }}@endif"></td>
<td><input type="date" name="birth_date" class="@error('birthdate') is-invalid @enderror" value="@if($errors->any()){{ old('birthdate') }}@endif"></td>
<td><input type="tel" name="phone_number" class="@error('phone') is-invalid @enderror" value="@if($errors->any()){{ old('phone') }}@endif"></td>
<td><input type="submit" value="Создать запись"></td><tr>
</table>
</form>
@endsection