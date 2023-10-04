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

    public function contactNotification(Request $request)
    {
        /**
         * arg1・・・テンプレートのパスを指定
         * arg2・・・テンプレートファイルで使うデータを指定
         * arg3・・・コールバックメソッド
         */
        $subject = $request->subject;
        $id = $request->id;

        Mail::send('mail.template',
                    ["id"=>$id,'time'->date('Y-m-d H:i:s')],
                    function($message)use($subject){
                	    $message->to('notification@gonzaburo.sakura.ne.jp')
                                ->bcc('tsuchi-jun@asuzacgroup.jp')
                                ->cc('tsuchi-jun@gonzaburo.sakura.ne.jp'/* ,'horiuchi@avail.jp'*/)
                                ->subject($subject);
    	});
    }
    

}
