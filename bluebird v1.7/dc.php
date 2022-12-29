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
                                <input type="text" name="pesquisar" id="txtBusca" list="historico" placeholder="Buscar..."/>
                                <!-- insere, dentro do input, um texto que será apagado quando começar a digitar dentro do campo, e mostrado de novo ao perder o focus do elemento e o conteúdo seja vazio. -->
                                <div id="btn_busca">
                                    <button type="submit" id="btn_Busca">
                                        <img src="Imagens/homefotos/lupa.png" height="60" width="65"   alt="Buscar"/>
                                   </button>
                                    <datalist id="historico">
                                    <option value = "Charmander"></option>
                                    <option value = "Bulbassauro"></option>
                                    <option value = "Pikachu"></option>
                                    <option value = "Squirtle"></option>
                                    <option value = "Avengers"></option>
                                    <option value = "Capitã Marvel"></option>
                                    <option value = "Capitão América"></option>
                                    <option value = "Homem de Ferro"></option>
                                    <option value = "Super Homem"></option>
                                    <option value = "Mulher Maravilha"></option>
                                    <option value = "Marvel"></option>
                                    <option value = "Informática"></option>
                                    <option value = "Mecânica"></option>
                                    <option value = "Eletrônica"></option>
                                    <option value = "Arlequina"></option>
                                    <option value = "AquaMan"></option>
                                    <option value = "Coringa"></option>
                                    <option value = "Batman"></option>
                                    <option value = "DC"></option>
                                    <option value = "Lanterna Verde"></option>
                                    </datalist>
                                </div>
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
                    <div id="secundaria">
                        
                        <h2>Produtos</h2>
                   
                             <hr>
<?php
include "conexao.php";
/////////////////////////////////////////////////////////
//////// PARTE NOVA QUE FAZ O GRIDE NA TELA
/////////////////////////////////////////////////////////

$sql = "select produto.id_produt, produto.nome, produto.valor from public.produto  WHERE (produto.categoria ='003') and (excluido = 'n' or excluido = 'N') order by produto.nome";

$query = pg_query($conecta, $sql);
echo "<table border='0'>";
$td = 1;

///// enquanto houverem registros no select
while ($row = pg_fetch_array($query))  {

   // se td = 1 então nova linha
   if ($td==1) { echo "<tr>"; }   
   echo "<td><center>";

   // cria var com caminho e nome de arquivo de imagem 
 
  $id_produto = "Imagens/homefotos/".sprintf("%03d", $row['id_produt']).".png";
   // insere fotos
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='". $id_produto."' height=200 width=220><br>";
   // insere fotos

   
   //// calcula desconto se maior que zero
   $valor = floatval($row['valor']);


   
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=5>".'R$'.number_format($valor,2,",",".")."<br>";  

   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=5>".$row['nome']."<br>";
 
        
       if($_SESSION['logado'] == true){
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=carrinho.php?acao=add&id_produt=".$row['id_produt']."><font color = red>Comprar</a><br>";  
                        }
                        else{
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=login.php><font color = red>Comprar</a><br>";  
                        }       

   $td++;    

   echo "</font></center></td>";
   if ($td==5) 
   { 
     // encerra a linha se ja imprimiu 3 produtos na mesma linha
     echo "</tr>"; 
     $td = 1;
   }   
}

 // se encerrou o while antes de completar uma linha 
if ($td < 5)   
{ 
 echo "</tr>"; 
} 

echo "</table>";
?>
              <hr>     
                     <br><br><br><br>
           
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
                </font>
        
        </div>
    </BODY>
</HTML>

<!-- 
    border - Define o tamanho da borda (espessura em pixels e tipo da borda).
    border-radius - Define o raio da borda em pixels.
    display: inline-block - Garante que tanto os links e os botões tenham a mesma altura.
    cursor:pointer - Garante que a imagem da "mãozinha" apareça quando o leitor passar com o mouse sobre o botão.
    font-family - Define a família da fonte.
    font-weight - Espessura da fonte.
    font-size - O tamanho da fonte em pixels.
    padding - Espaçamento de 6px em cima e em baixo e de 10px nas laterias direita e esquerda.
    text-decoration:none - Remove a linha sob o texto dos links.
    
-->

