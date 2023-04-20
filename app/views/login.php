<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hello Kitty</title>
<link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <form id="login-form" action="/projeto-web-servidor/api/login" method="POST">
        <h2>Login</h2>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>

        <input type="password" id="password" name="password" required>
    
        <button type="submit">Entrar</button>

        <a href="register">Cadastre-se</a>
        </form>
    </div>

</body>

</html>
