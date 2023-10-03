<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dt = Task::all();

        return view('task.index', ['dt' => $dt]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        //
        $con_id = $req->contact_id;
        if ($con_id != null) {
            return view('task.create', ['contact_id' => $con_id]);
        } else {
            return view('task.create', ['contact_id' => '0']);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        //
        Task::create([
            'contact_id' => $req->contact_id,
            'title' => $req->title,
            'detail' => $req->detail,
        ]);

        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req)
    {
        //
        $id = $req->id;
        $dt = Task::find($id);

        return view("task.edit", ['dt' => $dt]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $tasks)
    {
        //
        $tsk = Task::find($request->id);

        $tsk->title = $request->title;
        $tsk->detail = $request->detail;

        $tsk->save();

        return redirect()->route("task.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks)
    {
        //
    }
}
