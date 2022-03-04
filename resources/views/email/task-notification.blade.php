<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo log registrado</title>
    </head>

    <body>
        <p>
            <strong>Usuario: </strong> {{ $details['user'] }}
            <br>
            <strong>Tarea asociada: </strong> {{ $details['task'] }}
            <br>
        </p>
        <h5>Log escrito:</h5>
        <p>
            {{ $details['log'] }}
        </p>
    </body>
</html>
