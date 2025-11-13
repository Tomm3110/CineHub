<form action="{{route('taches.index')}}">
    <div class=" max-w-1/2 pl-10 mb-4 py-4 mt-4 flex  items-center gap-3 border border-gray-200 pb-4 dark:border-gray-700 rounded-2xl">
        <label for="categorie" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
Catégorie : </label>
        <select
                name="cat"
                id="categorie"
                class="mt-0.5 w-10rem rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white"
>
            <option value="All">Toutes</option>
@foreach($categories as $categorie)
    <option value="{{$categorie}}"
        @selected($cat === $categorie)>{{$categorie}}</option>
    @endforeach
    </select>
    <button type="submit"
            class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm bg-transparent relative text-stone-700 hover:text-stone-700 border-stone-500 hover:bg-transparent duration-150 hover:border-stone-600 rounded-full hover:opacity-60 hover:shadow-none"
    >
        Filtrer
    </button>
    </div>
    </form>
