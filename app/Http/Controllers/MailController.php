<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

class MailController extends Controller
{
    //
    public function toHoriuchi(Request $request)
    {
        $name = 'テスト ユーザー';
        $email = 'test@example.com';

        Mail::send(new TestMail($name, $email));

        return view('contact.index');
    }

    public function toTsuchiya(Request $request)
    {
        $name = 'テスト ユーザー';
        $email = 'junnehoomaki@yahoo.co.jp';
        $data = ["name"=>"jugom"];
        $message = "hogehoge";


        Mail::send('mail.template', $data, function($message){
    	    $message->to('junnehoomaki@yahoo.co.jp', "title")
            ->subject('This is a test mail');
    	});

        return view('contact.index');
    }
    

}
