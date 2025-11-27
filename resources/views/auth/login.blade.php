<div class="mx-auto max-w-xl px-4 lg:px-0 mt-7">
    <div
        class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-xl shadow-2xl">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-3xl font-bold text-white mb-2">Se connecter à CinéHub 🎬</h1>
                <p class="mt-2 text-sm text-gray-400">
                    Pas encore inscrit ?
                    <a class="text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium"
                       href="{{route('register')}}">
                        Inscrivez-vous ici
                    </a>
                </p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf
                <div class="grid gap-y-4">
                    <div>
                        <label for="email" class="block text-sm mb-2 text-gray-200">Adresse Email</label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                   class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                   required autocomplete="email" autofocus>
                        </div>
                        {{-- Gestion des erreurs (optionnel, mais bonne pratique) --}}
                        @error('email')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex flex-wrap justify-between items-center gap-2 mb-3">
                            <label for="password" class="block text-sm text-gray-200">Mot de passe</label>
                            <a class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium"
                               href="{{route('password.request')}}">Mot de passe oublié ?</a>
                        </div>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                   class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                   required autocomplete="current-password">
                        </div>
                        @error('password')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center">
                        <div class="flex">
                            <input type="checkbox" name="remember" id="remember"
                                   class="shrink-0 mt-0.5 border-gray-200 rounded text-red-600 pointer-events-none focus:ring-red-500"
                                {{ old('remember') ? 'checked' : '' }}>
                        </div>
                        <div class="ms-3">
                            <label for="remember" class="text-sm text-gray-400">Se souvenir de moi</label>
                        </div>
                    </div>
                    <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-red-700 text-white hover:bg-red-600 transition-colors focus:outline-hidden focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none shadow-lg mt-4">
                        {{ __('Se connecter') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
