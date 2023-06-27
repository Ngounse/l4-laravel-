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
                <input type="text" class="text-black px-2 rounded-sm" name="name" id="task-name" class="form-control">
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
                <th>Action</th>
                <th>Status</th>
                <th>User</th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($tasks as $task)
                <tr class="">
                    <!-- Task Name -->
                    <td class="table-text w-1/2 text-{{ $task->status->color }}-600" style="color: {{ $task->status->color }};">
                        <div>{{ $task->name }}</div>
                    </td>

                    <td class="flex content-center justify-items-center items-center gap-0.5">
                        <form action="{{ url('tasks/'.$task->id.'/edit') }}">
                            @section('button-text-info', 'Edit')
                            @include('components.infoButton')
                        </form>
                        <form action="{{ url('tasks/'.$task->id.'/inprogress') }}" method="POST">
                            {!! csrf_field() !!}
                            @if($task->status->name == 'in progress')
                            <button class="w-full text-black bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-yellow-300 dark:hover:bg-yellow-400 dark:focus:ring-yellow-400 rounded-sm">
                                In progress
                            </button>
                            @else
                            <button class="w-full text-white bg-gray-600 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-gray-600 dark:hover:bg-yellow-500 dark:focus:ring-yellow-400 rounded-sm">
                                In progress
                            </button>
                            @endif
                        </form>
                        <form action="{{ url('tasks/'.$task->id.'/done') }}" method="POST">
                            {!! csrf_field() !!}
                            @if($task->status->name == 'done')
                            <button class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 rounded-sm">
                                Done
                            </button>
                            @else
                            @section('button-text-suss', 'Done')
                            @include('components.sussButton')
                            @endif
                        </form>

                        <form action="{{ url('tasks/'.$task->id.'/fav') }}" method="POST">
                            {!! csrf_field() !!}
                            @if($task->status->name == 'favorited')
                            <button class="w-full text-white  bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800 rounded-sm">
                                Fav
                            </button>
                            @else
                            @section('button-text-fav', 'Fav')
                            @include('components.favButton')
                            @endif
                        </form>

                        <form action="{{ url('tasks/'.$task->id.'/pending') }}" method="POST">
                            {!! csrf_field() !!}
                            @if($task->status->name =='pending')
                            <button class="w-full text-white  bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 rounded-sm">
                                Padding
                            </button>
                            @else
                            <button class="w-full text-white  bg-gray-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-gray-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 rounded-sm">
                                Padding
                            </button>
                            @endif
                        </form>
                        <form action="{{ url('tasks/'.$task->id.'/cancel') }}" method="POST">
                            {!! csrf_field() !!}
                            @if($task->status->name =='canceled')
                            <button class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 rounded-sm">
                                Cancel
                            </button>
                            @else
                            <button class="w-full text-white bg-gray-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-gray-600 dark:hover:bg-red-700 dark:focus:ring-red-800 rounded-sm">
                                Cancel
                            </button>
                            @endif
                        </form>
                        <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            @section('button-text-err', 'Delete')
                            @include('components.errButton')
                        </form>
                    </td>
                    <td class="text-center text-{{ $task->status->color }}-600" style="color: {{ $task->status->color }};">
                        <div>{{ $task->status->name }}</div>
                    </td>
                    <td class="text-center">
                        <div>{{ $task->user->name }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
