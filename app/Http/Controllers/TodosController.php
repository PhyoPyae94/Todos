<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
// use Symfony\Component\HttpFoundation\Request;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success', 'Your todo was created.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id); //Todo=model name

        $todo->delete();

        Session::flash('success', 'Your todo was deleted.');
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->todo = $request->todo;

        $todo->save();

        Session::flash('success', 'Your todo was updated.');
        return redirect()->route('todos');

        // dd($request->all());
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;

        $todo->save();

        Session::flash('success', 'Your todo was completed.');
        return redirect()->back();
    }
}