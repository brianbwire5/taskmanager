<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task-Manager</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class=" flex items-center justify-center h-screen">
        <div class="mx-auto dark:text-white">
            <div class="my-3 text-4xl font-bold leading-4 tracking-wider">
                Welcome to Task Manager
            </div>
            <div class="flex items-center space-x-4 mt-8 ml-36">
                <a  href="{{route('register')}}" class="px-6 py-2 bg-indigo-400 rounded-lg shadow-md text-white">Register</a>
                <a  href="{{route('login')}}" class="px-6 py-2 bg-indigo-400 rounded-lg shadow-md text-white">Login</a><br>
            </div>
            <div class="container flex items-center space-x-4 mt-8 ml-36">&nbsp;&nbsp;&nbsp;
                <a  href="{{route('github')}}" class="px-6 py-2 bg-blue-400 rounded-lg shadow-md text-white">Sign in with Github</a>
            </div>
        </div>
    </div>
    <script src="{{ asset ('js/app.js')}}"></script>
    </body>
</html>
