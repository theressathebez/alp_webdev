<header class="bg-white p-2 md:p-4">
    <div class="flex items-center justify-between px-4 py-2 md:px-6 md:py-4 lg:px-8">
        <div class="flex items-center space-x-3">
            <!-- Menu Icon -->
            <button id="hamburger-menu" class="md:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-7 md:h-8">
            <h1 class="text-base md:text-xl  font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-pink-500 to-orange-500">
                Digital Creative
            </h1>
        </div>

        <!-- Desktop Navbar Menu -->
        <nav class=" items-center justify-center flex-1 hidden md:flex">
            <ul class="flex gap-6 list-none text-sm">
                <li>
                    <a href="/"
                        class="{{ request()->is('home') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Home</a>
                </li>
                <li>
                    <a href="/competition"
                        class="{{ request()->is('competition') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Competitions</a>
                </li>
                
                <li>
                    @auth
                        <a href="/leader"
                            class="{{ request()->is('account') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Account</a>
                    @else
                        <a href="{{ route('leader.login.get') }}"
                            class="{{ request()->is('account') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Account</a>
                    @endauth
                </li>
            </ul>
        </nav>

        <!-- Sign Up Button -->
        <div class="ml-2">
            @guest
                <a href="{{ route('team.create') }}"
                    class="bg-blue-500 text-white px-4 md:px-6 py-2 md:py-3 rounded-lg text-xs md:text-sm  font-semibold hover:bg-blue-600">
                    Sign Up Now
                </a>
            @endguest
        </div>

    </div>
</header>

<!-- Mobile Off-Canvas Menu -->
<div id="mobile-menu"
    class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50 md:hidden">
    <div class="flex justify-end p-4">
        <button id="close-menu" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <nav class="flex flex-col items-center mt-4 space-y-6">
        <ul class="list-none text-center w-full">
            <li>
                <a href="/"
                    class="{{ request()->is('home') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 block py-2">Home</a>
            </li>
            <li>
                <a href="/competition"
                    class="{{ request()->is('competition') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 block py-2">Competitions</a>
            </li>
            <li>
                <a href="/result"
                    class="{{ request()->is('result') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 block py-2">Results</a>
            </li>

            <li>
                @auth
                    <a href="/leader"
                        class="{{ request()->is('account') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Account</a>
                @else
                    <a href="{{ route('leader.login.get') }}"
                        class="{{ request()->is('account') ? 'font-bold text-black' : 'font-normal text-gray-500' }} hover:text-gray-700 border-b-2 border-transparent hover:border-blue-500">Account</a>
                @endauth
            </li>

        </ul>
    </nav>
</div>

<!-- JavaScript for Off-Canvas Menu Toggle -->
<script>
    const hamburgerMenu = document.getElementById('hamburger-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    // Open Menu
    hamburgerMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
    });

    // Close Menu
    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
    });
</script>
