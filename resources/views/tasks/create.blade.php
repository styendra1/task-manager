@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border px-2 py-1 w-full" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-1">Description</label>
            <textarea name="description" id="description" class="border px-2 py-1 w-full" required>{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        @auth
            @if(auth()->user()->role === 'admin')
                <div class="mb-4">
                    <label for="user_id" class="block mb-1">Assign To</label>
                    <select name="user_id" id="user_id" class="border px-2 py-1 w-full" required>
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    {{-- @error('user_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror --}}
                </div>
            @else
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @endif
        @endauth

        <div class="mb-4">
            <label for="status" class="block mb-1">Status</label>
            <select name="status" id="status" class="border px-2 py-1 w-full" required>
                <option value="Pending" @selected(old('status') == 'Pending')>Pending</option>
                <option value="In Progress" @selected(old('status') == 'In Progress')>In Progress</option>
                <option value="Completed" @selected(old('status') == 'Completed')>Completed</option>
            </select>
            @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block mb-1">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="border px-2 py-1 w-full" required>
            @error('start_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block mb-1">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="border px-2 py-1 w-full" required>
            @error('end_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create Task
        </button>
    </form>
</div>
@endsection
