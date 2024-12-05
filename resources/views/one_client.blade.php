@extends('layouts.app')

@section('title', 'Таблица')

@section('css')
    <link rel="stylesheet" href="css/main.css">
@endsection

@section('content')
<table>
    <tr><td>Имя</td><td>Фамилия</td><td>Дата рождения</td><td>Телефон</td></tr>
    <tr><td>{{$info['first_name']}}</td>
    <td>{{$info['last_name']}}</td>
    <td>{{$info['birth_date']}}</td>
    <td>{{$info['phone_number']}}</td><tr>
</table>
@endsection