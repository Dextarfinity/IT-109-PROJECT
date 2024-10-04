<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Index page</title>
<style>
html{
    overflow-x: none;
}
</style>
@vite(['resources/css/app.css', 'resources/js/app.js']) 
</head> 
<body class="antialiased leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;"> 
<h1 class="text-bold text-red-800 text-3xl">This is Index</h1>
<div id="app"></div>
<a href="{{ url('/auth') }}">
    <button class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" type="button">
        Go to Authentication
    </button>
</a> 
</body> 
</html>