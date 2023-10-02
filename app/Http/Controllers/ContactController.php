<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Contact::all();
        return view("contact.index", compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //トランザクション処理について
        //https://progtext.net/programming/laravel-transaction/

        //dd($request);
        DB::transaction(function () use ($request) {

            $contact = new Contact;
            $contact->project_name = $request->project_name;
            $contact->priority = $request->priority;
            $contact->detail = $request->detail;
            $contact->start = $request->start;
            $contact->end = $request->end;
            $contact->save();

            $id = $contact->id; //関連テーブルへデータ追加
            $reg_data = []; // reg_dataオブジェクトの生成
            foreach ($request->ex as $idx => $value) {
                Exchange::create([
                    "parent_id" => $id,
                    "row_no" => $idx,
                    "exchange" => $value,
                ]);
            }
        }, 2); //←最大施行回数2回

        return redirect()->route("contact.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $dt = Contact::find($id);
        return view("contact.edit", compact(['dt']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
        DB::transaction(function () use ($request) {

            $con = Contact::find($request->id);
            $con->update([
                "project_name" => $request->project_name,
                "priority" => $request->priority,
                "detail" => $request->detail,
                "start" => $request->start,
                "end" => $request->end,
            ]);

            Exchange::where('parent_id', $request->id)->delete();
            foreach ($request->ex as $idx => $value) {
                Exchange::create([
                    "parent_id" => $request->id,
                    "row_no" => $idx,
                    "exchange" => $value,
                ]);
            }
            /*できない・・・
        $ex = $con->exchanges;
        $arr = [];
        $i = 0;
        foreach ($ex as $item) {
        $arr[] = [
        "id" => $item->id,
        "parent_id" => $item->parent_id,
        "row_no" => $i++,
        "exchange" => $item->exchange,
        ];
        }
        Exchange::upsert($arr, ['id'], ['exchange']);
         */
        }, 2); //←最大施行回数2回

        return redirect()->route("contact.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}