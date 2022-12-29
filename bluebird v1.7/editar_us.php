<?php
session_start();
include_once("conexao.php");

$name = $_SESSION['nome'];
$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST,'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);
$fone = filter_input(INPUT_POST,'fone', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST,'cep', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST,'data', FILTER_SANITIZE_STRING);

$resultado = "UPDATE public.usuario SET nome='$nome',cpf='$cpf',email='$email',senha='$senha',fone='$fone',cep='$cep',data='$data' WHERE nome='$name' ";
$resultado_usuario = mysaqli_query($conecta,$resultado);

if(mysql_affected_rows($conecta)){
            echo '<script>alert("Dados Atualizado!");</script>';
        header("refresh: 1; url=dados.php");
}

else{
            echo '<script>alert("Erro!");</script>';
        header("refresh: 1; url=login.php");
}














?>