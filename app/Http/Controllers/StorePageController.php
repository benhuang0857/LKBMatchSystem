<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\AD;

class StorePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $adPage = DB::table('adpages')->where('uid',$userID)->first();

        if (isset($adPage))
        {
            $data = [
                'id' => $adPage->id,
                'url' => $adPage->route,
                'title' => $adPage->title,
                'style' => 'opacity: 0.5; pointer-events: none;',
            ];
        }
        else
        {
            $data = [
                'id' => '',
                'url' => '',
                'title' => '',
                'style' => '',
            ];
            
        }
        
        return view('backend.storepages')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = Auth::user()->id;
        $adPage = DB::table('adpages')->where('uid',$userID)->first();

        if (isset($adPage))
        {
            return redirect()->back();
        }
        else
        {
            return view('backend.storecreatepages');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'InputTitle' => 'required|max:200',
            'InputURL' => 'required|max:200',
            'InputBody' => 'required|max:600',
            'cover_image' => 'image|nullable|max:1999',
            'logo_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->has('cover_image'))
        {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $coverimgfileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_image', $coverimgfileNameToStore);
        }
        else
        {
            $coverimgfileNameToStore = 'noimage.jpg';
        }

        //Handle File Upload
        if($request->has('logo_image'))
        {
            $filenameWithExt = $request->file('logo_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            $logoimgfileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('logo_image')->storeAs('public/logo_image', $logoimgfileNameToStore);
        }
        else
        {
            $logoimgfileNameToStore = 'noimage.jpg';
        }
        
        // Create page
        $page = new Store;
        $userID = Auth::user()->id;
        $page->uid = $userID;
        $page->title = $request->input('InputTitle');
        $page->route = $request->input('InputURL');
        $page->body = $request->input('InputBody');
        $page->service = implode(',',$request['service']);
        $page->email = $request->input('InputEmail');
        $page->phone = $request->input('InputPhone');
        $page->location = $request->input('InputLocation');
        $page->cover_image = $coverimgfileNameToStore;
        $page->logo_image = $logoimgfileNameToStore;

        try {
            $page->save();
        } catch (QueryException $e) {

            return redirect('/admin/storepage')->with('error', 'URL已經有其他商家使用，或是您用了其他非法字元(例如:\/.)，因此創建失敗');
        }
        
        
        return redirect('/admin/storepage')->with('success', '創建成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $store = Store::where('route',$url)->firstOrFail();
        $uid = $store->uid;
        //return $uid;
        $ad = AD::where('uid', $uid)->get();
        
        return view('front.storepage' , compact('store', 'ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Store::find($id);

        if (!isset($page)){
            return redirect('/admin/storepage')->with('error', '找不到頁面');
        }

        return view('backend.storeeditpages')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Store::find($id);

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $coverfileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $coverfileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_image/'.$page->cover_image);
        }

        if($request->hasFile('logo_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            // Filename to store
            $logofileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo_image')->storeAs('public/logo_image', $logofileNameToStore);
            // Delete file if exists
            Storage::delete('public/logo_image/'.$page->logo_image);
        }

        $page->title = $request->input('InputTitle');
        $page->body = $request->input('InputBody');

        if($request->hasFile('cover_image')){
            $page->cover_image = $coverfileNameToStore;
        }

        if($request->hasFile('logo_image')){
            $page->logo_image = $logofileNameToStore;
        }

        $page->save();
        return redirect('/admin/storepage')->with('success', '更新成功');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Store::find($id);

        if (!isset($page)){
            return redirect('/admin/adpage')->with('error', 'No page Found');
        }

        if(auth()->user()->id !==$page->uid){
            return redirect('/admin/adpage')->with('error', 'Unauthorized Page');
        }
        
        if($page->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_image/'.$page->cover_image);
        }

        if($page->logo_image != 'noimage.jpg'){
            Storage::delete('public/logo_image/'.$page->logo_image);
        }

        $page->delete();
        return redirect('/admin/storepage')->with('success', '刪除成功');
    }
}
