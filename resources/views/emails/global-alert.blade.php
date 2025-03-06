<!DOCTYPE html>
<html>
<head>
    <title>Alert Notification</title>
</head>
<body>
    <h1>Alert Notification</h1>
    <p>Dear {{ $user->name }},</p>
    <p>We wanted to inform you that an alert has been triggered for your account.</p>
    <p><strong>Alert Details:</strong></p>
    <ul>
        <li><strong>Type:</strong> {{ $alert->type }}</li>
        <li><strong>Message:</strong> {{ $alert->message }}</li>
        <li><strong>Date:</strong> {{ $alert->date }}</li>
    </ul>
    <p>Please take the necessary actions to address this alert.</p>
    <p>Thank you,</p>
    <p>The MoneyMind Team</p>
</body>
</html>