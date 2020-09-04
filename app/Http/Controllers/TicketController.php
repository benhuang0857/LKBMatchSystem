<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\Ticket;
use App\Models\A;
use App\Models\B;
use App\Models\C;
use App\Models\D;
use App\Models\E;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {      
        $userID = auth()->user()->id;
        $tickets = Ticket::where('who', $userID)->orderBy('created_at', 'desc')->get();

        $user = User::all();

        return view('backend.ticketlist', compact('tickets', 'user'));
    }

    public function list_all()
    {      
        $tickets = Ticket::orderBy('created_at', 'desc')->get();

        $user = User::all();

        return view('backend.ticketlistall', compact('tickets', 'user'));
    }

    public function show()
    {
        $userID = auth()->user()->id;
        $tickets= Ticket::where('uid',$userID)->orderBy('created_at', 'desc')->get();

        return view('backend.ticketcart')->with('tickets', $tickets);
    }

    public function create(Request $request, $id)
    {
        $whoID = auth()->user()->id;
        $id = $id;
        $user = User::find($id);
        //count locations
        $locNumber = count($request['calculator']);
        //cal price
        $price = $locNumber*$request['buy-month']*1500;

        $ticket = new Ticket;
        $ticket->uid = $id;
        $ticket->who = $whoID;
        /*2020/06/01*/
        $ticket->email = $user->email;
        /**---*/
        $ticket->location = implode(',',$request['calculator']);
        $ticket->buy_month = $request['buy-month'];
        $ticket->price = $price;
        $ticket->checkin = 0;
        $ticket->fivecode = '-1';
        $ticket->expiry = date('Y-m-d', strtotime(' +'.$request['buy-month'].' month'));
        $ticket->save();

        $user->ticket_id = $ticket->id;
        $user->save();

        /*2020/06/01*/
        $locations = explode(',' ,$ticket->location);

        foreach ($locations as $loc)
        {
            $A = new A;
            $B = new B;
            $C = new C;
            $D = new D;
            $E = new E;

            if ($loc == "台北基隆")
            {
                $A->email = $ticket->email;
                $A->save();
            }

            if ($loc == "桃竹苗")
            {
                $B->email = $ticket->email;
                $B->save();
            }

            if ($loc == "中彰投")
            {
                $C->email = $ticket->email;
                $C->save();
            }

            if ($loc == "雲嘉南")
            {
                $D->email = $ticket->email;
                $D->save();
            }

            if ($loc == "高屏")
            {
                $E->email = $ticket->email;
                $E->save();
            }
        }

        return redirect('/admin/user/list')->with('success', '創建成功');
    }

    public function edit($id)
    {
        $ticket= Ticket::where('id', $id)->first(); 
        $ticketUID = $ticket->uid;
        $user = User::where('id', $ticketUID)->first();

        return view('backend.ticketedit', compact('ticket', 'user'));
    }

    public function update(Request $request, $id)
    {
        $ticket= Ticket::find($id);

        $ticket->checkin = $request['InputOK'];

        if (!isset($request['Inputfivecode']))
        {
            $ticket->fivecode = '-1';
        }
        else
        {
            $ticket->fivecode = $request['Inputfivecode'];
        }

        $ticket->save();

        return redirect('/admin/ticket/list')->with('success', '通知成功');
    }

    public function destroy($id)
    {
        $ticket= Ticket::find($id);
        $ticketUID = $ticket->uid;
        $user = User::where('id', $ticketUID)->first();
        
        if (!isset($user))
        {
            $ticket->delete();
            return redirect('/admin/ticket/list')->with('success', '修改成功');
        }

        if (!isset($ticket) && !isset($user))
        {
            return redirect('/admin/ticket/list')->with('error', '修改失敗');
        }

        $A = new A;
        $B = new B;
        $C = new C;
        $D = new D;
        $E = new E;

        $A->where('email', $ticket->email)->delete();
        $B->where('email', $ticket->email)->delete();
        $C->where('email', $ticket->email)->delete();
        $D->where('email', $ticket->email)->delete();
        $E->where('email', $ticket->email)->delete();

        $ticket->delete();
        $user->ticket_id = 0;
        $user->save();
        
        return redirect('/admin/ticket/list')->with('success', '修改成功');
    }

    /**
     * Here is for normal customer 
     */
    public function customerSetFiveCode($id)
    {
        $ticket= Ticket::find($id);  
        return view('backend.customer_respose')->with('ticket', $ticket);
    }

    public function customer_update(Request $request, $id)
    {
        $ticket= Ticket::find($id);

        if (!isset($request['Inputfivecode']))
        {
            $ticket->fivecode = '-1';
        }
        else
        {
            $ticket->fivecode = $request['Inputfivecode'];
        }

        $ticket->save();

        return redirect('/admin/ticket/cart')->with('success', '通知成功');
    }
}
