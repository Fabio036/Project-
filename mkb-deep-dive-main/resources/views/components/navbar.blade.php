<nav class="px-2 sm:px-4 py-2.5 bg-gray-900 absolute w-full top-0 left-0 border-b border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route("home") }}" class="flex items-center">
            <img src="{{ asset("images/logo.png") }}" class="h-6 mr-3 sm:h-9" alt="MR.PEOPLE Logo">
        </a>

        <button data-collapse-toggle="navbar-sticky" type="button"
            class="inline-flex items-center p-2 text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-white hover:bg-gray-700 focus:ring-gray-600"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                <li>
                    <a href="{{ route("home") }}"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 md:hover:text-[#01A395] text-white hover:bg-gray-700 hover:text-[#01A395] md:hover:bg-transparent border-gray-700">HOME</a>
                </li>

                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 md:hover:text-[#01A395] text-white hover:bg-gray-700 hover:text-[#01A395] md:hover:bg-transparent border-gray-700">OVER
                        ONS</a>
                </li>

                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded md:border-0 md:p-0 md:w-auto text-white hover:text-[#01A395] border-gray-700 hover:bg-gray-700 md:hover:bg-transparent">DIENSTEN
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal divide-y rounded shadow w-44 bg-gray-700 divide-gray-600">
                        <ul class="py-1 text-sm text-white" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-[#01A395]">UITZENDEN</a>
                            </li>

                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-[#01A395]">DETACHEREN</a>
                            </li>

                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-[#01A395]">WERVING EN
                                    SELECTIE</a>
                            </li>

                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-[#01A395]">RECRUITMENT</a>
                            </li>

                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-[#01A395]">WET
                                    ARBEIDSMARKT IN BALANS</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route("cvs.index") }}"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 md:hover:text-[#01A395] text-white hover:bg-gray-700 hover:text-[#01A395] md:hover:bg-transparent border-gray-700">CV'S</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 md:hover:text-[#01A395] text-white hover:bg-gray-700 hover:text-[#01A395] md:hover:bg-transparent border-gray-700">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
