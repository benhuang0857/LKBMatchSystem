<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTest;

class TestController extends Controller
{
    public function send()
    {
        // 收件者務必使用 collect 指定二維陣列，每個項目務必包含 "name", "email"
        $to = collect([
            ['name' => 'Jason', 'email' => 'king810406@gmail.com']
        ]);
 
        // 提供給模板的參數
        $params = [
            'say' => '您好，這是一段測試訊息的內容'
        ];
 
        // 若要直接檢視模板
        // echo (new Warning($data))->render();die;
 
        Mail::to($to)->send(new SendTest($params));
    }
}
