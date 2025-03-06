<!DOCTYPE html>
<html>
<head>
    <title>Category Alert</title>
</head>
<body>
    <h1>Category Alert</h1>
    <p>Hello {{ $user->name }},</p>
    <p>We wanted to let you know that there has been an update in the category you are following:</p>
    <p><strong>Category:</strong> {{ $category->name }}</p>
    <p>Thank you for staying with us!</p>
    <p>Best regards,</p>
    <p>The MoneyMind Team</p>
</body>
</html>