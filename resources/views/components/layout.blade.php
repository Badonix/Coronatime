<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class='h-screen max-w-screen overflow-x-hidden'>
    {{ $slot }}
</body>

</html>
