<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <style>
        html {
            overflow-x: none;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/body.js'])
</head>
<body class="antialiased leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <h1 class="text-bold text-black text-3xl">Routing to Dashboard</h1>
        
    <!-- The correct mount point for body.vue -->
    <div id="body"></div>

    <a href="{{ url('/') }}">
        <button class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" type="button">
            Go to Index
        </button>
    </a>
</body>
</html>
