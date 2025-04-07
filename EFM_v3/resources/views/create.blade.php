<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <form class="max-w-sm mx-auto" method="POST" action="{{ route('livres.store') }}">
        @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif
        <h1>Ajouter un Livre</h1>
        <h1>------------------------------------------------------------</h1>
        @csrf
        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre de Livre</label>
            <input name="titre" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('titre')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Auteur de Livre</label>
            <input name="auteur" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('auteur')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie de Livre</label>
            <input name="categorie" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('categorie')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre des pages de Livre</label>
            <input name="nombre_pages" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('nombre_pages')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <button style="margin-top: 10px;" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
    </form>
</body>
</html>