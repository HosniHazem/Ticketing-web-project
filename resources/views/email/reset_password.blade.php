<!doctype html>
<html>
<head>
    <title>Réinitialisation mot de passe </title>
</head>

<body>
<h1>Bonjour  {{ $user->name }} {{ $user->firstName }}!</h1>
Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe.<br>
<a href='http://localhost:3000/reset/{{$token}}'>Réinitialiser mon mot de passe</a>

</body>
</html>
