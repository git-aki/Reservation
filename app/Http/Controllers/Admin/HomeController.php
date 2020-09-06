<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Http\Request;
use App\Reservation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function redirectIndex()
    {
        return redirect(route('admin.index'));
    }

    public function index()
    {
        $reservations = Reservation::leftJoin('users', 'reservations.users_id', '=', 'users.id')
        ->select('reservations.id', 'reservations.users_id', 'users.name', 'reservations.room', 'reservations.check_in', 'reservations.check_out','reservations.adults', 'reservations.children', 'reservations.created_at', 'reservations.updated_at')
        ->paginate(10);

        return view('admin.index', ['reservations' => $reservations]);
    }

    public function all_reservation()
    {
        $reservations = Reservation::withTrashed()
        ->leftJoin('users', 'reservations.users_id', '=', 'users.id')
        ->select('reservations.id', 'reservations.users_id', 'users.name', 'reservations.room', 'reservations.check_in', 'reservations.check_out','reservations.adults', 'reservations.children', 'reservations.created_at', 'reservations.updated_at', 'reservations.deleted_at')
        ->paginate(10);

        return view('admin.index', ['reservations' => $reservations]);
    }

    public function acceptance(Request $request)
    {
        Reservation::find($request->id)->delete();

        return redirect(route('admin.index'));
    }

    public function user_search(Request $request)
    {
        $q = $request->input('q'); //フォームの入力値を取得

        //検索キーワードが空の場合
        if (empty($q)) {
            $users = User::paginate(10);  //全ユーザーを10件/ページで表示

        //検索キーワードが入っている場合
        } else {
            $_q = str_replace('　', ' ', $q);  //全角スペースを半角に変換
            $_q = preg_replace('/\s(?=\s)/', '', $_q); //連続する半角スペースは削除
            $_q = trim($_q); //文字列の先頭と末尾にあるホワイトスペースを削除
            $_q = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_q); //円マーク、パーセント、アンダーバーはエスケープ処理
            $keywords = array_unique(explode(' ', $_q)); //キーワードを半角スペースで配列に変換し、重複する値を削除

            $query = User::query();
            foreach($keywords as $keyword) {
                //1つのキーワードに対し、名前かメールアドレスのいずれかが一致しているユーザを抽出
                //キーワードが複数ある場合はAND検索
                $query->where(function($_query) use($keyword){
                    $_query->where('name', 'LIKE', '%'.$keyword.'%')
                           ->orwhere('email', 'LIKE', '%'.$keyword.'%');
                });
            }
            $users = $query->paginate(10); //検索結果のユーザーを10件/ページで表示
        }
        return view('admin.user_search', compact('users', 'q'));
    }
}