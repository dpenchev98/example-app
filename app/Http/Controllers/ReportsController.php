<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Event;
use App\Models\Reports;
use App\Models\User;
use Facade\FlareClient\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $this->authorize('manage_users');
        return view('reports.index',
            [
                'reports'=>Reports::all(),
                'users' =>User::all(),
                'clients' => Clients::all()
            ]
        );
    }

    public function search(Request $request)
    {
        if(empty($request->input("user")) && empty($request->input("client")))
        {
            return redirect()->back();
        }

        $reports = Event::where('user_id',$request->input('user'))
            ->orWhere('client_id',$request->input('client'))
            ->get();


        return view('reports.index',
            [
                'reports'=> $reports,
                'users' =>User::all(),
                'clients' => Clients::all()
            ]
        );



    }
}
