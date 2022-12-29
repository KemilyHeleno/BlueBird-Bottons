<?php session_start(); ?>
<HTML lang="pt-br">
    <HEAD>
        <TITLE> BlueBird - Produtos </TITLE>
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="Estilos/estilo_home.css" />
        
        <link rel="sortcut icon" href="Imagens/icone_pagina.png" type="image/x-icon" />
        
    </HEAD>
    <BODY link="black" vlink="red" alink="black">
     
      <div id = "mae">
       <font face="Arial" size="7">
        <ul class="menu">
                        <li>
                            <div id="logo">
                                <a href="home.php">
                                    <img src="Imagens/homefotos/logomarca.png" width="300">
                                </a>
                            </div>
                        </li>
                      
                        <li>
                            <br>
                            <div id="divBusca">
                                <form method = "POST" action="pesquisar.php">
                                <input type="text" name="pesquisar" id="txtBusca" placeholder="Buscar..."/>
                                <!-- insere, dentro do input, um texto que será apagado quando começar a digitar dentro do campo, e mostrado de novo ao perder o focus do elemento e o conteúdo seja vazio. -->
                                <div id="btn_busca">
                                    <button type="submit" id="btn_Busca">
                                        <img src="Imagens/homefotos/lupa.png" height="60" width="65"   alt="Buscar"/>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </li>
                        <li>
                            &nbsp;&nbsp; &nbsp;&nbsp;
                            <div id="perfil">
                                      <?php
                        if($_SESSION['logado'] == true){
                        echo '                                <a href="dados.php">
                                    &nbsp;&nbsp; <img src="Imagens/homefotos/Perfil.png" height="80" width="85">
                                </a>' ;
                        }
                        else{
                        echo '                                <a href="login.php">
                                    &nbsp;&nbsp; <img src="Imagens/homefotos/Perfil.png" height="80" width="85">
                                </a>'; 
                            
                        }
                    ?> 
                            </div>
                        </li>
                        <li>
                            &nbsp;&nbsp;
                            <div id="carrinho">
                                <a href="carrinho.php">
                                    
                                    &nbsp;&nbsp; <img src="Imagens/homefotos/carrinho.PNG" height="100" width="105">
                                </a>
                            </div>
                        </li>
                    </ul>
            
                    <br>
                    <br>
                    <br>
                    <hr>
                                      <?php
                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)  
                    {?> <div id="btn"> //
                        <a class="btn" href="func_adm.php" style="text-decoration:none"> Admin </a>
                    </div> 
           <?php 
                        
                    } ?>
                    <div id="btn">
                        <a class="btn" href="home.php" style="text-decoration:none"> Home </a>
                    </div>
                        
                    <div id="btn">
                        <a class="btn" href="comprar.php" style="text-decoration:none"> Produtos   </a>   
                    </div>
                    
                    
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)  {
                            
                        }
                        else{
                        if($_SESSION['logado'] == true){
                            echo '<div id="btn">';
                        echo '<a class="btn" href="dados.php" style="text-decoration:none" > Login </a>' ;
                            echo '</div>';
                        }
                        else{
                            echo '<div id="btn">';
                        echo '<a class="btn" href="login.php" style="text-decoration:none" > Login </a>'; 
                            echo '</div>';
                        }
                        }
                    ?>        
                    
                    
                        
                        
                    <div id="btn">
                        <a class="btn" href="sobre.php" style="text-decoration:none"> DEV </a> 
                    </div>
                              
                    <div id="btn">
                        <a class="btn" href="saiba.php" style="text-decoration:none"> Saiba Mais </a> 
                    </div>
            
                    <hr>

