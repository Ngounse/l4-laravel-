@extends('layouts.master')
@section('title', 'Edit task')
@section('name', 'Edit task')
@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    {{-- {{ url('tasks/{{.$task->id.}}') }} --}}
    <form action="{{ url('tasks').'/'.$task->id }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <!-- Task Name -->
        <div class="form-group py-2 flex gap-2 items-center">
            <label for="task" class="col-sm-3 control-label text-primary-300 ">Task</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $task->name }}" class="text-black px-2 rounded-sm" name="name" id="task-name" class="form-control">
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6 gap-2">
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 rounded-sm">
                        <i class="fa fa-plus"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
