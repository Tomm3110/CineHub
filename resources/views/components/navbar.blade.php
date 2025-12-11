<nav class="fixed top-0 left-0 w-full z-50 bg-transparent backdrop-blur-md px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <img src="/image/logo_test.png" class="h-10 w-auto rounded-md shadow-md">
    </div>

    <ul class="hidden md:flex space-x-8 text-lg bg-white/10 backdrop-blur-md px-6 py-2 rounded-full shadow-lg border border-white/20">
        <li><a href="{{ route('accueil') }}" class="text-white hover:text-red-400 transition-colors">Home</a></li>
        <li><a href="{{ route('film.index') }}" class="text-white hover:text-red-400 transition-colors">Films</a></li>
        <li><a href="#" class="text-white hover:text-red-400 transition-colors">Séries</a></li>
    </ul>

    <div class="flex items-center gap-3">
        <div>
            @auth
                <a href="{{ route('user.show') }}" class="text-white hover:text-red-400 transition-colors">
                    <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                </a>
            @endauth
        </div>
        <div>
            @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-5 py-2 rounded-full hover:bg-red-700/60 transition-all shadow-md">
                    <span>Login</span>
                </a>
            @endguest

            @auth
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
