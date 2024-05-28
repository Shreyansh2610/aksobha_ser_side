<!DOCTYPE html>
<html>
<head>
    <title>New Purchase</title>
</head>
<body>
    <p>Hello {{ $name }},</p>
    <p>Thank you for your purchase. Your account has been created. Here are your login details:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>
</body>
</html>
