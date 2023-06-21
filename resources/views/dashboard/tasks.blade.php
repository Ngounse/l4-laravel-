@extends('layouts.master')
@section('title', 'Tasks')
@section('name', 'My tasks')
@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <!-- Task Name -->
        <div class="form-group py-2 flex gap-2 items-center">
            <label for="task" class="col-sm-3 control-label text-primary-300 ">Task</label>
            <div class="col-sm-6">
                <input type="text" class="text-black rounded-sm" name="name" id="task-name" class="form-control">
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6 gap-2">
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 rounded-sm">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- Current Tasks -->
@if (count($tasks) > 0)
<div class="panel panel-default ">
    <div class="panel-heading text-white bg-primary-600 px-2 rounded-sm flex justify-center">
        Current Tasks
    </div>

    <div class="panel-body gap-2">
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
                <th>Task</th>
                <th>Action </th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($tasks as $task)
                <tr class="">
                    <!-- Task Name -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>

                    <!-- Delete Button -->
                    <td>
                        <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            @section('button-text', 'Delete Task')
                            @include('components.errButton')

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
