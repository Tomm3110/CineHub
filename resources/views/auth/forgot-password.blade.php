@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl px-4 lg:px-0 mt-24">

        <div class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-xl shadow-2xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-3xl font-bold text-white mb-2">Réinitialisation du mot de passe</h1>
                    <p class="mt-2 text-sm text-gray-400">
                        Entrez votre email et nous vous enverrons un lien.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="mt-6">
                    @csrf

                    @if (session('status'))
                        <div class="mb-4 text-sm text-green-400 bg-green-900/20 p-3 rounded border border-green-800">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="grid gap-y-4">
                        <div>
                            <label for="email" class="block text-sm mb-2 text-gray-200">Adresse Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                       class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white placeholder-gray-500 focus:border-red-600 focus:ring-red-600 focus:ring-1 focus:outline-none transition"
                                       required autofocus placeholder="exemple@email.com">
                            </div>
                            @error('email')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-red-700 text-white hover:bg-red-600 transition-colors focus:outline-none shadow-lg mt-4">
                            Envoyer le lien de réinitialisation
                        </button>

                        <div class="text-center mt-2">
                            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-white transition">Annuler et revenir à la connexion</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
