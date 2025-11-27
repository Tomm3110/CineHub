@extends('layouts.app')
@section('title', 'Detail du film')

@section('content')
    <div class="mx-auto max-w-xl px-4 lg:px-0 mt-7">
        <div
            class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-xl shadow-2xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-3xl font-bold text-white mb-2">Réinitialisation du mot de passe</h1>
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
                            @error('email')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
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

