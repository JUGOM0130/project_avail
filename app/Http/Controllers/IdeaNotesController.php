<?php

namespace App\Http\Controllers;

use App\Models\IdeaNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        // 全て取得
        // $ideas = IdeaNotes::all();
        $ideas = IdeaNotes::where('user_id', $id)->get();
        return view('ideanotes.index', ['ideas' => $ideas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ideanotes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        // 登録データ生成
        $data = $request->all();
        $data['user_id'] = $id;

        // モデルのインスタンス化
        $ideanotes = new IdeaNotes();
        $result = $ideanotes->fill($data)->save();

        // 一覧を表示
        return redirect()->route('ideanotes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IdeaNotes $ideanote)
    {
        // 登録データの所有者ID取得
        $user_data_id = $ideanote->user_id;
        // ログインユーザID取得
        $login_user_id = Auth::id();

        // 所有者とログインIDが一致しているか判定
        if ($user_data_id == $login_user_id) {
            return view('ideanotes.show', ['data' => $ideanote]);
        } else {
            // 一覧に遷移
            return redirect()->route('ideanotes.index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdeaNotes $ideanote)
    {
        // 登録データの所有者ID取得
        $user_data_id = $ideanote->user_id;
        // ログインユーザID取得
        $login_user_id = Auth::id();

        // 所有者とログインIDが一致しているか判定
        if ($user_data_id == $login_user_id) {
            return view('ideanotes.edit', ['data' => $ideanote]);
        } else {
            // 一覧に遷移
            return redirect()->route('ideanotes.index');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IdeaNotes $ideanote)
    {
        //
        $ideanote->update($request->all());
        return redirect()->route('ideanotes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdeaNotes $ideanote)
    {
        //
        dd($ideanote);
    }

}