<?php
    
    include 'conexao.php';
    
    
    
    $sql = "select * from public.produto order by id_produt";
    $dados = pg_query($conecta,$sql);
    while ($linha = pg_fetch_array($dados))
    {
        $codd = $linha['id_produt'];
    }
    $codd += 1;
    
    $codn;
    
    
    echo "<center>";
        echo "<a href=func_adm.php?codigo=0>Pesquisar/remover/habilitar/atualizar produtos</a>";
        echo "<br>";
        echo "<a href=func_adm.php?codigo=1&id=".$codd.">Adicionar produtos</a>";
        echo "<br>";
        echo "<a href=func_adm.php?codigo=4>Pesquisar/remover/habilitar usuários</a>";
        echo "<br><br><br><br>";
    echo "</center>";
    
    if ($_GET)
    {
        $codigo = $_GET['codigo'];
        $id;
        $exc;
        $idalt;
        //$cod_pizza = $_GET['cod_pizza'];
        
        if($codigo==0)
        {
            $sql = "select * from public.produto order by id_produt";
            $dados = pg_query($conecta, $sql);
            
            /*$id;
            $quant;
            $valor;
            $estampa;
            $fk_idcat;
            $excluido;*/
            
            $id;
            $nome;
            $valor;
            $cat;
            $quant;
            $exc;
            
            echo "<center>";
            echo "<table border='9'>";
            echo "<tr><td>Id<td>Nome<td>Valor<td>Categoria<td>Quantidade<td>Excluído?<td>Alternar exclusão<td>Atualizar dados";
            while ($linha = pg_fetch_array($dados))
            {
                $id = $linha['id_produt'];
                $nome = $linha['nome'];
                $valor = $linha['valor'];
                $cat = $linha['categoria'];
                $quant = $linha['quant'];
                $exc = $linha['excluido'];
                
                if($exc == "n" || $exc == "N")
                {
                    $sn=0;
                    $exc = "Não";
                }
                else if($exc == "s" || $exc == "S")
                {
                    $sn=1;
                    $exc = "Sim";
                }
                
                if($cat==1)
                {
                    $cat="Pokémon";
                }
                else if($cat==2)
                {
                    $cat="Marvel";
                }
                else if($cat==3)
                {
                    $cat="DC";
                }
                else if($cat==4)
                {
                    $cat="CTI";
                }
                
                
                
                echo "<tr><td>".$id."<td>".$nome."<td>".$valor."<td>".$cat."<td>".$quant."<td>".$exc."<td><a href=func_adm.php?codigo=3&id=".$id."&exc=".$sn."><img src='Imagens/exc_icon.png' height=50></a><td><a href=func_adm.php?codigo=1&id=".$id."><img src='Imagens/alt_icon.png' height=50></a>";
                
            }
            echo "</table>";
            echo "</center>";
        }
        else if($codigo==1)
        {
            $id = $_GET['id'];
            
            if($id == $codd)
            {
                $nome;
                $valor;
                $cat;
                $quant;
                $exc;
                
                
                echo "<center>";
                echo "<form method='post' action='func_adm.php'>";
                echo "<input type='hidden' name='codn' value=".$id.">";
                echo "<br>";
                echo "<br>";
                echo "Nome<br>";
                echo "<input type='hidden' name='codg' value=2>";
                echo "<input type='text' name='nome'>";
                echo "<br>";
                echo "<br>";
                echo "Valor<br>";
                echo "<input type='text' name='valor'>";
                echo "<br>";
                echo "<br>";
                echo "Categoria (números)<br>";
                echo "<input type='number' name='cat'>";
                echo "<br>";
                echo "<br>";
                echo "Quantidade do produto<br>";
                echo "<input type='text' name='quant'>";
                echo "<br>";
                echo "<input type='hidden' name='exc' value='n'>";
                echo "<br>";
                
                echo "<input type='submit' value='Adicionar produto'/>";
                echo "</center></form>";
                
                
            }
            else
            {
                $nome;
                $valor;
                $cat;
                $quant;
                $exc;
                
                
                $sql = "select * from public.produto where id_produt=$id";
                $dados = pg_query($conecta,$sql);   // faz o select
                $linha = pg_fetch_array($dados);    // carrega o registro num vetor $linha
                
                $nome = $linha['nome'];
                $valor = $linha['valor'];
                $cat = $linha['categoria'];
                $quant = $linha['quant'];
                $exc = $linha['excluido'];
                
                
                echo "<center>";
                echo "<form method='post' action='func_adm.php'>";
                echo "<input type='hidden' name='codn' value=".$id.">";
                echo "<br>";
                echo "<br>";
                echo "<input type='hidden' name='codg' value=1>";
                echo "Nome<br>";
                echo "<input type='text' name='nome' value='".$nome."'>";
                echo "<br>";
                echo "<br>";
                echo "Valor<br>";
                echo "<input type='text' name='valor' value='".$valor."'>";
                echo "<br>";
                echo "<br>";
                echo "Categoria (números)<br>";
                echo "<input type='number' name='cat' value=".$cat.">";
                echo "<br>";
                echo "<br>";
                echo "Quantidade do produto<br>";
                echo "<input type='text' name='quant' value=".$quant.">";
                echo "<br>";
                echo "<input type='hidden' name='exc' value=".$exc.">";
                echo "<br>";
                
                echo "<input type='submit' value='Alterar produto'/>";
                echo "</center></form>";
                
                
            }
        }
        else if($codigo==3)
        {
            $idalt = $_GET['id'];
            $exc = $_GET['exc'];
            
            if($exc==0)
            {
                
                $sql = "update public.produto set excluido='s' where id_produt=$idalt";
                $dados = pg_query($conecta, $sql);

                $resultado=pg_query($conecta, $sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                {
                   $msg = "Produto excluído.";
                }
                else 
                {
                   $msg = "Erro SQL:".pg_last_error()."";
                }
                
                
            }
            else /*($exc==1)*/
            {
                
                $sql = "update public.produto set excluido='n' where id_produt=$idalt";
                $dados = pg_query($conecta, $sql);

                $resultado=pg_query($conecta, $sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                {
                   $msg = "Produto habilitado.";
                }
                else 
                {
                   $msg = "Erro SQL:".pg_last_error()."";
                }
                
            }
            
            
            
            echo"<script>
            {
                var texto ='$msg'+' Redirecionando para a lista novamente.';
                
                window.alert(texto)
                window.location.href = 'func_adm.php?codigo=0';
            }
            </script>";
            
            
            
            
            
            // Fecha a conexão com o PostgreSQL//
            pg_close($conecta);
        }
        
        else if($codigo==4)
        {
            $sql = "select * from public.usuario order by id_usuario";
            $dados = pg_query($conecta, $sql);
            
            
            $id;
            $nome;
            $cpf;
            $email;
            $senha;
            $tel;
            $cep;
            $nasc;
            $exc;
            
            $sn;
            
            echo "<center>";
            echo "<table border='9'>";
            echo "<tr><td>Id<td>Nome<td>Cpf<td>Email<td>Senha<td>Telefone<td>CEP<td>Data de nascimento<td>Excluído?<td>Alternar exclusão";
            while ($linha = pg_fetch_array($dados))
            {
                $id = $linha['id_usuario'];
                $nome = $linha['nome'];
                $cpf = $linha['cpf'];
                $email = $linha['email'];
                $senha = $linha['senha'];
                $tel = $linha['fone'];
                $cep = $linha['cep'];
                $nasc = $linha['nasc'];
                $exc = $linha['exc'];
                
                if($exc == "n" || $exc == "N")
                {
                    $sn=0;
                    $exc = "Não";
                }
                else if($exc == "s" || $exc == "S")
                {
                    $sn=1;
                    $exc = "Sim";
                }
                
                echo "<tr><td>".$id."<td>".$nome."<td>".$cpf."<td>".$email."<td>".$senha."<td>".$tel."<td>".$cep."<td>".$nasc."<td>".$exc."<td><a href=func_adm.php?codigo=5&id=".$id."&exc=".$sn."><img src='Imagens/exc_icon.png' height=50></a>";
                
                
            }
            echo "</table>";
            echo "</center>";
        }
        else if($codigo==5)
        {
            $idalt = $_GET['id'];
            $exc = $_GET['exc'];
            
            if($exc==0)
            {
                
                $sql = "update public.usuario set exc='s' where id_usuario=$idalt";
                $dados = pg_query($conecta, $sql);

                $resultado=pg_query($conecta, $sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                {
                   $msg = "Cliente excluído.";
                }
                else 
                {
                   $msg = "Erro SQL:".pg_last_error()."";
                }
                
                
            }
            else /*($exc==1)*/
            {
                
                $sql = "update public.usuario set exc='n' where id_usuario=$idalt";
                $dados = pg_query($conecta, $sql);

                $resultado=pg_query($conecta, $sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                {
                   $msg = "Cliente habilitado.";
                }
                else 
                {
                   $msg = "Erro SQL:".pg_last_error()."";
                }
                
            }
            
            echo"<script>
            {
                var texto ='$msg'+' Redirecionando para a lista novamente.';
                
                window.alert(texto)
                window.location.href = 'func_adm.php?codigo=4';
            }
            </script>";
            
            
            // Fecha a conexão com o PostgreSQL//
            pg_close($conecta);
            
            
        }
        
        
    }
    
    
    if ($_POST)
    {
        $codg = $_POST['codg'];
        
        $codn = $_POST['codn'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $cat = $_POST['cat'];
        $quant = $_POST['quant'];
        $exc = $_POST['exc'];
        
        
        if($codg==1)
        {
            $sql = "update public.produto set nome='$nome', valor=$valor, categoria=$cat, quant=$quant, excluido='$exc' where id_produt=$codn";
            $resultado=pg_query($conecta, $sql);
            $linhas=pg_affected_rows($resultado);

            if ($linhas > 0)
            {
               $msg = "Produto alterado.";
            }
            else 
            {
               $msg = "Erro SQL:".pg_last_error()."";
            }
            
            
            echo"<script>
            {
                var texto ='$msg'+' Redirecionando para a lista novamente.';
                
                window.alert(texto)
                window.location.href = 'func_adm.php?codigo=0';
            }
            </script>";
            
            
            // Fecha a conexão com o PostgreSQL//
            pg_close($conecta);
            
            
        }
        else if($codg==2)
        {
            $sql = "insert into public.produto (id_produt, nome, valor, categoria, quant, excluido) values ($codn, '$nome', $valor, $cat, $quant, '$exc')";
            $resultado=pg_query($conecta, $sql);
            $linhas=pg_affected_rows($resultado);

            if ($linhas > 0)
            {
               $msg = "Produto inserido.";
            }
            else 
            {
               $msg = "Erro SQL:".pg_last_error()."";
            }
            
            
            
            echo"<script>
            {
                var texto ='$msg'+' Redirecionando para a lista novamente.';
                
                window.alert(texto)
                window.location.href = 'func_adm.php?codigo=0';
            }
            </script>";
            
            
            // Fecha a conexão com o PostgreSQL//
            pg_close($conecta);
            
            
        }
        
    }
    
    
           
    
    pg_close($conecta);
    
    /*
     ---------USUARIO--------
    create table usuario
    (
        id_usuario integer not null primary key,
        nome varchar not null,
        cpf varchar not null,
        email varchar not null unique,
        senha varchar not null,
        fone varchar not null,
        cep varchar not null,
        nasc date not null,
        exc BOOLEAN not null
    );

     ---------PRODUTO--------
     
     id_produt
     nome
     valor
     categoria
     
     create table produto
    (
        id_produto integer not null primary key,
        quantidade INT NOT NULL,
        valor NUMERIC (5,2) not null,
        estampa varchar,
        CONSTRAINT fk_idcat FOREIGN KEY(id_cat) references categoria(id_cat),
        excluido BOOLEAN not null
    );
    
    */
?>

                        <ul class="menu">
                        
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <hr>
                                                        <li>
                                <a href="home.php" style="text-decoration:none;">
                               <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home </h4></a>
                                
                            </li>
                            
                            <li>
                                <a href="comprar.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Produtos</h4></a>
                            </li>
                            <li>
                                          <?php
                        if($_SESSION['logado'] == true){
                        echo '<a href="dados.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h4> </a>
                        ' ;
                        }
                        else{
                        echo '<a href="login.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h4> </a>
                        '; 
                            
                        }
                    ?>      
                            </li>
                            
                                                        <li>
                                <a href="sobre.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DEV</h4></a>
                            </li>
                            
                            
                            <li>
                                <a href="saiba.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saiba mais</h4></a>
                            </li>
                            <br>
                            <br>
                        </ul>
                        <font size="5">
                        <ul class="menu">
                           <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <hr>
                            <li>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                02 Bruna Lemes 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>04 César Gomes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>10 Kemily Heleno</li>
                            <br>
                            <br>
                            <li>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                12 Lídia silva 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>18 Natan Rosica &nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19 Paola Santos</li>
                            <br>
                            <hr>
                        </ul>
                        </font>
                    </div>
           </div>
                </font>
          
        </div>
    </BODY>
</HTML>