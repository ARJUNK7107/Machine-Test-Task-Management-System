<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $tasks = Task::with('user')->latest()->get();
        } else {
            $tasks = auth()->user()->tasks()->latest()->get();
        }

        return view('tasks.index', compact('tasks'));
    }

   
    public function create()
    {
        $users = [];

    if (auth()->user()->role === 'admin') {
        $users = \App\Models\User::where('role', 'user')->get();
    }

    return view('tasks.create', compact('users'));
    }

  
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'due_date' => 'required|date',
    ]);

    $assignedUserId = auth()->user()->role === 'admin'
        ? $request->user_id
        : auth()->id();

    Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'status' => 'Pending',
        'due_date' => $request->due_date,
        'user_id' => $assignedUserId,
    ]);

    return redirect()->route('tasks.index');
}



public function edit(Task $task)
{
    $this->authorize('update', $task);

    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $this->authorize('update', $task);

    $request->validate([
        'status' => 'required|in:Pending,In Progress,Completed',
    ]);

 
    if ($request->status === 'Completed' && $task->due_date > now()) {
        return back()->withErrors([
            'status' => 'Task cannot be completed before due date.'
        ]);
    }

    $task->update([
        'status' => $request->status
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}


   
    public function destroy(Task $task)
    {   
         
        $this->authorize('delete', $task);

        $task->delete();
       
        return redirect()->route('tasks.index');
    }

}
