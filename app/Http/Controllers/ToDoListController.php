<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use Illuminate\Support\Carbon;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = ToDoList::OrderBy('created_at', 'Desc')->get();
        return view('todo.todoapp')->with(['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.createtodo');
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
            'todoname' => 'required|max:225'
        ]);
        $todo = $request->todoname;
        ToDoList::create(['todoname' => $todo]);

        return redirect('/todo')->with('success', "TODO has been created!");
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
        $todo = TodoList::find($id);
        return view('todo.edittodo')->with(['id' => $id, 'todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'todoname' => 'required|max:225'
        ]);

        $updateTodo = TodoList::find($request->id);
        $updateTodo->update(['todoname' => $request->todoname]);
        return redirect('/todo')->with('success', "TODO updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDoList::find( $id );

       if ($todo){
            $todo->delete();
            return redirect()->back()->with('success', "Todo has been deleted!");
        }else{
            return "Todo does not exist";
        }
    }

     /**
     * Show that the specified resource from storage is completed successfully.
     *
     * @param  int  $id
     */
    public function completed($id)
    {
        $todo = TodoList::find($id);
        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "Todo marked as incomplete!");
        }else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('success', "Todo marked as complete!");
        }
    }
}
