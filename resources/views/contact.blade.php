<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CinéHub – Contact</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col">

<x-header></x-header>

<main class="flex-grow flex flex-col items-center justify-center px-6 py-12">
    <h1 class="text-4xl md:text-5xl font-serif font-semibold mb-6 text-center">Contactez-nous</h1>
    <p class="text-lg md:text-xl mb-12 max-w-xl text-center">
        Vous avez une question, une suggestion ou besoin d’aide ? Remplissez le formulaire ci-dessous.
    </p>

    <form action="#" method="POST"
          class="w-full max-w-lg bg-white/10 backdrop-blur-md rounded-xl p-8 shadow-lg border border-white/20">
        <div class="mb-6">
            <label for="name" class="block mb-2 font-semibold text-white">Nom complet</label>
            <input type="text" id="name" name="name"
                   class="w-full rounded-md border border-white/30 bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-red-600"
                   placeholder="Votre nom" />
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 font-semibold text-white">Adresse email</label>
            <input type="email" id="email" name="email"
                   class="w-full rounded-md border border-white/30 bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-red-600"
                   placeholder="exemple@domaine.com" />
        </div>

        <div class="mb-6">
            <label for="message" class="block mb-2 font-semibold text-white">Message</label>
            <textarea id="message" name="message" rows="5"
                      class="w-full rounded-md border border-white/30 bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-red-600"
                      placeholder="Votre message ici..."></textarea>
        </div>

        <button type="submit"
                class="w-full bg-red-700 hover:bg-red-800 transition-colors rounded-full py-3 text-white font-semibold text-lg">
            Envoyer
        </button>
    </form>
</main>

</body>
</html>
