<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
<form method="POST" action="{{ route('sailes.update', $saile) }}">
    @csrf @method('PUT')
    <label>{{ __('name') }}</label>
    <input name="name" value="{{ old('name', $saile->name) }}">
    <label>{{ __('espace') }}</label>
    <input name="espace" value="{{ old('espace', $saile->espace) }}">
    <button>{{ __('update') }}</button>
</form>
</body>
</html>