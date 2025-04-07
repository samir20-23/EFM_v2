<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body style="font-family: sans-serif; padding: 10px;">
    <h1 style="color: oklch(0.623 0.214 259.815); font-size: 40px;">Welcome to the Dashboard</h1>
    @if ($livres->count() > 0)
    <h2 style="font-size: 25px">current number of Books :</h2>
    <h1 style="color: oklch(0.623 0.214 259.815); font-size: 40px;">{{ $livreCount }}</h1>
    <h2 style="font-size: 25px">The 5 latest books to date :</h2>
    @foreach($livres as $livre)
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; border: 5px solid oklch(0.623 0.214 259.815); margin-bottom: 5px; font-size: 20px; width: 40%;">
        <p style="margin: 5px;">Titre : {{$livre->titre}}</p>
        <p style="margin: 5px;">Auteur : {{$livre->auteur}}</p>
        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{$livre->categorie}}</span>
    </div>
    @endforeach
    @else
    <h1 style="color: red; font-size: 20px;">No books found</h1>
    @endif
</body>
</html>
