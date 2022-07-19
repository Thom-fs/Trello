<?php

namespace App\Http\Controllers;

use App\Models\task_finished;
use App\Models\task_inprogress;
use Illuminate\Http\Request;
use App\Models\task_todo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsTodo = task_todo::query()

            ->where('user_id', Auth::User()->id)
            ->get();

        $postsInprogress = task_inprogress::query()

            ->where('user_id', Auth::User()->id)
            ->get();

        $postsFinished = task_finished::query()

            ->where('user_id', Auth::User()->id)
            ->get();



        // dossier trello avec fichier index.blade.php
        return view('trello.index', compact('postsTodo', 'postsInprogress', 'postsFinished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        dd($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        if ($request->searchModel == "todo") {
            $task = task_todo::find($id);

            if ($request->choice == "inProgress") {
                task_inprogress::create($task->replicate()->toArray());
            } elseif ($request->choice == "finished") {
                task_finished::create($task->replicate()->toArray());
            }

            $task->delete();
        }

        if ($request->searchModel == "ip") {
            $task = task_inprogress::find($id);

            if ($request->choice == "toDo") {
                task_todo::create($task->replicate()->toArray());
            } elseif ($request->choice == "finished") {
                task_finished::create($task->replicate()->toArray());
            }

            $task->delete();
        }

        if ($request->searchModel == "finished") {
            $task = task_finished::find($id);

            if ($request->choice == "inProgress") {
                task_inprogress::create($task->replicate()->toArray());
            } elseif ($request->choice == "toDo") {
                task_todo::create($task->replicate()->toArray());
            }

            $task->delete();
        }


        //$task = task_finished::find($id);

        return redirect()->route('home');
    }
}
