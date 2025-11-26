<div class="card" style="width: 18rem; margin-bottom: 20px;">
    <img src="{{ $film->media }}" class="card-img-top" alt="{{ $film->title }}">

     <div class="card-body">
         <h5 class="card-title">{{ $film->title }}</h5>
         <p class="card-text">{{ $film->description }}</p>
         <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">Voir</a>
         <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning">Modifier</a>

         <form action="{{ route('films.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');" style="display:inline-block;">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Supprimer</button>
         </form>
     </div>
</div>

