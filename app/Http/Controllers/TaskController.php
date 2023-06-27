<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Models\Status;


class TaskController extends Controller
{

    public function index(Task $tasks)
    {
        $tasks = Task::with('status')->orderBy('updated_at', 'desc')->get();
        return view('dashboard.tasks', [
            'tasks' => $tasks
        ]);

        return redirect('/tasks');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = auth()->user()->id;
        $task->save();

        return redirect('/tasks');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view('dashboard.edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks' . '/' . $task->id . '/' . 'edit')
                ->withInput()
                ->withErrors($validator);
        }

        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    }

    public function fav(Task $task)
    {
        $task->status_id = 6;
        $task->save();
        return redirect('/tasks');
    }

    public function unFav(Task $task)
    {
        $task->status_id = 1;
        $task->save();
        return redirect('/tasks');
    }

    public function done(Task $task)
    {
        $task->status_id = 3;
        $task->save();
        return redirect('/tasks');
    }
    public function pending(Task $task)
    {
        $task->status_id = 4;
        $task->save();
        return redirect('/tasks');
    }
    public function cancel(Task $task)
    {
        $task->status_id = 5;
        $task->save();
        return redirect('/tasks');
    }
    public function inprogress(Task $task)
    {
        $task->status_id = 2;
        $task->save();
        return redirect('/tasks');
    }
}
