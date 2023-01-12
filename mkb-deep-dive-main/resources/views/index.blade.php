<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR.PEOPLE</title>
    @vite("resources/css/app.css")
    @vite("resources/js/app.js")
</head>

<body class="bg-gray-800">
    <x-navbar />

    <p class="line-1 anim-typewriter">Welkom, bij MR.People</p>
    <style>
        html{
            min-height: 100%;
            overflow: hidden;
        }
        body{
            height: calc(100vh - 8em);
            padding: 4em;
            color: #01A395;
            font-family: sans-serif;

        }
        .line-1{
            position: relative;
            top: 50%;
            width: 24em;
            margin: 0 auto;
            border-right: 4px solid;
            font-size: 300%;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            transform: translateY(-50%)

        }
        .anim-typewriter{
            animation: typewriter 4s steps(44) 1s 1
            normal both,
                        blinkTextCursor 500ms steps(44)
        infinite normal;
        }
        @keyframes typewriter{
        from{width:0;}
        to{width: 11em;}
        }

        @keyframes blinkTextCursor{
            to{border-right-color: transparent;}
        }
    </style>
</body>

</html>
