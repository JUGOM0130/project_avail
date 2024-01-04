<?php

namespace App\Http\Controllers;

use App\Models\IdeaNotes;
use Illuminate\Http\Request;

class IdeaNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ideas = IdeaNotes::all();
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

        //dd($request->all());

        $ideanotes = new IdeaNotes();
        $ideanotes->fill($request->all())->save();

        return redirect()->route('ideanotes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IdeaNotes $ideanote)
    {
        /*
        dd($ideanote);
        $ideanote = ルーティングのパラメータ名と一致している必要がある。
         */
        return view('ideanotes.show', ['data' => $ideanote]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdeaNotes $ideanote)
    {
        //
        return view('ideanotes.edit', ['data' => $ideanote]);
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