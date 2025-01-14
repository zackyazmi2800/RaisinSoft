<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/tailwind-ui-components@1.0.0/dist/index.min.js"></script>
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

                <!-- Navigation links -->
                <div class="hidden md:flex items-center space-x-4">
                    <x-nav-link href="#games" class="text-white hover:text-gray">Game</x-nav-link>
                    <div class="relative" x-data="{ isOpen: false }">
                        <!-- Button Trigger -->
                        <button type="button"
                            class="inline-flex items-center gap-x-1 text-sm font-semibold text-white hover:text-gray-300 hover:underline"
                            aria-expanded="false" @click="isOpen = !isOpen">
                            <!-- Icon Keranjang -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>

                        <!-- Pop-up Chart Keranjang -->
                        <div class="absolute left-1/2 z-10 mt-5 w-screen max-w-sm -translate-x-1/2 px-4" x-show="isOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1">

                            <!-- Pop-up Box -->
                            <div class="overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-gray-900/5">
                                <!-- List Produk -->
                                <div class="p-4 space-y-4">
                                    <!-- Item 1 -->
                                    <div class="flex items-center gap-x-4 hover:bg-gray-100 p-3 rounded">
                                        <div class="flex-none w-16 h-16 bg-gray-200 rounded-lg"></div>
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-900">Produk 1</h3>
                                            <p class="text-sm text-gray-600">Rp 100.000</p>
                                        </div>
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="flex items-center gap-x-4 hover:bg-gray-100 p-3 rounded">
                                        <div class="flex-none w-16 h-16 bg-gray-200 rounded-lg"></div>
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-900">Produk 2</h3>
                                            <p class="text-sm text-gray-600">Rp 200.000</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer Pop-up -->
                                <div class="grid grid-cols-2 divide-x divide-gray-200 bg-gray-50">
                                    <a href="#"
                                        class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
                                        Your Shopping Cart
                                    </a>
                                    <a href="#"
                                        class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
                                        <button class="btn btn-active  text-white px-6 py-2 rounded-lg bg-black">
                                            Buy Now
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


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
                <x-nav-link href="#games" class="block text-gray-300 hover:bg-gray-700 hover:text-white"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg></x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('posts')"
                    class="block text-gray-300 hover:bg-gray-700 hover:text-white"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
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
            @foreach ($games['results'] as $game)
            <a href="{{ route('post.postgame', ['id' => $game['id']]) }}">
                <div class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="{{ $game['background_image'] }}"
                             alt="{{ $game['name'] }}"
                             class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">{{ $game['name'] }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                        <p class="text-gray-400 text-sm mb-4">{{ $game['rating'] }}</p> 
                           
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                </div>
            </a>
            @endforeach    
        </div>

        <!-- See All Games Button -->
        <div class="mt-8 text-center">
            <a href="#allGames"
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
                @foreach ($posts as $post)
                    <div
                        class="group bg-[#242424] rounded-lg overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="overflow-hidden">
                            <img src="{{ $post->image_path }}" alt="{{ $post->title }}"
                                class="w-full h-[150px] object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-100">{{ $post->title }}</h3>
                            <p class="text-gray-400 text-sm mb-4">{{ Str::limit($post->excerpt, 50) }}</p>
                            <a href="{{ route('post.show', $post->id) }}"
                                class="btn text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
        </div>
            <!-- See All News Button -->
            <div class="mt-8 flex justify-center">
                <a href=""
                    class="inline-block text-lg font-semibold text-gray-900 bg-gradient-to-r from-yellow-500 to-red-500 py-3 px-8 rounded-full shadow-lg transform transition-transform hover:scale-110 hover:shadow-2xl hover:bg-gradient-to-l duration-300">
                    SEE ALL NEWS
                </a>
            </div>
        </div>
    </section>


    <!-- Cards Section -->
    <section id="allGames" class="bg-[#242424] py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-100 text-center mb-8">OUR GAMES</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($allGames['results'] as $game)
            <a href="{{ route('post.postgame', ['id' => $game['id']]) }}">
                <div class="bg-[#2c2b28] rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 relative group">
                    <div class="w-full h-[200px] overflow-hidden">
                        <img src="{{ $game['background_image'] }}"
                             alt="{{ $game['name'] }}"
                             class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-1">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-100">{{ $game['name'] }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                        <p class="text-gray-400 text-sm mb-4">{{ $game['rating'] }}</p>
                           
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                </div>
            </a>
            @endforeach    
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
        const searchButton = document.getElementById('search-button');
        const searchBox = document.getElementById('search-box');
        const searchContainer = document.getElementById('search-container');

        // Show search box when button is clicked
        searchButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent the click event from propagating to the container
            searchBox.classList.toggle('hidden');
        });

        // Close search box when clicking outside
        document.addEventListener('click', (e) => {
            if (!searchContainer.contains(e.target)) {
                searchBox.classList.add('hidden');
            }
        });
    </script>

</body>

</html>
