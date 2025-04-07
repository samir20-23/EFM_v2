<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body style='padding: 5%;'>
    <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 30px; " class="grid mb-8 border border-gray-200 rounded-lg shadow-xs dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800">
        <button style="margin-top: 10px;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <a href="{{route('livres.create')}}">Ajouter Livre</a>
        </button>
        <table class="border-collapse border border-gray-400 ...">
            <thead>
                <tr>
                    <th class="border border-gray-300 ...">Titre</th>
                    <th class="border border-gray-300 ...">Auteur</th>
                    <th class="border border-gray-300 ...">Categorie</th>
                    <th class="border border-gray-300 ...">Nombre de pages</th>
                    <th class="border border-gray-300 ...">Date</th>
                    <th class="border border-gray-300 ...">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                <tr>
                    <td class="border border-gray-300 ...">{{$livre->titre}}</td>
                    <td class="border border-gray-300 ...">{{$livre->auteur}}</td>
                    <td class="border border-gray-300 ...">{{$livre->categorie}}</td>
                    <td class="border border-gray-300 ...">{{$livre->nombre_pages}}</td>
                    <td class="border border-gray-300 ...">{{$livre->created_at}}</td>
                    <td class="border border-gray-300 ...">
                        <a href="{{route('livres.edit', $livre->id)}}">Edit</a>
                        <form action="{{route('livres.destroy', $livre->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $livres->Links() }}
        @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif
    </div>
</body>
</html>
