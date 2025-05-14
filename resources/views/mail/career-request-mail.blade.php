<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hai RICEVUTO una nuova richiesta di lavoro</h1>
    <p>Ricevuta da email {{$info['email']}} per il ruolo di {{$info['role']}}.</p>
    <h4>Messaggio di richiesta:</h4>
    <p>{{$info['message']}}</p>
</body>
</html>