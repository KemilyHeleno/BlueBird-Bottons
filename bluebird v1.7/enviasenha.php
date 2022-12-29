<?php

include "minhasfuncoes.php";

echo "<form name='formSenha' method='post' action=''>";
echo "Login<br><input type='text' name='login' size=40> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type='submit' value='Enviar e-mail'>";
echo "</form>";

if ($_POST)  {
   echo "<br>Recuperando a senha...";
   $NovaSenha = GeraSenha();
   echo "<br>Senha gerada: ".$NovaSenha;
   if (EnviaEmail ( $_POST['login'], "Recuperação de Senha", "<html><body>Sua nova senha: <b>".$NovaSenha."</b></body></html>", "Suporte" ))
   {
      if (ExecutaSQL("update public.usuario set senha='".$NovaSenha."' where email='".$_POST['login']."'"))
          {
            echo"<script>
            {
                window.alert('Senha alterada com sucesso!')
                var frase = 'Nova senha: ' + '$NovaSenha';
                window.alert(frase)
                window.location.href = 'login.php';
            }
            </script>";
          
          }
          else
          {
              echo"<script>
            {
                window.alert('É preciso criar a tabela!')
                window.location.href = 'login.php';
            }
            </script>";
          }
       
   }
   
   else
   {
       echo"<script>
            {
                window.alert('Erro ao enviar e-mail!')
                window.location.href = 'login.php';
            }
            </script>";
   }
}


echo "<br><br><br><br><a href='login.php'>Voltar para o Login</a>";

?>