@extends('layouts.app')

@section('content')
    <h1 class="text-xl mb-4">Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $task->title }}" class="border p-2 w-full">
        <label class="block mt-2">
            <input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
            Completed
        </label>
        <button class="bg-green-500 text-white px-4 py-2 mt-2">Update</button>
    </form>
@endsection
