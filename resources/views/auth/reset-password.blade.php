@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl px-4 lg:px-0 mt-24">
        <div class="bg-black/40 backdrop-blur-sm border border-red-950/50 rounded-xl shadow-2xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-3xl font-bold text-white mb-2">Nouveau mot de passe</h1>
                    <p class="mt-2 text-sm text-gray-400">
                        Choisissez un nouveau mot de passe sécurisé.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="mt-6">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="grid gap-y-4">

                        <div>
                            <label for="email" class="block text-sm mb-2 text-gray-200">Adresse Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required readonly
                                   class="py-3 px-4 block w-full border-red-900/30 rounded-lg text-sm bg-black/30 text-gray-400 cursor-not-allowed focus:outline-none">
                            @error('email')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm mb-2 text-gray-200">Nouveau mot de passe</label>
                            <input type="password" id="password" name="password" required autofocus
                                   class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1 focus:outline-none transition">
                            @error('password')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm mb-2 text-gray-200">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                   class="py-3 px-4 block w-full border-red-900/50 rounded-lg text-sm bg-black/50 text-white focus:border-red-600 focus:ring-red-600 focus:ring-1 focus:outline-none transition">
                        </div>

                        <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-red-700 text-white hover:bg-red-600 transition-colors focus:outline-none shadow-lg mt-4">
                            Changer le mot de passe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
