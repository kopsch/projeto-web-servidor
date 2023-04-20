<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: rgb(159, 103, 255);
            background: radial-gradient(circle, rgba(159, 103, 255, 1) 0%, rgba(255, 187, 252, 1) 100%);
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

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 10px;
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: #ffcbdb;
        }

        .error {
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      margin: auto;
      width: 250px;
      height: 40px;
      padding: 10px;
      border-radius: 5px;
      background-color: red;
      color: white;
      text-align: center;
    }

    .back {
        background-color: #000;
        color: #fff;
        border-radius: 100%;
        padding: 10px;
        font-size: 10px;
        border: none;
        cursor: pointer;
    }

    </style>
</head>

<body>
    <div class="container">
        <a href="/projeto-web-servidor">
            <button class="back">⇽</button>
        </a>
        <form action="/projeto-web-servidor/api/register" method="POST">
            <h2>Cadastro</h2>
            <label for="name">Usuario</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>

            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Cadastrar">
        </form>
        <?php
        if (isset($registerError)) {
            echo '<p class="error">' . $registerError . '</p>';
        }
        ?>
    </div>
</body>

</html>