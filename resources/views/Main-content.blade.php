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
    <!-- The correct mount point for body.vue -->
    <div id="body"></div>
</body>
</html>
