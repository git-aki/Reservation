<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Date;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except(['complete']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('atlantis.reservation');
    }

    public function complete(Request $request)
    {
        $request->validate([
            'room' => 'required|string',
            'check_in' => 'required|date|after:tomorrow',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer',
        ]); 

        $id = Auth::id();

        $room = $request->room;
        $start = strtotime($request->check_in); // 開始日時
        $end = strtotime($request->check_out) - (60*60*24); # 終了日時
        
        $dateList = range($start, $end, 60*60*24);

            //各部屋の予約数は5部屋までとする
            foreach($dateList as $date){
                $date = date('Y-m-d', $date);
                $count = Date::where('date', $date)->first();
                if(isset($count[$room])){
                    if($count[$room] >= 5){
                        return view('atlantis.reservation', ['count' => $count]);
                    } 
                }
            }

        foreach($dateList as $date){
            $date = date('Y-m-d', $date);
            $date_existence = Date::where('date', $date)->first();
            if(empty($date_existence)){
                Date::create([
                'date' => $date,
                $room => +1,
                ]);
            } else {
                $date_existence[$room] = $date_existence[$room]+1;
                $date_existence->save();
            }
        }

        Reservation::create([
            'users_id' => $id,
            'room' => $request->input('room'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
        ]);
        
        return view('atlantis.complete');
    }
}
