<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
</head>
<body>
    <form method="POST" action="{{ url('/side-contact') }}">
        @csrfWithoutAutocomplete
        <input type="text" name="test" placeholder="Test input">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
