<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Date;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Reservation::where('users_id', Auth::id())->count();//予約数の確認

        $reservations = Reservation::where('users_id', Auth::id())//予約データの取得
               ->orderBy('check_in', 'asc')
               ->get();



        $counta = 1; //予約件数カウント用変数

        if($count == 0){
            return view('atlantis.home', ['not' => '予約がありません。']);
        } else {
            return view('atlantis.home', ['reservations' => $reservations, 'counta' => $counta]);
        }
    }
    public function delete(Request $request)
    {
        $reservation = Reservation::where('id', $request->id)->first();
        Reservation::find($request->id)->forceDelete();

        
        $room = $reservation->room;
        $start = strtotime($reservation->check_in); // 開始日時
        $end = strtotime($reservation->check_out) - (60*60*24); # 終了日時
        
        $dateList = range($start, $end, 60*60*24);
        
        foreach($dateList as $date){
            $date = date('Y-m-d', $date);
            $date_update = Date::where('date', $date)->first();
                $date_update[$room] = $date_update[$room]-1;
                $date_update->save();
        }

        return view('atlantis.delete');
    }
}
