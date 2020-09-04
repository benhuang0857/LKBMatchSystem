<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\AD;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->user()->id;
        $users = User::where('who', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.userlist')->with('users', $users);
    }

    public function show($id)
    {
        $user = User::find($id);
        $ticketID = $user->ticket_id;
        $ticket = Ticket::find($ticketID);

        return view('backend.userbuyticket')->with('ticket',$ticket);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $page = Store::where('uid',$id);
        $ad = AD::where('uid',$id);
        
        if(isset($ad->image) && $ad->image != 'noimage.jpg'){
            Storage::delete('public/adimage/'.$ad->image);
        }

        if(isset($page->cover_image) && $page->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_image/'.$page->cover_image);
        }

        if(isset($page->logo_image) && $page->cover_image != 'noimage.jpg'){
            Storage::delete('public/logo_image/'.$page->logo_image);
        }

        $user->delete();
        $page->delete();
        $ad->delete();
        return redirect('/admin/user/list')->with('success', '刪除成功');
    }

    public function list_all()
    {
        if (auth()->user()->role != 'super')
        {
            return redirect()->back();
        }
        
        $users = User::all();

        return view('backend.userlistall')->with('users', $users);
    }
}
