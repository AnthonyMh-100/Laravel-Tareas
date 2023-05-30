<!DOCTYPE html>
<html>
<head>
    <title>Verificación de correo electrónico</title>
</head>
<body>
    <h2>Hola, {{ $user->fullname }}</h2>
    <p>Por favor, haz clic en el siguiente enlace para verificar tu dirección de correo electrónico:</p>
    <a href="{{ route('verification.verify', $user->verification_token) }}">Verificar correo electrónico</a>
</body>
</html>
