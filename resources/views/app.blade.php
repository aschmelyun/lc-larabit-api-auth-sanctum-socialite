<!DOCTYPE html>
<html>
<head>
    <title>API Authentication with Sanctum + Socialite</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="max-w-lg mx-auto mt-24">
        <div id="app"></div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>