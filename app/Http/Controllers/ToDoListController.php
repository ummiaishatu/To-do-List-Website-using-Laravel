<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use App\Models\GroupToDoList;
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
        $todos = ToDoList::OrderBy('created_at', 'asc')->get();
        $grouptodos = GroupToDoList::all();
        return view('todo.todoapp')->with(['todos' => $todos, 'grouptodos' => $grouptodos]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupindex()
    {
        $todos = ToDoList::all();
        $grouptodos = GroupToDoList::OrderBy('created_at', 'asc')->get();
        return view('todo.grouptodo')->with(['grouptodos' => $grouptodos, 'todos' => $todos]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grouptodos = GroupToDoList::orderBy('groupname', 'asc')->get();
        return view('todo.createtodo', ['grouptodos' => $grouptodos]);
    }

    /**
     * Show the form for creating a new group resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creategroup()
    {
        return view('todo.creategrouptodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = $request->todoname;
        $grouptodo = $request->groupname;
        $group_id = $request->group_id;
        if ($todo){
            ToDoList::create(['todoname' => $todo, 'group_id' => $group_id]);
            return redirect('/todo')->with('success', "TODO has been created!");
        }else{
            GroupToDoList::create(['groupname' => $grouptodo]);
            return redirect('/grouptodo')->with('success', "Group has been created!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showgroup($id)
    {
        //$grouptodos = GroupTodoList::findOrFail($id);
        //$todo = TodoList::findOrFail($id);
        //return view('todo.showgroup')->with(['id' => $id, 'todo' => $todo, 'grouptodos' => $grouptodos]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = TodoList::findOrFail($id);
        $grouptodos = GroupToDoList::orderBy('groupname', 'asc')->get();
        return view('todo.edittodo')->with(['id' => $id, 'todo' => $todo, 'grouptodos' => $grouptodos]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editgroup($id)
    {
        $grouptodo = GroupTodoList::findOrFail($id);
        return view('todo.editgrouptodo')->with(['id' => $id, 'grouptodo' => $grouptodo]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateTodo = TodoList::find($request->id);
        $updateGroupTodo = GroupTodoList::find($request->id);
        if ($updateTodo){
            $updateTodo->update(['todoname' => $request->todoname, 'group_id' => $request->group_id]);
            return redirect('/todo')->with('success', "TODO updated!");
        }else{
            $updateGroupTodo->update(['groupname' => $request->groupname]);
            return redirect('/grouptodo')->with('success', "Group updated!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDoList::findOrFail( $id );

       if ($todo){
            $todo->delete();
            return redirect()->back()->with('success', "Todo has been deleted!");
        }else{
            return "Todo does not exist";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroygroup($id)
    {
        $grouptodo = GroupToDoList::findOrFail( $id );

       if ($grouptodo){
            $grouptodo->delete();
            return redirect('/grouptodo')->with('success', "Group has been deleted!");
        }else{
            return "Group does not exist";
        }
    }

     /**
     * Show that the specified resource from storage is completed successfully.
     *
     * @param  int  $id
     */
    public function completed($id)
    {
        $todo = TodoList::findOrFail($id);
        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "Todo marked as incomplete!");
        }else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('success', "Todo marked as complete!");
        }
    }

    /**
     * Show that the specified resource from storage is completed successfully.
     *
     * @param  int  $id
     */
    public function completedgroup($id)
    {
        $grouptodo = GroupTodoList::findOrFail($id);
        if ($grouptodo->completed) {
            $grouptodo->update(['completed' => false]);
            return redirect('/grouptodo')->with('success', "Group marked not completed!");
        }else {
            $grouptodo->update(['completed' => true]);
            return redirect('/grouptodo')->with('success', "Group marked as complete!");
        }
    }
}
