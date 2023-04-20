<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão</title>
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
    </style>
</head>

<body>
    <?php
    $user = $_SESSION['user'];
    ?>
    <div class="container">
        <form>
            <h2>Bem vindo(a),
                <?php echo $user->getName(); ?>
            </h2>
        </form>
        <a href="api/logout">
            <button>Logout</button>
        </a>

        <a href="edit"><button>Editar Usuario</button></a>
    </div>
</body>

</html>