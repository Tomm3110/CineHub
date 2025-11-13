<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinéHub – Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-red-950 via-red-900 to-black text-white min-h-screen flex flex-col">
<x-header></x-header>


<main class="flex-grow flex flex-col items-center justify-center text-center px-6">
    <h1 class="text-4xl md:text-5xl font-serif font-semibold mb-3">Votre avis fait le film</h1>
    <h2 class="text-2xl md:text-3xl font-light mb-8">Osez donner votre étoile</h2>

    <a href="#"
       class="border border-red-600 text-white text-lg rounded-full px-6 py-3 hover:bg-red-800 transition-all">
        Créer un compte
    </a>
</main>

</body>
</html>
