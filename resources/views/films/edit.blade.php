<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-semibold mb-6">Modifier un film</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('film.update', $film->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Titre</label>
            <input type="text" name="title" value="{{ old('title', $film->title) }}" class="w-full rounded-lg border-gray-300 p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Media</label>
            <input type="text" name="media" value="{{ old('media', $film->media) }}" class="w-full rounded-lg border-gray-300 p-2">
        </div>

        <div class="flex items-center gap-3 mt-4">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Enregistrer</button>
            <a href="{{ route('film.index') }}" class="px-4 py-2 border rounded-lg text-gray-700">Annuler</a>
        </div>
    </form>
</div>

</body>
</html>
