<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class CRUDController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Todo::create([
            'task' => $request->task,
        ]);

        return redirect()->route('todos.index');
    }

    public function update(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update([
            'is_completed' => !$todo->is_completed
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(string $id)
    {
        Todo::findOrFail($id)->delete();
        
        return redirect()->route('todos.index');
    }
}
