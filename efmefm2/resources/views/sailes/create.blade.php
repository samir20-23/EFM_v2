<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('sailes.store') }}">
        @csrf
        <input name="name" placeholder="Name">
        <input name="espace" placeholder="Espace">
        <button>Save</button>
        </form>
</body>
</html>