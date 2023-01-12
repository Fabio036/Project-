<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MR.PEOPLE</title>
    @vite("resources/css/app.css")
    @vite("resources/js/app.js")
</head>
<body class="bg-gray-800">

    <x-navbar/>
    div class="container my-24 px-7 mx-auto">
  <section class="mb-32 text-center text-gray-800">
   
    <div class="max-w-[700px] mx-auto px-3 lg:px-6">
      <h2 class="text-3xl font-bold mb-12">Contacteer ons</h2>
      <form>
         <h2 class="text-neutral-50 text-3xl font-bold mb-12">Contacteer ons</h2>
        <div class="form-group mb-6">
          <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
            placeholder="Naam">
        </div>
        <div class="form-group mb-6">
          <input type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
            placeholder="E-mail">
        </div>
        <div class="form-group mb-6">
          <textarea class="form-controlblock w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-outm-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
          " id="exampleFormControlTextarea13" rows="3" placeholder="Bericht"></textarea>
        </div>
        <button type="submit" class="w-full px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounde shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Verstuur</button>
      </form>
    </div>
  </section>

</div>
</body>
</html>
