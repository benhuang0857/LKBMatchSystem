<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Middleware\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:super');
        $this->middleware('role:manager');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|min:10|max:10|unique:users,phone',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $userId = auth()->user()->id;
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->ticket_id = 0;
        $user->password = bcrypt($data['password']);
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->who = $userId;
                
        $user->save();
        return redirect('/admin/user/list')->with('success', '創建使用者成功');
    }
}
