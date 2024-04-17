<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Link</title>
</head>
<body>
    <p>Poštovani/a {{ $user->name }},</p>
    <p>molimo ispuniti uputnik za revidirani subjekt za potrebe revizije: {{ $revision->name }}.</p>
    <a href="{{ url($url) }}">Link na upitnik</a>
</body>
</html>