</html>
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

    <form action="{{ route("cvs.index") }}" method="get" class="mb-6 mt-24 mx-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="search" name="query" id="query" placeholder="Functie" @if (isset($query)) value="{{ $query }}"
                @endif
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 focus:outline-none mr-2 w-full">

            <input type="text" name="location" placeholder="Woonplaats" @if (isset($location)) value="{{ $location }}"
                @endif
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 focus:outline-none mr-2 w-full">

            <select name="education" id="education" onchange='this.form.submit()'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 focus:outline-none mr-2 w-full">
                <option value="" @if (!isset($education)) selected @endif>Opleiding</option>
                <option value="Universitair" @if (isset($education) && $education==="Universitair" ) selected @endif>Universitair</option>
                <option value="HBO" @if (isset($education) && $education==="HBO" ) selected @endif>HBO</option>
                <option value="MBO" @if (isset($education) && $education==="MBO" ) selected @endif>MBO</option>
                <option value="VWO" @if (isset($education) && $education==="VWO" ) selected @endif>VWO</option>
                <option value="HAVO" @if (isset($education) && $education==="HAVO" ) selected @endif>HAVO</option>
                <option value="VMBO" @if (isset($education) && $education==="VMBO" ) selected @endif>VMBO</option>
            </select>

            <select name="experience" id="years_experience" onchange='this.form.submit()'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 focus:outline-none mr-2 w-full">
                <option value="" @if (!isset($experience)) selected @endif>Ervaring</option>
                <option value="5" @if (isset($experience) && $experience==="5" ) selected @endif>5+ jaar</option>
                <option value="10" @if (isset($experience) && $experience==="10" ) selected @endif>10+ jaar</option>
                <option value="20" @if (isset($experience) && $experience==="20" ) selected @endif>20+ jaar</option>
                <option value="30" @if (isset($experience) && $experience==="30" ) selected @endif>30+ jaar</option>
            </select>

            <select name="drivers_license" id="drivers_license" onchange='this.form.submit()'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 focus:outline-none mr-2 w-full">
                <option value="" @if (!isset($drivers_license)) selected @endif>Rijbewijs</option>
                <option value="Motor" @if (isset($drivers_license) && $drivers_license==="Motor" ) selected @endif>Motor (A)</option>
                <option value="Auto" @if (isset($drivers_license) && $drivers_license==="Auto" ) selected @endif>Auto (B)</option>
                <option value="Vrachtauto" @if (isset($drivers_license) && $drivers_license==="Vrachtauto" ) selected @endif>Vrachtauto (C)</option>
                <option value="Bus" @if (isset($drivers_license) && $drivers_license==="Bus" ) selected @endif>Bus (D)</option>
                <option value="Landbouwvoertuig" @if (isset($drivers_license) && $drivers_license==="Landbouwvoertuig" ) selected @endif>Landbouwvoertuig (T)</option>
            </select>

            <input type="submit" value="Zoeken"
                class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none w-full">
        </div>
    </form>

    @if (isset($results))
    <div class="mx-8 mb-9">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($results as $cv)
            <div class="w-full bg-gray-900 text-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $cv->first_name }}</div>

                    <p class="text-base">Functie: {{ $cv->preferred_function }}</p>
                    <p class="text-base">Woonplaats: {{ $cv->location }}</p>
                    <p class="text-base">Opleiding: {{ $cv->education }}</p>
                    <p class="text-base">Ervaring: {{ $cv->years_experience === 0 ? 'Onbekend' : $cv->years_experience . ' jaar' }}</p>
                    <p class="text-base">Rijbewijs: @foreach ($cv->drivers_license as $drivers_license) {{ $drivers_license }}@if(!$loop->last), @endif @endforeach</p>
                </div>

                <div class="px-6 pb-4">
                    <a href="{{ route("cvs.show", $cv->id) }}">
                        <button
                            class="text-white bg-[#01A395] hover:bg-[#078F81] font-medium rounded-lg text-sm px-5 p-2.5 focus:outline-none">Details</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</body>

</html>
