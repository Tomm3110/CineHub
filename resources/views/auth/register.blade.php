@extends('layouts.app')
@section('title', 'Detail du film')

@section('content')

    <div class="mx-auto max-w-xl px-4 lg:px-0 mt-7">
        <div class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-xl shadow-2xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-3xl font-bold text-white mb-2">Créer un compte CinéHub</h1>
                    <p class="mt-2 text-sm text-gray-400">
                        Déjà inscrit ?
                        <a class="text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium"
                            href="{{ route('login') }}">
                            Connectez-vous ici
                        </a>
                    </p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="mt-6">
                    @csrf
                    <div class="grid gap-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="firstname" class="block text-sm mb-2 text-gray-200">Prénom</label>
                                <div class="relative">
                                    <input type="text" id="firstname" name="firstname"
                                        class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                        required autofocus value="{{ old('firstname') }}">
                                </div>
                                @error('firstname')
                                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm mb-2 text-gray-200">Nom</label>
                                <div class="relative">
                                    <input type="text" id="lastname" name="lastname"
                                        class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                        required value="{{ old('lastname') }}">
                                </div>
                                @error('lastname')
                                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm mb-2 text-gray-200">Adresse Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                    required autocomplete="email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm mb-2 text-gray-200">Mot de passe</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                    required ="new-password">
                            </div>
                            @error('password')
                                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password-confirm" class="block text-sm mb-2 text-gray-200">Confirmer le mot de
                                passe</label>
                            <div class="relative">
                                <input type="password" id="password-confirm" name="password_confirmation"
                                    class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1"
                                    required ="new-password">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-red-700 text-white hover:bg-red-600 transition-colors focus:outline-hidden focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none shadow-lg mt-4">
                            {{ __('S\'inscrire') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
