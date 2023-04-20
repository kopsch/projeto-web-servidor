<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 500px;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        input[type="submit"]:hover {
            background-color: #8c00ff;

        }

        input[type="email"],
        input[type="password"],
        input [type="username"] {
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 10px;
        }
    </style>
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