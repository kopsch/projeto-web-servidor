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
            background: rgb(159,103,255);
            background: radial-gradient(circle, rgba(159,103,255,1) 0%, rgba(255,187,252,1) 100%);
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

        input {
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 10px;
        }

        button {
            background-color: rgb(0, 0, 0);
            border: none;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            padding: 10px 15px;
            transition: background-color 0.2s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="/api/user/edit" method="POST">
            <h2>Editar Usuário</h2>
            <label for="name">Nome:</label>
            <input for="name" id="text" name="name">

            <label for="email">Email:</label>
            <input for="email" id="text" name="email">

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>