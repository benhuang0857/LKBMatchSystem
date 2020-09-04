<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $data = [
            'email' => $user->email,
            'phone' => $user->phone,
            'password' => $user->password,
        ];

        return view('backend.userinfo')->with($data);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $this->validate($request,[
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect('/admin');
    }
}
