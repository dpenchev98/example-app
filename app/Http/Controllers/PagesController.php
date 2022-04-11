<?php

namespace App\Http\Controllers;


use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){

        $this->authorize('manage_users');
        return view('pages.index',['pages'=>Pages::all()]);

    }

    public function add(){
        return view('pages.form');

    }

    public function show(Pages $page){

        return view('pages.show',['page'=>$page]);
    }

    public function create(Request $request) {

        //todo add validation
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        Pages::create([

            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_by' => Auth::user()->id,
            'updated_by'=> Auth::user()->id

        ]);


        session()->flash('message','Успешно добавена страница');
        return redirect('/pages');


    }

    public function edit(Pages $id){
        return view('pages.edit',['page'=>$id] );
    }

    public function editSave(){

    }

    public function update(Request $request, Pages $page){

        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        $page->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'updated_by'=> Auth::user()->id
        ]);


        session()->flash('message','Успешно редактирана страница');
        return redirect('/pages');
    }


    public function delete(Pages $page){

        $page->delete(); //delete the page

        session()->flash('message','Успешно изтрита страница');
        return redirect('/pages');
    }
}

