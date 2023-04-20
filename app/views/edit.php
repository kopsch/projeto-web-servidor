<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="Css/editar.css">

</head>

<body>
    <div class="container">
        <form action="/projeto-web-servidor/api/edit" method="POST">
            <h2>Editar Usuário</h2>
            <label for="name">Usuario:</label>
            <input for="name" id="text" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>