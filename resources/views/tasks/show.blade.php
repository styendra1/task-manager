@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Task Details</h1>

    <div class="bg-white shadow rounded p-6 mb-6">
        <h2 class="text-xl font-semibold mb-2">{{ $task->title }}</h2>
        
        <p class="mb-4"><strong>Description:</strong> {{ $task->description }}</p>
        
        <p class="mb-2"><strong>Assigned To:</strong> {{ $task->user->name ?? 'No User Assigned' }}</p>
        
        <p class="mb-2"><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $task->status)) }}</p>
        
        <p class="mb-2"><strong>Start Date:</strong> {{ $task->start_date->format('Y-m-d') }}</p>
        
        <p class="mb-2"><strong>End Date:</strong> {{ $task->end_date->format('Y-m-d') }}</p>
    </div>

    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">Back to Task List</a>
</div>
@endsection
