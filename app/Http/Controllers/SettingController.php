<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangeUsernameRequest;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except(['index', 'showChangeEmailForm', 'chageEmail']);
    }

    public function index()
    {
        $auth = Auth::user();
        return view('setting\index', ['auth' => $auth]);
    }

    public function showChangeNameForm()
    {
        $auth = Auth::user();
        return view('setting\name', ['auth' => $auth]);
    }

    public function changeName(ChangeNameRequest $request)
    {
        //ValidationはChangeNameRequestで処理
        //氏名変更処理
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->save();

        //homeにリダイレクト
        return redirect()->route('setting')->with('status', __('Your name has been changed'));
    }

    public function showChangeEmailForm()
    {
        $auth = Auth::user();
        return view('setting\email', ['auth' => $auth]);
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        //ValidationはChangeEmailRequestで処理
        //メールアドレス変更処理
        $user = Auth::user();

        if ($user->email == $request->get('email')){
            return redirect()->route('setting')->with('status', __('Your email address has been changed.'));
        }

        $user->email = $request->get('email');
        $user->email_verified_at = null;
        $user->save();
        $user->sendEmailVerificationNotification();

        //homeにリダイレクト
        return redirect()->route('setting')->with('status', __('A confirmation email for changing the email address has been sent.'));
    }

    public function showChangeUsernameForm()
    {
        $auth = Auth::user();
        return view('setting\username', ['auth' => $auth]);
    }

    public function changeUsername(ChangeUsernameRequest $request)
    {
        //ValidationはChangeEmailRequestで処理
        //ユーザー名変更処理
        $user = Auth::user();
        $user->username = $request->get('username');
        $user->save();

        //homeにリダイレクト
        return redirect()->route('setting')->with('status', __('Your Username has been changed'));
    }

}
