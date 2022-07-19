<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task_todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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



        $request->validate([
            'task' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg'

        ]);

        $newImageName = '';

        if (isset($request->image)) {


            $newImageName =  $request->image->store('Images');
            $request->image->move(public_path('Images'), $newImageName);
        }

        $post = [
            'task' => $request->input('task'),
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'image' => $newImageName


        ];


        task_todo::create($post);



        return redirect()->back();
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
        $post = task_todo::find($id);
        $post->task = $request->input('task');

        $post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = task_todo::find($id);
        $post->delete();

        return redirect()->back();
    }
}
