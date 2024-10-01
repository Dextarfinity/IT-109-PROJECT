<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>{{ config('app.name') }}</title>
<style>
html{
    overflow-x: none;
}
</style>
@vite(['resources/css/app.css', 'resources/js/app.js']) 
</head> 
<body class="antialiased leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;"> 
<div id="app"></div> 
</body> 
</html>