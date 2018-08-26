<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;


class TodoController extends Controller
{
    public function index()
    {
      $todos = Todo::all();
      return view('pages.todo.index', compact('todos'));
    }

    public function store(Request $request)
    {
      // dd($request->all());
      // $todo = new Todo();
      // $todo->task = $request->get('task');
      // $todo->save();

      Todo::create($request->all());
      Session::flash('success', 'Data berhasil di buat');

      return redirect()->back();
    }

    public function edit($id)
    {
      // return $id;
      $todo = Todo::findOrFail($id);
      return view('pages.todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
      $todo = Todo::findOrFail($id);
      $todo->task = $request->get('task');
      $todo->update();

      Session::flash('success', 'Data berhasil di update');

      return redirect()->route('todo.index');
    }

    public function destroy($id)
    {

      // return $id;
      $todo = Todo::findOrFail($id);
      $todo->delete();
      Session::flash('success', 'Data berhasil di hapus');


      return redirect()->route('todo.index');
    }

    public function complete(Request $request, $id)
    {
      $todo = Todo::findOrFail($id);
      $todo->status = true;
      $todo->update();
      Session::flash('success', 'Data complete');


      return redirect()->route('todo.index');
    }
}
