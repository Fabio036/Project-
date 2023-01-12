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

    <div class="mt-24 mx-8 mb-8">
        <a href="{{ route("cvs.index") }}">
            <button
                class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none mb-3">Terug</button>
        </a>

        <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg my-3">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $cv->first_name }}</div>
                <p class="text-base">Functie: {{ $cv->preferred_function }}</p>
                <p class="text-base">Woonplaats: {{ $cv->location }}</p>
                <p class="text-base">Opleiding: {{ $cv->education }}</p>
                <p class="text-base">Ervaring: {{ $cv->years_experience === 0 ? 'Onbekend' : $cv->years_experience . ' jaar' }}</p>
                <p class="text-base">Rijbewijs: @foreach ($cv->drivers_license as $drivers_license) {{ $drivers_license }} @if(!$loop->last), @endif @endforeach</p>
            </div>

            <div class="mb-6 mx-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="mailto:{{ $cv->email === 'Onbekend' ? '#' : $cv->email }}">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full disabled:cursor-not-allowed disabled:opacity-50"
                            @if ($cv->email === 'Onbekend') disabled @endif>E-mail</button>
                    </a>

                    <a href="tel:{{ $cv->phone === 'Onbekend' ? '#' : $cv->phone }}">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full disabled:cursor-not-allowed disabled:opacity-50"
                            @if ($cv->phone === 'Onbekend') disabled @endif>Telefoon</button>
                    </a>

                    <a href="https://www.linkedin.com/in/{{ $cv->first_name }}/" target="_blank">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full">LinkedIn</button>
                    </a>

                    <a href="{{ route("cvs.pdf", $cv->id) }}">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full">Download
                            PDF</button>
                    </a>

                    <a href="{{ $cv->werkzoeken_url ?? '#' }}" target="_blank" class="sm:col-span-2">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full disabled:cursor-not-allowed disabled:opacity-50"
                            @if ($cv->werkzoeken_url === null) disabled @endif>Werkzoeken.nl</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Voorkeur maximale afstand: {{ $cv->preferred_max_distance }} KM
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Talen:
                        @foreach($cv->languages as $language)
                        {{ $language }}@if (!$loop->last), @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Gewenste uren: {{ $cv->preferred_hours }} {{ !str_contains($cv->preferred_hours, 'uur p/w') ? 'uur p/w' : '' }}
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Voorkeurscontract: {{ $cv->preferred_contract }}
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Beschickbaarheid: {{ substr($cv->availability, 2) }}
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Niveau: {{ $cv->level }}
                    </div>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg sm:col-span-2">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        Gewenste minimumloon: {{ $cv->preferred_min_wage }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
