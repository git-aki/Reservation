<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contactmail;

class ContactsController extends Controller
{
    public function contact()
    {
            return view('atlantis.contact');
    }
    public function back(Request $request)
    {
            return view('atlantis.contact', ['request' => $request]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'body' => 'required|string',
        ]);

        return view('atlantis.confirm', ['request' => $request]);
    }

    public function process(Request $request)
    {

        \Mail::to($request['email'])->send(new Contactmail($request));
        //メール受け取り処理

        return view('atlantis.process');
    }
}
