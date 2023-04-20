<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/cadastro.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="/projeto-web-servidor/api/register" method="POST">
            <h2>Cadastro</h2>
            <label for="name">Usuario</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>

            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Cadastrar" >
        </form>
    </div>
</body>

</html>