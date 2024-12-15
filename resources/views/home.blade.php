<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <title>RaisinSoft</title>
</head>

<body class="bg-black text-gray-200 font-sans">

    <!-- Navbar -->
    <nav class="bg-black" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <img class="w-12 h-12 mr-3" src="img/LOGO_RAISINSOFT3.png" alt="Your Company">

                    <div class="text-xl font-semibold text-gray-100">RAISINSOFT</div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Navigation links -->
                    <x-nav-link href="#games" class="text-white hover:text-gray-300">Game</x-nav-link>
                    <x-nav-link href="#" :active="request()->is('posts')" class="text-white hover:text-gray-300"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </x-nav-link>
                    @if (!auth()->user())
                        <details class="dropdown dropdown-end">
                            <summary class="btn btn-link p-0 text-white hover:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </summary>
                            <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-2 bg-[#242424]">
                                <li>
                                    <a href="{{ route('login') }}" :active="request() - > is('posts')">Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" :active="request() - > is('posts')">Register
                                    </a>
                                </li>
                            </ul>
                        </details>
                    @endif


                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            @auth()
                                <button type="button" @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://pics.craiyon.com/2024-09-01/V-vmRKOTQzSV2YsAR1rKEA.webp"
                                        alt="galuh">
                                </button>
                            @endauth
                        </div>
                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Dropdown links -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1">Settings</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1">Log out</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative inline-flex items-center justify-center rounded-md bg-black p-2 text-gray-400 hover:bg-[#242424] hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="isOpen" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <x-nav-link href="#games"
                    class="block text-gray-300 hover:bg-gray-700 hover:text-white"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg></x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('posts')"
                    class="block text-gray-300 hover:bg-gray-700 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg></x-nav-link>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="https://pics.craiyon.com/2024-09-01/V-vmRKOTQzSV2YsAR1rKEA.webp" alt="#">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Galuh Wikri</div>
                        <div class="text-sm font-medium leading-none mt-2 text-gray-400">Galuhwikri@gmail.com</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Log
                            out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero with Carousel -->
    <section class="relative">
        <div id="carousel" class="relative overflow-hidden">
            <!-- Images -->
            <div id="carousel-images" class="carousel-images flex transition-transform duration-700 ease-in-out">
                <img src="https://i.pinimg.com/originals/e7/9e/7e/e79e7e3ec43cce31970a942dacde4882.jpg" alt="Slide 1"
                    class="w-[1980px] h-[500px] object-cover flex-shrink-0">
                <img src="https://files.ekmcdn.com/allwallpapers/images/assassin-s-creed-91-5x61-cm-gaming-poster-36540-p.jpg"
                    alt="Slide 2" class="w-[1980px] h-[500px] object-cover flex-shrink-0">
                <img src="https://baylorlariat.com/wp-content/uploads/2022/03/Elden_Ring_player_character_landscape-1536x768.jpeg"
                    alt="Slide 3" class="w-[1980px] h-[500px] object-cover flex-shrink-0">
            </div>
        </div>
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="text-center text-white px-4">
                <h1 class="text-[5rem] font-extrabold text-shadow-md mb-4">WELCOME TO RAISINSOFT</h1>
                <p class="text-[1rem] font-semibold">Experience Creator of World</p>
            </div>
        </div>
    </section>


    <!-- Featured Games Section -->
    <section id="featured" class="bg-[#1c1b19] py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-extrabold tracking-widest text-gray-100 text-center mb-8">FEATURED GAMES</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <a href="{{ route('post/postgame') }}" rel="noopener noreferrer">
                    <div
                        class="bg-gray-800 rounded-md overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group h-[200px]">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4c5n0U6gOHf7L9fK1uggUMZiO5W3ITosM5sTIrk_qL4uxfyiOf5qY26WeHpSReT2mv5RDNtrdHjva56EFdnl87cMZM7pcQwnNyYSyUlDps8hCxzcQGPfUjTcMLMf5JdkafPFpFFmZcV90Ri-mGEcXx1aqfxZ1rM-Ag-rBKpG9TUNderUuSPmsAtBSlMY/s460/star-wars-jedi-survivor-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-center transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                </a>
                
                <div
                    class="bg-gray-800 rounded-md overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group h-[200px]">
                        <img src="https://lh7-rt.googleusercontent.com/docsz/AD_4nXeUWFbhx4dxBRFFqrOMPGeISrcJ5oObk77h7BZa_V3sVO-Gxs0J_sKjVvq1k14dhDXyfetRgKoYMmkojUIXIl7nTQaHzPMuM-HF2nlQ63A2mfosrZi_3SHDzIJ4Vn2ykSKBb1VbwOLvq9EIOZ5FsP_3OTs?key=rrRkrSvEM0UP4sgv9HfB6A"
                            alt="Game 1"
                            class="w-full h-full object-center transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                </div>
                <div
                    class="bg-gray-800 rounded-md overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group h-[200px]">
                        <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgN9BcsyMuJvpqH_DInjwGinnbhWYTsP4rcQm_hxHwep4avhA52a6v5DztmxBi4EsFfxCs7IwqqV0mcErYAABWu0w5v_HSwzhW_93hG3tdi_bH4f_cCo_fjBHEQ8iyh_m2ulzUunb0zRf4g99W-7pqTDUzOeuzSVeaSrUO18KnyYvop1KwBrINRKyhEjoY"
                            alt="Game 1"
                            class="w-full h-full object-center transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                </div>
                <div
                    class="bg-gray-800 rounded-md overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group h-[200px]">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgN-uE6bxEqmR9v_TByhyphenhyphen8B2gunc0LsjxXLkROfUMHoJ25CKnB-06RmfzRvJcf0m-MfSjbnR4Nb2WSnHDt38pO58v7CkauYznu72TWBJssKR-6FC2eXH8NeHowDX7Kf6_hsN_mnB77AJfNIr1R0-2DEFnhzjxmpqkA1t_93T46JV8MHV_VNxudMBBZ1Ea0/s460/dragon-ball-sparking-zero-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-center transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                </div>
            </div>

            <!-- See All Games Button -->
            <div class="mt-8 text-center">
                <a href="#"
                    class="inline-block text-lg font-semibold text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">
                    SEE ALL GAMES
                </a>
            </div>
        </div>
    </section>


    <!-- Latest News Section -->
    <section id="latest-news" class="py-12 bg-[#ffffff]">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-extrabold tracking-widest text-black text-center mb-8">LATEST NEWS</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- News Card 1 -->
                <div class="bg-[#242424] rounded-lg overflow-hidden shadow-lg">
                    <img src="https://www.notebookcheck.nl/fileadmin/Notebooks/News/_nc4/immortals-FSR-3-support-1.jpg"
                        alt="News 1" class="w-full h-[150px] object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">News Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Brief description of the news article.</p>
                        <a href="{{ route('post/news') }}"
                            class="btn text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">Read
                            More</a>
                    </div>
                </div>
                <!-- News Card 2 -->
                <div class="bg-[#242424] rounded-lg overflow-hidden shadow-lg">
                    <img src="https://i.ytimg.com/vi/8vAy9Cximuo/maxresdefault.jpg" alt="News 2"
                        class="w-full h-[150px] object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">News Title 2</h3>
                        <p class="text-gray-400 text-sm mb-4">Brief description of the news article.</p>
                        <a href="#"
                            class="btn text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">Read
                            More</a>
                    </div>
                </div>
                <!-- News Card 3 -->
                <div class="bg-[#242424] rounded-lg overflow-hidden shadow-lg">
                    <img src="https://external-preview.redd.it/YZI2YZekfFatfZdx8O0lGKTRdm03viLofRViHSYsWgg.jpg?width=1080&crop=smart&auto=webp&s=c55d28249b90d2476babaaac9a777764a58fad2d"
                        alt="News 2" class="w-full h-[150px] object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">News Title 2</h3>
                        <p class="text-gray-400 text-sm mb-4">Brief description of the news article.</p>
                        <a href="#"
                            class="btn text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- See All News Button -->
            <div class="mt-8 text-center">
                <a href="#"
                    class="inline-block text-lg font-semibold text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">
                    SEE ALL NEWS
                </a>
            </div>
        </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section id="games" class="bg-[#242424] py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-100 text-center mb-8">OUR GAMES</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://lh7-rt.googleusercontent.com/docsz/AD_4nXeUWFbhx4dxBRFFqrOMPGeISrcJ5oObk77h7BZa_V3sVO-Gxs0J_sKjVvq1k14dhDXyfetRgKoYMmkojUIXIl7nTQaHzPMuM-HF2nlQ63A2mfosrZi_3SHDzIJ4Vn2ykSKBb1VbwOLvq9EIOZ5FsP_3OTs?key=rrRkrSvEM0UP4sgv9HfB6A"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r  from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 2 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blackheartprints.com/cdn/shop/files/CallOfDutyBlackOps62024GamePosterLandscapeWeb_1200x1200.jpg?v=1717361285"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 3 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgooIJHgBAEUPeoKc9vDs-Ycxb4x8MHfW3tveDMQsmrhStTz8GQ81DUk6VcICuH4gPJe4&usqp=CAU"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 4 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRf8W_fW_PZZNIxhE-Qny7MWF5wlJWbBxwnDQ&s "
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 5 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://asset.kompas.com/crops/R8-50iS_lS0go3o4s8IhhfwakoM=/107x0:1052x630/750x500/data/photo/2021/05/07/6094b9cbb2080.png"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 6 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://api.duniagames.co.id/api/content/upload/file/7122254831701672058.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 7 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi0RfkEQwjfQ8LGN3eO1wOVdWlx_4Gk_tnmOa3HjVscGkqyXI7WAmPxDBBseSudJu5FU730LyOZyhM4WPrQQze_3G9PWBATPrxZB9y65x8m3rTvweLjLC-Q_zJXk7IkGUuLpIw00pb2skfIX5t6T4Gg_xldYlU7OZaT1vccb-btR76zyw9wmwJBGVsJQV8/s460/dragons-dogma-2-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 8 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhS3AC7jaKnSISJENiaiPui_GVUa5RNf4VlcwEDdijNmVwPDhYeu4yBqXuiz8ZdEYkudAgPBd3Ra4LdtPB86XRsO4RpaQHMPw2jPPmOq8bet3NwjvU0hH0iB71K5qoaJJZ7x1aj6Ujrz8UQLx1pwRXTkY5ZysxPLrHdEAa3EgfAWVWPXWYHQc_j3jzpplE/s460/assassins-creed-mirage-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 9 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh8QJcESKeEGrd402L9Em9Qza-7INd6pivez59i1Axwp2Mbg98ZdB5m54Hb1agS7OZRMnImaxI15SssqbTm1OG_d5zUpNFyNzvDAKBMXQE0GTf2-p64iVVoxMgXwKeXeaJMh2XeG90PNImmMgV33BOlPuPYCPrlD3t__W0Mza2IZQECO8Tl7m5lfTU9Kr8/s460/god-of-war-ragnarok-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 10 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgN-uE6bxEqmR9v_TByhyphenhyphen8B2gunc0LsjxXLkROfUMHoJ25CKnB-06RmfzRvJcf0m-MfSjbnR4Nb2WSnHDt38pO58v7CkauYznu72TWBJssKR-6FC2eXH8NeHowDX7Kf6_hsN_mnB77AJfNIr1R0-2DEFnhzjxmpqkA1t_93T46JV8MHV_VNxudMBBZ1Ea0/s460/dragon-ball-sparking-zero-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 11 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiPkIOz4ju2St8yLkapxKESvPOqk-BxiTUW3bu6h2ufiWsXQOWt-yTnDHgqFHkrWUG2qQH1DqngqmJ-Bv-YQ431V7UBLLBUmtNkG6QGQwVzHDm15rY1phw7nPMggK7bwNAp73IzXDvMsX2v_swe0QFPcOrkvAsfE_hRM03hRNRBxbhfhlLHh4BNLjwLr_U/s460/stalker-2-pc-cover.jpg"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
                <!-- Card 12 -->
                <div
                    class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgN9BcsyMuJvpqH_DInjwGinnbhWYTsP4rcQm_hxHwep4avhA52a6v5DztmxBi4EsFfxCs7IwqqV0mcErYAABWu0w5v_HSwzhW_93hG3tdi_bH4f_cCo_fjBHEQ8iyh_m2ulzUunb0zRf4g99W-7pqTDUzOeuzSVeaSrUO18KnyYvop1KwBrINRKyhEjoY"
                            alt="Game 1"
                            class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">Game Title 1</h3>
                        <p class="text-gray-400 text-sm mb-4">Description of the game.</p>
                        <a href="#"
                            class="btn bg-gradient-to-r from-yellow-500 to-red-500 text-white py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105 hover:shadow-lg hover:bg-gradient-to-l mt-2">Read
                            More</a>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-r bg-[#000000] text-gray-200 text-center p-6">
        <div class="container mx-auto">
            <div class="flex justify-center space-x-4 mb-4">
                <img class="w-30 h-40" src="img/LOGO_RAISINSOFT3.png" alt="Your Company">
            </div>
            <p class="text-sm mb-2">&copy; 2024 RaisinSoft. All Rights Reserved.</p>
            <p class="text-sm">Privacy Policy | Terms of Service</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        const carousel = document.getElementById('carousel-images');
        const slides = carousel.children;
        let index = 0;

        // Function to change slide
        function showNextSlide() {
            index = (index + 1) % slides.length; // This ensures it loops back to 0 after the last slide
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        // Set interval for automatic slide change every 3 seconds
        setInterval(showNextSlide, 3000);


        // Get the button and the mobile menu
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        // Add click event to the menu toggle button
        menuToggle.addEventListener('click', () => {
            // Toggle visibility of the mobile menu
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex'); // Add flex to display menu properly
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                // Scroll ke elemen target dengan efek halus
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    </script>

</body>

</html>
