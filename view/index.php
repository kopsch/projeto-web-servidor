
<!-- Forlularios HTML -->  
<html>
        <head>
                <meta charset = "UTF-8">
        </head>
        <BODy>
                <h1>login</h1>
       
<form action="" method="post" name="">
        <label for="username">Nome do usuário:</label>
        <input type="text" name="username">

        <label for="password">Senha:</label>
        <input type="password" name="password"> 
        
        <input type="submit" name="submit" value="Logar!" />
</form>
        <?php
         /* Variaveis*/
                $usuario = @$_REQUEST ['username'];
                $senha = @$_REQUEST['password'];
                $submit = @$_REQUEST ['submit'];

                /*instanciando usuarios */

                $usuario1 ='gustavo';
                $senha1 = 'gustavo17';

                $usuario2 = 'jose';
                $senha2 = '123';

                if($submit){

                        if($usuario == "" || $senha == ""){
                                //   echo "<script:alert('Favor, preencher todos os campos solicitados!');</script>";
                        }
                        else{
                                if(($usuario == $usuario1 && $senha == $senha1) || ($usuario ==$usuario2 && $senha == $senha2)){
                                        //Incio de uma sessão para o usuario 
                                        session_start();

                                        $_SESSION['usuario']=$usuario;
                                        $_SESSION['senha']=$senha;
                               
                                        header("Location: painel.php");
                                        
                                }

                                else{
                                        echo"<script>alert('Usuario ou senha incorretos');</script>";
                                }
                        }
                }
        ?>
 </BODy>
</html>

