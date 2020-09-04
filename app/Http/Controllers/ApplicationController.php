<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Ticket;
use App\Models\A;
use App\Models\B;
use App\Models\C;
use App\Models\D;
use App\Models\E;
use App\Mail\SendTest;
use Illuminate\Support\Facades\Mail;
use Validator;
use DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.application');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**
        *validate field and store in DB
        *
        */
        $this->validate($request,[
            'InputName' => 'required',
            'InputPhone' => 'required',
            'InputCredit' => 'required',
            'InputContactTime' => 'required',
            'InputLocation' => 'required'
        ]);

        $Application = new Application;
        $Application->name = $request->input('InputName');
        $Application->phone = $request->input('InputPhone');
        $Application->line = $request->input('InputLineID');
        $Application->location = $request->input('InputLocation');
        $Application->reason = $request->input('InputReason');
        $Application->amount = $request->input('InputCredit');
        $Application->contact_time = $request->input('InputContactTime');

        $Application->save();

        $params = [
            'name' => $Application->name,
            'phone' => $Application->phone,
            'line' => $Application->phone,
            'location' => $Application->location,
            'reason' => $Application->reason,
            'amount' => $Application->amount,
            'contact_time' => $Application->contact_time,
        ];
        
        $tickets = DB::table('ticket')
            ->where('expiry' , '>' , date('Y-m-d'))
            ->where('checkin', '1')
            ->get();


        $mails = [];
        $ua = [];
        if($Application->location == "台北基隆")
        {
            $A = new A;
            $A = $A->all();
            foreach ($A as $key => $A)
            {
                $ua['email'] = $A->email;
                $ua['name'] = 'NO';
                $mails[$key] = (object)$ua;
            }
        }

        if($Application->location == "桃竹苗")
        {
            $B = new B;
            $B = $B->all();
            foreach ($B as $key => $B)
            {
                $ua['email'] = $B->email;
                $ua['name'] = 'NO';
                $mails[$key] = (object)$ua;
            }
        }

        if($Application->location == "中彰投")
        {
            $C = new C;
            $C = $C->all();
            foreach ($C as $key => $C)
            {
                $ua['email'] = $C->email;
                $ua['name'] = 'NO';
                $mails[$key] = (object)$ua;
            }
        }

        if($Application->location == "雲嘉南")
        {
            $D = new D;
            $D = $D->all();
            foreach ($D as $key => $D)
            {
                $ua['email'] = $D->email;
                $ua['name'] = 'NO';
                $mails[$key] = (object)$ua;
            }
        }

        if($Application->location == "高屏")
        {
            $E = new E;
            $E = $E->all();
            foreach ($E as $key => $E)
            {
                $ua['email'] = $E->email;
                $ua['name'] = 'NO';
                $mails[$key] = (object)$ua;
            }
        }

        return $mails; 
        Mail::bcc($mails)->send(new SendTest($params));
        return redirect('/');
    }

    public function apistore(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'location' => 'required',
            'contact_time' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $Application = Application::create($request->all());

        /**
        *Find Valide Ticket and prepare to send
        *
        */

        $tickets = DB::table('ticket')
            ->where('expiry' , '>' , date('Y-m-d'))
            ->where('checkin', '1')
            ->get();
        $mails = [];

        foreach ($tickets as $key => $ticket)
        {
            $ua = [];
            $isfind = false;
            $location = explode(',' ,$ticket->location);

            for ($i=0; $i < sizeof($location) ; $i++) { 
                if ($location[$i] == $Application->location)
                {
                    $isfind = true;
                    break;
                }
            }

            if ($isfind == true)
            {
                $uid = $ticket->uid;
                $user = User::where('id', $uid)->first();
                $ua['email'] = $user->email;
                $ua['name'] = $user->name;
                $mails[$key] = (object)$ua;
            }            
        }

        $params = [
            'name' => $Application->name,
            'phone' => $Application->phone,
            'line' => $Application->phone,
            'location' => $Application->location,
            'reason' => $Application->reason,
            'amount' => $Application->amount,
            'contact_time' => $Application->contact_time,
        ];

        Mail::bcc($mails)->send(new SendTest($params));
        
        return response()->json($Application, 201);
    }
}
