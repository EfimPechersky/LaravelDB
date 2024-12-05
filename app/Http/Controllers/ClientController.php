<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'phone_number' => ['required','min:11','numeric'],
            'birth_date'=>['required','date_format:Y-m-d']
        ]);
        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->birth_date = $request->birth_date;
        $client->phone_number = $request->phone_number;

        $client->save();

        return redirect('/clients');
    }

    public function get_clients(){
        
        $info=[];
        foreach (Client::all() as $client) {
            $info[]=['client_id'=>$client->id,
            'firstname'=>$client->first_name,
            'lastname'=>$client->last_name,
            'phone'=>$client->phone_number,
            'birthdate'=>$client->birth_date];
        }
        return view('clients', ['info'=>$info]);
    }

    public function delete_client(Request $request){
        $client = Client::find($request->client_id);

        $client->delete();
        return redirect('/clients');
    }
    public function change_client(Request $request){
        $client = Client::find($request->client_id);
        $request->validate([
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'phone_number' => ['required','min:11','numeric'],
            'birth_date'=>['required','date_format:Y-m-d']
        ]);
        $client->update(['first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'birth_date'=>$request->birth_date,
        'phone_number'=>$request->phone_number]);
        return redirect('/clients');
    }
}
