<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){
        $this->authorize('manage_users');
        return view('users.index',['users'=>User::all()]);

    } //

    public function add(){
        return view('users.form');
    }

    public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        session()->flash('message','Успешно добавен потребител');

        return redirect('/users');
    }

    public function edit(User $id){
        return view('users.edit',['user'=>$id] );
    }

    public function updateProfile(Request $request, User $user){

        $request->validate([
            'name' => 'required'
        ]);

        $user->update([
            'name'=>$request->input('name')
        ]);

        return redirect('/users');
    }


    public function updateEmail(Request $request, User $user){

        $request->validate([
            'email' => 'required'
        ]);

        $user->update([
            'email'=>$request->input('email')
        ]);

        return redirect('/users');
    }

    public function updatеPassword(Request $request, User $user){

        $request->validate([
            'password' => 'required',
            'new_password'=>'required|min:8|max:255'
        ]);

        $user->update([
            'password'=>$request->input('password'),
            'new_password' => $request->input('new_password')
        ]);

        return redirect('/users');
    }




        public function delete(User $user){
        $user->delete(); //delete the user

        session()->flash('message','Успешно изтрит клиент');
        return redirect('/users');

    }


   public function passwordForm(){

       return view('changepassword');

   } //

    public function changePassword(Request $request){

        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8|max:255',
            'new_password_confirmation' => 'required|same:new_password'
        ]);


        if(Hash::check($request->input('password'),Auth::user()->password)){
            Auth::user()->update(['password'=>bcrypt($request->input('new_password'))]);
        }



        session()->flash('message','Успешно сменена парола');
        return redirect('/changepassword');

    }



}


