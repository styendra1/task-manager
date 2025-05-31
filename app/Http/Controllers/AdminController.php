<?php

namespace App\Http\Controllers;

use App\Models\Task;

class AdminController extends Controller
{    public function index()
    {
        // Get all tasks with assigned user, ordered by latest
        $tasks = Task::with('user')->latest()->get();

        return view('admin.dashboard', compact('tasks'));
    }
}
