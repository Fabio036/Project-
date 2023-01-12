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

<body>
    <p>Voornaam: {{ $cv->first_name }}</p>
    <p>E-mail: {{ $cv->email }}</p>
    <p>Telefoon: {{ $cv->phone }}</p>
    <p>Locatie: {{ $cv->location }}</p>
    <p>Opleiding: {{ $cv->education }}</p>
    <p>
        Rijbewijs:
        @foreach($cv->drivers_license as $drivers_license)
        {{ $drivers_license }}@if (!$loop->last), @endif
        @endforeach
    </p>
    <p>
        Talen:
        @foreach($cv->languages as $language)
        {{ $language }}@if (!$loop->last), @endif
        @endforeach
    </p>
    <p>Beschikbaarheid: {{ substr($cv->availability, 2) }}</p>
    <p>Niveau: {{ $cv->level }}</p>
    <p>Gewenste uren: {{ $cv->preferred_hours }}</p>
    <p>Voorkeurscontract: {{ $cv->preferred_contract }}</p>
    <p>Voorkeur maximale afstand: {{ $cv->preferred_max_distance }} KM</p>
    <p>Functie: {{ $cv->preferred_function }}</p>
    <p>Gewenste minimumloon: {{ $cv->preferred_min_wage }}</p>
</body>

</html>
