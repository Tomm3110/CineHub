<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du film</title>
</head>
<body>

<h1>Détails du film</h1>

<p><b>Titre :</b> {{ $film->titre }}</p>
<p><b>Année :</b> {{ $film->annee }}</p>
<p><b>Réalisateur :</b> {{ $film->realisateur }}</p>

<hr>

<a href="{{ route('film.index') }}">⬅ Retour à la liste</a>

</body>
</html>
