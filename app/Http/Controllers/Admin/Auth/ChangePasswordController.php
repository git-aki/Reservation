<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;


class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('verified');
    }
    public function showChangePasswordForm()
    {
        return view('admin.auth.passwords.change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        //パスワード変更の処理
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        // パスワード変更処理後、homeにリダイレクト
        return redirect()->route('admin.index')->with('status', __('Your password has been changed.'));
    }
}
