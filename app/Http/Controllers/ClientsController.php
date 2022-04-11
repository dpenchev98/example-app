<?php

namespace App\Http\Controllers;


use App\Models\Clients;
use App\Models\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{

    public function index(){

        $this->authorize('manage_users');
        return view('clients.index',['clients'=>Clients::all()]);

    }

    public function add(){
        return view('clients.form');

    }

    public function show(Clients $client){

        return view('clients.show',['client'=>$client]);

    }

    public function create(Request $request) {
        //todo add validation

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required'

        ]);

        Clients::create([

            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'notes'=>$request->input('notes')
        ]);

        session()->flash('message','Успешно добавен клиент');

        return redirect('/clients');
    }

    public function edit(Clients $id){
        return view('clients.edit',['client'=>$id] );
    }

    public function editSave(){

    }

    public function update(Request $request, Clients $client){

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);

        $client->update([
            'name'=>$request->input('name'),
            'age'=>$request->input('age'),
            'gender'=>$request->input('gender'),
            'notes' => $request->input('notes')
        ]);

        session()->flash('message','Успешно редактиран клиент');
        return redirect('/clients');
    }


    public function delete(Clients $client){


        $client->delete(); //delete the client

        session()->flash('message','Успешно изтрит клиент');
        return redirect('/clients');

    }
}
