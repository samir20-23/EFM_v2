<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" class="mb-3">
        <input name="search" class="form-control" placeholder="{{ __('search') }}" value="{{ request('search') }}">
    </form>

    <a href="{{ route('sailes.create') }}" class="btn btn-primary mb-3">{{ __('add') }}</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('name') }}</th>
                <th>{{ __('espace') }}</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sailes as $saile)
            <tr>
                <td>{{ $saile->name }}</td>
                <td>{{ $saile->espace }}</td>
                <td>
                    <a href="{{ route('sailes.edit', $saile->id) }}" class="btn btn-warning btn-sm">{{ __('edit') }}</a>
                    <form action="{{ route('sailes.destroy', $saile->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">{{ __('delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sailes->links() }}
</div>
@endsectio 
</body>

</html>
