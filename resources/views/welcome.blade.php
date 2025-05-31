<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-center space-x-4">
            <!-- User Login Button -->
            <button
                type="button"
                onclick="window.location='{{ route('login') }}';"
                class="px-6 py-2 bg-green-500 text-white rounded-md text-sm hover:bg-green-600 transition"
            >
                {{ __('User Login') }}
            </button>

          
            <!-- User Registration Button -->
            @if (Route::has('register'))
                <button
                    type="button"
                    onclick="window.location='{{ route('register') }}';"
                    class="px-6 py-2 bg-indigo-500 text-white rounded-md text-sm hover:bg-indigo-600 transition"
                >
                    {{ __('User Registration') }}
                </button>
                  <!-- Admin Button -->
            <button
                type="button"
                onclick="window.location='{{ route('admin') }}';"
                class="px-6 py-2 bg-blue-500 text-white rounded-md text-sm hover:bg-blue-600 transition"
            >
                {{ __('Admin') }}
            </button>

            @endif
        </div>
    </div>

</body>
</html>
