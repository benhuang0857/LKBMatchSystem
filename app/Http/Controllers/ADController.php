<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\Store;
use App\Models\AD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ADController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;
        $ad = DB::table('ads')->where('uid',$userID)->get();

        return view('backend.adlist')->with('ad', $ad);
    }

    public function create()
    {
        $userID = Auth::user()->id;
        $storePage = Store::where('uid', $userID)->first();
        if($storePage == NULL)
        {
            return redirect('/admin/storepage')->with('warning', '請先創建公司介紹頁面，已轉跳，直接點擊下方「創建公司介紹頁面」按鈕');
        }
        return view('backend.adcreate');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'InputTitle' => 'required|max:200',
            'InputBody' => 'required|max:600',
            'adimage' => 'image|nullable|max:1999',
        ]);

        //Handle File Upload
        if($request->has('adimage'))
        {
            $filenameWithExt = $request->file('adimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('adimage')->getClientOriginalExtension();
            $imgfileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('adimage')->storeAs('public/adimage', $imgfileNameToStore);
        }
        else
        {
            $imgfileNameToStore = 'noimage.jpg';
        }
        
        // Create
        $AD = new AD;
        $userID = Auth::user()->id;
        $page = Store::where('uid', $userID)->first();

        $AD->uid = $userID;
        $AD->title = $request->input('InputTitle');
        $AD->body = $request->input('InputBody');
        $AD->route = $page->title.'/'.$AD->title.'_'.time();
        $AD->image = $imgfileNameToStore;
        $AD->save();
        
        return redirect('/admin/ads')->with('success', '創建成功');
    }

    public function edit($id)
    {
        $ad = AD::find($id);

        if (!isset($ad)){
            return redirect('/admin/ads')->with('error', '找不到該頁面');
        }

        return view('backend.adedit')->with('ad', $ad);
    }

    public function update(Request $request, $id)
    {
        $ad = AD::find($id);

        if($request->hasFile('adimage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('adimage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('adimage')->getClientOriginalExtension();
            // Filename to store
            $imgfileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('adimage')->storeAs('public/adimage', $imgfileNameToStore);
            // Delete file if exists
            Storage::delete('public/adimage/'.$ad->image);
        }

        $ad->title = $request->input('InputTitle');
        $ad->body = $request->input('InputBody');

        if($request->hasFile('adimage')){
            $ad->image = $imgfileNameToStore;
        }

        $ad->save();
        return redirect('/admin/ads')->with('success', '更新成功');
        
    }

    public function destroy($id)
    {
        $ad = AD::find($id);

        if (!isset($ad)){
            return redirect('/admin/ads')->with('error', 'No page Found');
        }

        if(auth()->user()->id !==$ad->uid){
            return redirect('/admin/ads')->with('error', 'Unauthorized Page');
        }
        
        if($ad->image != 'noimage.jpg'){
            Storage::delete('public/adimage/'.$ad->image);
        }

        $ad->delete();
        return redirect('/admin/ads')->with('success', '刪除成功');
    }
}
