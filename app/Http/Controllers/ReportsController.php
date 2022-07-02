<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Event;
use App\Models\Reports;
use App\Models\User;
use Carbon\Carbon;
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
        /*if(empty($request->input("user")) && empty($request->input("client")))
        {
            return redirect()->back();
        } */

        /* $reports = Event::where('user_id',$request->input('user'))
            ->orWhere('client_id',$request->input('client'));
        */

        $reports = new Event;
        if(!empty($request->input('from'))){
            $datefrom = Carbon::parse($request->input('from'));
            $reports = $reports->where('start','>=', $datefrom);
        }

        if(!empty($request->input('to'))){
            $dateto = Carbon::parse($request->input('to'));
            $reports = $reports->where('start','<=', $dateto);
        }

        if(!empty($request->input('user'))){
            $reports = $reports->where('user_id', $request->input('user'));
        }

        if(!empty($request->input('client'))){
            $reports = $reports->where('client_id', $request->input('client'));
        }

        $reports = $reports->get();


        return view('reports.index',
            [
                'reports'=> $reports,
                'users' =>User::all(),
                'clients' => Clients::all()
            ]
        );



    }
}
