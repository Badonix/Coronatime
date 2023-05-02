<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<div style="text-align: center; width: 100%" class='body'>

    <img style="width: 400px; max-width: 400px;" src="https://i.ibb.co/wSVcvXp/email-cover.png" />
    <h1>{{ $title }}</h1>
    <p>{{ $subtitle }}</p>
    <a style="        
    display: block;
    padding-top: 1rem;
    padding-bottom: 1rem;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    background-color: #22C55E;
    color: #ffffff;
    font-weight: 700;
    text-align: center;
    width: 300px;
    border-radius: 0.5rem;
    cursor: pointer;
    border: none;
    text-decoration: none;
    margin:0 auto;
    "
        href="{{ $url }}">{{ $button }}</a>
</div>

</html>
