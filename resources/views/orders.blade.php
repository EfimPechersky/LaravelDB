@extends('layouts.app')

@section('title', 'Таблица')

@section('css')
    <link rel="stylesheet" href="css/main.css">
@endsection




@section('content')
<datalist id="client_ids">

</datalist>
<h>Заказы</h>

<table>
<tr><td>Продукт</td>
    <td>Цена(USD)</td>
    <td>Клиент</td>
    <td>Дата</td></tr>
@foreach($info as $el)
    <tr><form action="/orders/change" method="POST">@csrf
    <td><input type="text" name="product_name" value="{{$el['product_name']}}"></td>
    <td><input type="text" name="price_usd" value="{{$el['price_usd']}}"></td>
    <td><select name='client_id' value="{{$el['client_id']}}">
        @foreach($cids as $cid)
            <option value="{{$cid['client_id']}}">{{$cid['client_id']}}</option>
        @endforeach
    </select></td>
    <td><input type="date" name="order_date" value="{{$el['order_date']}}"></td>
    <td><input type="text" name="order_id" value="{{$el['order_id']}}" style="display:none"><input type="submit" value="Изменить"></form></td></td>
    </form>
    <td><form action="/orders/delete" method="POST">@csrf<input type="text" name="order_id" value="{{$el['order_id']}}" style="display:none"><input type="submit" value="Удалить"></form></td></tr>
@endforeach
<form action="/orders/store" method="POST">@csrf
<tr>
    <td><input type="text" name="product_name"></td>
    <td><input type="text" name="price_usd"></td>
    <td><select name='client_id' list="client_ids"> 
        <option value="None">Выберите клиента</option>>
        @foreach($cids as $cid)
            <option value="{{$cid['client_id']}}">{{$cid['client_id']}}</option>
        @endforeach
    </select></td>
    <td><input type="date" name="order_date" ></td>
    <td><input type="text" name="order_id" style="display:none"><input type="submit" value="Добавить"></form></td></td>
</tr>
</form>
</table>



@endsection