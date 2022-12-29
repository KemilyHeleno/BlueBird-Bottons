<?php
   
session_start();


include 'conexao.php';
    
    $email   = $_POST['email'];
    $senha   = $_POST['senha'];
    $logar = $_POST['Logar'];  
    $s = "a";
    $s = null;
    $sql = "select * from public.usuario where email = '$email'  AND senha = '$senha'";
    $dados = pg_query($conecta,$sql);
    $_SESSION['email'] = $_POST['email'];
    
    while ($linha = pg_fetch_array($dados))
    {
        $s = $linha['senha'];
        $d = $linha['nome'];
        $u = $linha['id_usuario'];
    }
    
    if($s == $senha)
    {
        $_SESSION['nome']= $d;
        $_SESSION['idusuario']= $u;
        if($email == 'bluebird@gmail.com' && $senha == '123456')
        {
            $_SESSION['admin'] = true;
            echo '<script>alert("Bem-vindo, Administrador!");</script>';
        } else {
            $_SESSION['admin'] = false;
        }
        $_SESSION['logado'] = true;
        header('Location: dados.php');
    exit();
    }
    else
    {
    
        echo '<script>alert("Senha Errada!");</script>';
        header("refresh: 1; url=login.php");
    }
    

?>