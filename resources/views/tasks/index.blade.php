@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">To-Do List</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="text" name="title" placeholder="New Task" class="border p-2 w-full">
        <button class="bg-blue-500 text-white px-4 py-2 mt-2">Add</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li class="flex justify-between items-center mb-2">
                <div>
                    <form action="{{ route('tasks.update', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="completed" value="{{ $task->completed ? 0 : 1 }}">
                        <button class="text-{{ $task->completed ? 'green' : 'gray' }}-600">
                            [{{ $task->completed ? '✓' : ' ' }}]
                        </button>
                    </form>
                    {{ $task->title }}
                </div>
                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 mr-2">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
