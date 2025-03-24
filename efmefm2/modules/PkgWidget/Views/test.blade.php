<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Widget Service</title>
</head>
<body>
    <h1>Test Widget Service</h1>
    <form action="{{ route('pkgwidget.execute') }}" method="POST">
        @csrf
        <label for="method_name">Method Name:</label>
        <input type="text" id="method_name" name="method_name" placeholder="Enter method name">
        <button type="submit">Execute</button>
    </form>
</body>
</html>
