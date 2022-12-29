<?php 

    // conecta com o bd
    include_once("conexao.php");

    $cod = 0;
    $sql = "select * from public.usuario order by id_usuario;";
    $dados = pg_query($conecta,$sql);
    while ($linha = pg_fetch_array($dados))
    {
        $cod = $linha['id_usuario'];
    }
    $cod += 1;

    $nome   = $_POST['nome'];
    $cpf    = $_POST['cpf'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha'];
    $fone   = $_POST['fone'];
    $cep    = $_POST['cep'];
    $datan  = $_POST['datan'];

    $sql="insert into public.usuario (id_usuario, nome, cpf, email, senha, fone, cep, nasc, exc) values ($cod, '$nome', '$cpf', '$email', '$senha', '$fone', '$cep', '$datan', 'n')";

    echo $sql; // comente essa linha quando estiver td funcionando pra vc

    $resultado=pg_query($conecta, $sql);
    $linhas=pg_affected_rows($resultado);

    if ($linhas > 0)
    {
       $msg = "<br>Cliente gravado !!!<br>";
    }
    else 
    {
       $msg = "<br><b>Erro SQL:</b>".pg_last_error()."<br>";
    }

    echo "<br>".$msg."</br>";

    // Fecha a conexão com o PostgreSQL//
    pg_close($conecta);

    echo "<br><a href='cadastro.php'>Voltar</a>";


    echo "<br><br><br><br>Caso der erro, <a href='login.php'>clique aqui</a>";
?>

<script>
    alert('Redirecionando...');
    
    window.location.replace("login.php");
}, 5000);
    
</script>


