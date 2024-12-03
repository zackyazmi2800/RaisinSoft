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
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img class="w-12 h-12 mr-3" src="/img/LOGO_RAISINSOFT3.png" alt="Your Company">
                        <div class="text-xl font-semibold text-gray-100">RAISINSOFT</div>
                    </a>
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

    <!-- News  -->
    <div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path
                        d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0"
                    fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base/7 font-semibold text-black">Action, Adventure</p>
                        <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            STAR WARS Jedi Survivor Deluxe Edition</h1>
                    </div>
                </div>
            </div>

            <!-- News carousel 1  -->
            <div class="-ml-16 -mt-16 p-16 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                <div id="carouselExample" class="carousel relative w-full rounded-box h-[500px] overflow-hidden">
                    <!-- Wrapper untuk carousel -->
                    <div id="carouselInner" class="carousel-inner flex flex-col transition-transform duration-1000 ease-in-out">
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://xboxsquad.fr/wp-content/uploads/2023/04/star-wars-jedi-survivor-final-gameplay-trailer.jpg" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://htxt.co.za/wp-content/uploads/2024/07/Jedi-Survivor-Feature.jpg" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://assets-prd.ignimgs.com/2024/09/12/starwarsjedisurvivorps4progameplay-ign-blogroll-1726157817650.jpg" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://www.4gamers.net/wp-content/uploads/2023/10/star-wars-jedi-survivor-gameplay.jpg" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://jedinet.com/wp-content/uploads/2023/02/Star-Wars-Jedi-Survivor-BD-1-electrobinoculars.png" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://media.zenfs.com/en/nerdist_761/e44ab1c80db02bb55e0a2322af50875e" />
                        </div>
                        <div class="carousel-item w-full h-full">
                            <img class="object-cover w-full h-full"
                                src="https://static1.srcdn.com/wordpress/wp-content/uploads/2022/12/star-wars-jedi-survivor-official-reveal-trailer-commando-droid-ship-in-background.jpg" />
                        </div>
                    </div>
                </div>
            </div>


<!-- Description untuk news -->
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-base/7 text-gray-700 lg:max-w-lg">
                        <p><strong class="font-semibold text-gray-900">Description</strong>
                        <p>The story of Cal Kestis continues in Star Wars Jedi: Survivor™, a third-person,
                            galaxy-spanning, action-adventure game from Respawn Entertainment, developed in
                            collaboration with Lucasfilm Games. This narratively driven, single-player title picks up 5
                            years after the events of Star Wars Jedi: Fallen Order™ and follows Cal’s increasingly
                            desperate fight as the galaxy descends further into darkness.
                            Pushed to the edges of the galaxy by the Empire, Cal will find himself surrounded by threats
                            new and familiar. As one of the last surviving Jedi Knights, Cal is driven to make a stand
                            during the galaxy’s darkest times — but how far is he willing to go to protect himself, his
                            crew, and the legacy of the Jedi Order?</p>
                        <p class="flex items-center mt-3 mb-3">
                            <strong class="font-semibold text-gray-900 mr-2 ">Available on</strong>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-playstation mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M15.858 11.451c-.313.395-1.079.676-1.079.676l-5.696 2.046v-1.509l4.192-1.493c.476-.17.549-.412.162-.538-.386-.127-1.085-.09-1.56.08l-2.794.984v-1.566l.161-.054s.807-.286 1.942-.412c1.135-.125 2.525.017 3.616.43 1.23.39 1.368.962 1.056 1.356M9.625 8.883v-3.86c0-.453-.083-.87-.508-.988-.326-.105-.528.198-.528.65v9.664l-2.606-.827V2c1.108.206 2.722.692 3.59.985 2.207.757 2.955 1.7 2.955 3.825 0 2.071-1.278 2.856-2.903 2.072Zm-8.424 3.625C-.061 12.15-.271 11.41.304 10.984c.532-.394 1.436-.69 1.436-.69l3.737-1.33v1.515l-2.69.963c-.474.17-.547.411-.161.538.386.126 1.085.09 1.56-.08l1.29-.469v1.356l-.257.043a8.45 8.45 0 0 1-4.018-.323Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-xbox" viewBox="0 0 16 16">
                                <path
                                    d="M7.202 15.967a8 8 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33m-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.4 8.4 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.5 9.5 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4 4 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.8 7.8 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12 12 0 0 1-.654-.319Z" />
                            </svg>
                        </p>
                        <strong class="font-semibold text-gray-900 mr-2 text-3xl">
                            <span class="text-xl">Rp</span>100.000,00
                        </strong>
                        
                    </div>
                    <!-- Button Buy-->
                    <button class="btn mt-4 btn-wide text-white bg-black ">BUY NOW <svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <script>
            const carouselInner = document.getElementById('carouselInner');
            const carouselItems = document.querySelectorAll('.carousel-item');
            const totalItems = carouselItems.length;
            let currentIndex = 0;
        
            // Fungsi untuk menampilkan slide berikutnya
            function showNextSlide() {
                currentIndex = (currentIndex + 1) % totalItems;
                carouselInner.style.transform = `translateY(-${currentIndex * 100}%)`;
            }
        
            // Fungsi untuk menampilkan slide sebelumnya
            function showPrevSlide() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                carouselInner.style.transform = `translateY(-${currentIndex * 100}%)`;
            }
        
            // Mengatur interval auto-slide setiap 3 detik
            setInterval(showNextSlide, 3000);
        
            // Scroll manual dengan mouse
            let isScrolling = false;
            carouselInner.addEventListener('wheel', function (event) {
                if (isScrolling) return;
                isScrolling = true;
                
                if (event.deltaY > 0) {
                    showNextSlide();
                } else {
                    showPrevSlide();
                }
                
                // Mengatur delay untuk mencegah scrolling terlalu cepat
                setTimeout(() => {
                    isScrolling = false;
                }, 300);
            });
        </script>
</html>
