<nav class="fixed top-0 left-0 w-full z-50 bg-transparent backdrop-blur-md px-8 py-4 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center gap-3">
        <img src="/image/logo_test.png" class="h-10 w-auto rounded-md shadow-md">
    </div>

    <ul
        class="hidden md:flex space-x-8 text-lg bg-white/10 backdrop-blur-md px-6 py-2 rounded-full shadow-lg border border-white/20">
        <li><a href={{ route('accueil') }} class="text-white hover:text-red-400 transition-colors">Home</a></li>
        <li><a href={{ route('film.index') }} class="text-white hover:text-red-400 transition-colors">Films</a></li>
        <li><a href="#" class="text-white hover:text-red-400 transition-colors">Séries</a></li>
    </ul>

    <div class="flex items-center gap-3">
        <div>
            @auth()
            <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
            @endauth
        </div>
        <div>
        @guest()
            <a href={{ route('login') }}
                class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-5 py-2 rounded-full hover:bg-red-700/60 transition-all shadow-md">
                <span>Login</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                </svg>
            </a>
        @endguest

        @auth()
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-5 py-2 rounded-full hover:bg-red-700/60 transition-all shadow-md">
                    Déconnexion
                </button>
            </form>
        @endauth
        </div>
    </div>
</nav>
