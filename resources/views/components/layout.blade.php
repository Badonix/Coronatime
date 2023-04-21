<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="{{ mix('resources/js/app.js') }}" type='module'></script>
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>

<body class='h-screen max-w-screen overflow-x-hidden'>
    {{ $slot }}
</body>

</html>
