<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Widget Result</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        .widget { border: 1px solid #000; padding: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Widget Result</h1>

    @if(isset($error))
        <div class="error">
            <p>Error: {{ $error }}</p>
        </div>
    @elseif(isset($result))
        <div class="widget">
            <h2>{{ $result['title'] }}</h2>
            @if(isset($result['value']))
                <!-- Display for a numeric value widget -->
                <p>{{ $result['value'] }}</p>
            @elseif(isset($result['list']))
                <!-- Display for a list widget -->
                <ul>
                    @foreach($result['list'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                <p>Total: {{ $result['total'] }}</p>
            @endif
        </div>
    @else
        <p>No result data available.</p>
    @endif

    <br>
    <a href="{{ route('pkgwidget.test') }}">Back to Test Form</a>
</body>
</html>
