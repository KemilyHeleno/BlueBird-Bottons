<?php session_start(); ?>
<?php

include "conexao.php";



      session_start(); 
       
      if(!isset($_SESSION['carrinho'])){    
  
         $_SESSION['carrinho'] = array();   
   
      }
       
      
      if(isset($_GET['acao'])){
          
   
         if($_GET['acao'] == 'add'){
            $id_produto = intval($_GET['id_produt']); 
            if(!isset($_SESSION['carrinho'][$id_produto])){  
				
               $_SESSION['carrinho'][$id_produto] = 1; 
            }else{
               $_SESSION['carrinho'][$id_produto] += 1; 
            }
         }
          

         if($_GET['acao'] == 'del'){
            $id_produto = intval($_GET['id_produt']); 
            if(isset($_SESSION['carrinho'][$id_produto])){   
			
               unset($_SESSION['carrinho'][$id_produto]);   
            }
         }
                 
      }
       
       
?>
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
                                <a href="#">
                                    
                                    &nbsp;&nbsp; <img src="Imagens/homefotos/carrinho.PNG" height="100" width="105">
                                </a>
                            </div>
                        </li>
                    </ul>
           
 <!----------------------------------------- topo -------------------------------------------------------------------------------------------->           
        
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
<!---------------------------------------------- botões menu ----------------------------------------------------------------------------------->       <div id="secundaria" > 
          
           <table border="1" width="100%" bordercolor="blue">
                
                <h2>Carrinho de Compras</h2>
               <hr>
           
		<thead>
            
			  <tr>
                    
				<th width="270">Produto</th>
				<th width="244">Quantidade</th>
				<th width="244">Pre&ccedil;o</th>
				<th width="244">SubTotal</th>
				<th width="50"></th>
                        
			  </tr>
            
		</thead>
		<form action="?acao=up" method="post">
		<tfoot>

				<tr>
                    <br>
				<td colspan="7"><a href="finalizar.php"><p align ="center">Finalizar Compra</p></a></td>
		</tfoot>
		  
		<tbody>
		   <?php
			 if(count($_SESSION['carrinho']) == 0){
				echo '<tr><td colspan="5"><p align="left">N&atilde;o h&aacute; produto no carrinho</p></td></tr>';
			 }else{
				require("conexao.php");
				$total = 0;
                         $_SESSION['dados'] = array(); 
				foreach($_SESSION['carrinho'] as $id_produto => $qtd){
					$sql = "select * from public.produto where id_produt = $id_produto ";
					$res = pg_query($conecta, $sql);
					$regs = pg_num_rows($res);
					if($regs>0){
						$linha = pg_fetch_array($res);
						$nome_produto = $linha['nome'];
						$preco = $linha['valor'];
						$sub = strval($preco);//transforma em string
			
						$sub = str_replace(",",".", $sub);//onde achar vírgula, substitui por ponto. Esse procedimento converte para padrão americano.
						$sub = str_replace("R$","", $sub);//onde achar R$, retira.
						$sub = floatval($sub);//transforma em float
						$sub *= $qtd; 
						$total += $sub;
						$sub = number_format($sub, 2, ',', '.');//formata para padrão brasileiro.	
                        
                        $id_produtoo = "Imagens/homefotos/".sprintf("%03d", $row['id_produt']).".png";
   // insere fotos

					}

					echo '<tr>       
						 <td><p align="center"> Botton - '.$nome_produto.'</p></td>
						 <td><p align="center"><input type="text" size="3" name="prod['.$id_produto.']" value="'.$qtd.'" /></p></td>
						 <td><p align="center"> R$ '.$preco.'</p></td>
						 <td><p align="center"> R$ '.$sub.'</p></td>
						 <td><a href="?acao=del&id_produt='.$id_produto.'"><p align="center"><input type="button" value="Remover"></p></a></td>
					  </tr>';
                       array_push($_SESSION['dados'],
                    array('id_produt' => $id_produto,
                          'quantidade' => $qtd,
                          'total' => $sub,
                          'nome' => $nome_produto));
				}//FECHA FOREACH
				   $total = number_format($total, 2, ',', '.');
				   echo '<tr>
							<td colspan="7"><p align="center"><b><font size ="5">Total:
							R$ '.$total.'</font></p></td>
					  </tr>';

                 
			 }//FECHA ELSE
		   ?>
            
		 </tbody>
			</form>
             
	</table>
           </div>
          </font>
        </div>
   

           
                        <ul class="menu">
                        
                            
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
                            <br>
                            <br>
                      
                        </ul>
<!---------------------------------------------------------- Sub Menu ------------------------------------------------------------------------->           
                        <font size="5">
                        <ul class="menu">
                          
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