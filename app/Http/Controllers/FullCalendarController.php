<?php

namespace App\Http\Controllers;


use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Event;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('manage_users');
        if($request->ajax())
        {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title','client_id','user_id', 'start', 'end']);
            return response()->json($data);
        }
       return view('calender.index');
    }

    public function clients(Request $request)
    {
        if($request->ajax())
        {
            $data = Clients::get(['id', 'name']);
            return response()->json($data);
        }
    }


    public function specialists(Request $request)
    {
        if($request->ajax())
        {
            $data = User::get(['id', 'name']);
            return response()->json($data);
        }
    }



    public function action(Request $request)
    {

        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $event = Event::create([
                    'title'		=>	$request->title,
                    'client_id' =>  $request->client_id,
                    'user_id'   =>  $request->user_id,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'update')
            {
                $event = Event::find($request->id)->update([
                    'start'		=>	$request->start,
                    'end'		=>	$request->end,
                    'title'		=>	$request->title
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {
                $event = Event::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }
}
