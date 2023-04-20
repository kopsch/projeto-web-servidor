<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão</title>
    <link rel="stylesheet" href="Css/sessao.css">


</head>

<body>
    <?php
        $user = $_SESSION['user'];
    ?>
    <div class="container">
        <form>
            <h2>Bem vindo(a), <?php echo $user->getName(); ?></h2>
        </form>
        <a href="api/logout">
            <button>Logout</button>
        </a>
    
        <a href="edit"><button>Editar Usuario</button></a>
    </div>
</body> 

</html>