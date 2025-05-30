@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" class="border p-2 w-full">{{ old('description', $task->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Assign To</label>
            <select name="user_id" class="border p-2 w-full">
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

    <div>
    <label class="block font-medium">Status</label>
    <select name="status" class="border p-2 w-full" required>
        @php
            $statuses = ['pending', 'in_progress', 'completed', 'on_hold']; // define your statuses here
        @endphp

        @foreach ($statuses as $statusOption)
            <option value="{{ $statusOption }}" {{ old('status', $task->status) === $statusOption ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_', ' ', $statusOption)) }}
            </option>
        @endforeach
    </select>
</div>


        <div>
            <label class="block font-medium">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $task->start_date ? $task->start_date->format('Y-m-d') : '') }}" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-medium">End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $task->end_date ? $task->end_date->format('Y-m-d') : '') }}" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-balck px-4 py-2 rounded hover:bg-blue-700">Update Task</button>
    </form>
</div>
@endsection
