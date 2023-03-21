<?php
$users = array (
  "usuario1" => "senha1",
  "usuario2"=> "senha2"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (isset($users[$username]) && $users[$username] == $password) {
    echo "Login realizado com sucesso!";
  } else {
    echo "Nome de usuário ou senha incorretos.";
  }
}

?>