<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(TaskFormRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => $task,
        ]);
    }

    public function update(TaskFormRequest $taskFormRequest, Task $task) {
        $task->update($taskFormRequest->validated());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect()->back();
    }
}
