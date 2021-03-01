<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projects-Boards</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased bg-gray-100">
    <div class=" flex items-center justify-center h-screen">
        <div class="mx-auto">
            Welcome to Projects Boards
            <a  href="{{route('login')}}" class="px-6 py-2 bg-indigo-400 rounded-lg shadow-md text-white">Login</a>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
