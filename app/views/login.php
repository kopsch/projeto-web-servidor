<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
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

    label {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
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
      background-color: #ff7b00;
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