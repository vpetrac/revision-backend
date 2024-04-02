<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Link</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>
    <p>We invite you to participate in our survey. Please click on the link below to start the survey:</p>
    <a href="{{ url($url . '/survey/' . $token) }}">Start Survey</a>
    <p>Thank you for your participation!</p>
</body>
</html>