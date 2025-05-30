<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">My Tasks</h1>

    @if(session('success'))
        <div class="text-green-600 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="mb-4 inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Create New Task</a>

    @if($tasks->count())
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Assigned To</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Start Date</th>
                <th class="border px-4 py-2">End Date</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td class="border px-4 py-2">{{ $task->title }}</td>
                <td class="border px-4 py-2">{{ $task->user->name ?? 'No User' }}</td>
                <td class="border px-4 py-2">{{ $task->status }}</td>
                <td class="border px-4 py-2">{{ $task->start_date->format('Y-m-d') }}</td>
                <td class="border px-4 py-2">{{ $task->end_date->format('Y-m-d') }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-600 hover:underline">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No tasks found.</p>
    @endif
</div>
@endsection
