<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;
class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required','string'],
            'price_usd' => ['required','numeric'],
            'client_id' => ['required','numeric'],
            'order_date'=>['required','date_format:Y-m-d']
        ]);
        $order = new Order;
        $order->product_name = $request->product_name;
        $order->price_usd = $request->price_usd;
        $order->client_id = $request->client_id;
        $order->order_date = $request->order_date;

        $order->save();

        return redirect('/orders');
    }

    public function get_orders(){
        $cids=[];
        foreach (Client::all() as $client) {
            $cids[]=['client_id'=>$client->id];
        }
        $info=[];
        foreach (Order::all() as $order) {
            $info[]=['order_id'=>$order->id,
            'product_name'=>$order->product_name,
            'price_usd'=>$order->price_usd,
            'client_id'=>$order->client_id,
            'order_date'=>$order->order_date];
        }
        return view('orders', ['info'=>$info, 'cids'=>$cids]);
    }

    public function delete_order(Request $request){
        $order = Order::find($request->order_id);

        $order->delete();
        return redirect('/orders');
    }
    public function change_order(Request $request){
        $order = Order::find($request->order_id);
        $request->validate([
            'product_name' => ['required','string'],
            'price_usd' => ['required','numeric'],
            'client_id' => ['required','numeric'],
            'order_date'=>['required','date_format:Y-m-d']
        ]);
        $order->update(['product_name'=>$request->product_name,
        'price_usd'=>$request->price_usd,
        'client_id'=>$request->client_id,
        'order_date'=>$request->order_date]);
        return redirect('/orders');
    }
}
