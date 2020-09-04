<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Application;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //Contrusctor

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $ticketID = auth()->user()->ticket_id;
        $ticket = Ticket::where('id', $ticketID)->first();
        $applications = NULL;

        if ($ticketID != 0)
        {  
            $TicketExpiry = $ticket->expiry;
            $TicketCreateDate = $ticket->created_at;
            $TicketLocation = $ticket->location;
            $TicketLocation = explode(',',$TicketLocation);

            $applications = Application::where('created_at', '>=', $TicketCreateDate)
            ->where(function($query) use($TicketLocation){
                foreach($TicketLocation as $Location)
                {
                    $query->orwhere('location','=', $Location);
                }
            })
            ->get();
        }

        return view('backend.index', compact('ticket', 'user', 'applications'));
    }

    public function list()
    {
        $ticketID = auth()->user()->ticket_id;
        $ticket = Ticket::where('id',$ticketID)->first();
        $applications = NULL;

        if($ticketID != 0 && $ticket->checkin != 0)
        {
            $TicketExpiry = $ticket->expiry;
            $TicketCreateDate = $ticket->created_at;
            $TicketLocation = $ticket->location;
            $TicketLocation = explode(',',$TicketLocation);

            $applications = Application::where('created_at', '>=', $TicketCreateDate)
            ->where(function($query) use($TicketLocation){
                foreach($TicketLocation as $Location)
                {
                    $query->orwhere('location','=', $Location);
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        }
        
        return view('backend.list')->with('applications', $applications);
    }

    public function list_all()
    {
        if (auth()->user()->role != 'super')
        {
            return redirect()->back();
        }

        $applications = Application::orderBy('created_at', 'desc')
        ->paginate(50);

        return view('backend.listall')->with('applications', $applications);
    }
}
