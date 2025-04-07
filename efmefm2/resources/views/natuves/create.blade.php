<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <form method="POST" action="{{ route('natuves.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ __('name') }}</label>
                <input name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <button class="btn btn-success">{{ __('add') }}</button>
        </form>
    </div>
    @endsection
</body>

</html>
