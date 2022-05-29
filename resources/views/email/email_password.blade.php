<html>
<head>
    
    <title>Bonjour {{ $user->name }} {{ $user->firstName }}!</title>
</head>

<body>
<h1>Bonjour {{ $user->name }}{{ $user->firstName }}!</h1>
<h2>Votre adresse e-mail  : {{ $user->email }}</h2>
<h2>Votre mot de passe : {{ $password }}</h2>
</body>
</html>
