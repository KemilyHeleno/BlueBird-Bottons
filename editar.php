<?php session_start(); 
    $name = $_SESSION['nome'];
    $cpff = $_SESSION['cpf'];
    $emaill = $_SESSION['email'];
    $fonee = $_SESSION['fone'];
    $cepp = $_SESSION['cep'];
?>
    
    <HTML lang="pt-br">
    <HEAD>
        <TITLE> BlueBird - Cadastro </TITLE>
        
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
                            <img src="Imagens/homefotos/logomarca.png" width="300"></a>
                            &nbsp;&nbsp; &nbsp;&nbsp; 
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
                    <div id="secundaria">


<!---------------------------------------------->  
<script>                        
    function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
    

    function only(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
    
function validarSenha(name1, name2)
{
    var senha1 = document.getElementById(name1).value;
    var senha2 = document.getElementById(name2).value;
		
    if (senha1 != "" && senha2 != "" && senha1 === senha2)
    {

    }
    else
    {
      	alert('Senhas Diferentes!');
    }
}
    
function validarEmail(name1, name2)
{
    var email1 = document.getElementById(name1).value;
    var email2 = document.getElementById(name2).value;
		
    if (email1 != "" && email2 != "" && email1 === email2)
    {

    }
    else
    {
      	alert('E-mails Diferentes!');
    }
}    
    
function show() {
  var senha = document.getElementById("senha1");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
} 
    
function show1() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
} 
    
</script>    
<!------------------------------------------------->    


                        <h2>Alterar Dados</h2>
                        <hr>
                   
                        <div id="login">
        <form method="post" action="editar_us.php" id="formulario_">
                       <fieldset class ="fieldset_" style = "width: 50%; margin: 0px auto; height: 500;" >
       <h5>
          <p> 
<label for="nome_login" class="nome">Nome</label>
            <input id="nome_login" class="campo_nome" name="nome" required="required" type="text" placeholder="<?php echo $name; ?>" value="<?php echo $name; ?>" onkeypress="return only();" />
          </p>
            <br>
          <p> 
<label for="email_login" class="cpf">CPF</label>
            &nbsp; <input id="email_login" class="campo_cpf" name="cpf" required="required" type="text" placeholder="<?php echo $cpff; ?>" value="<?php echo $cpff; ?>" maxlength="11" minlength="11" onkeypress="return onlynumber();"/> 
          </p>
 
 <br>
          <p> 
<label for="nome_login" class="email">E-mail</label>
            <input id="mail" class="campo_email" name="email" required="required" type="email" placeholder="<?php echo $emaill; ?>" value="<?php echo $emaill; ?>" />
          </p>
           <br>
          <p> 
<label for="email_login" class="cemail">Confirme o e-mail</label>
            <input id="mail1" class="campo_cemail" name="mail1" required="required" type="email" placeholder="ex. contato@cti.com" onblur="validarEmail('mail','mail1')"/> 
          </p>
           <br> 
            <p> 
<label for="nome_login" class="senha">Senha</label>
            <input id="senha" class="campo_senha" name="senha" required="required"  type="password" placeholder="6 dígitos" maxlength="6" minlength="6" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="show1()">Mostrar Senha
          </p>
         <br>   
          <p> 
<label for="email_login" class="csenha">Confirme a senha</label>
            <input id="senha1" class="campo_csenha" name="senha1" required="required" type="password" placeholder="6 dígitos" maxlength="6" minlength="6" onblur="validarSenha('senha','senha1')" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" onclick="show()">Mostrar Senha
          </p>
           
          <br>  
 
          <p> 
<label for="nome_login" class="fone">Fone</label>
            <input id="nome_login" class="campo_fone" name="fone" required="required" type="text" placeholder="<?php echo $fonee; ?>" value="<?php echo $fonee; ?>" minlength="10" onkeypress="return onlynumber();" />
          </p>
        <br>    
          <p> 
<label for="email_login" class="cep">Cep</label>
     <input id="email_login" class="campo_cep" name="cep" required="required" type="text" placeholder="<?php echo $cepp; ?>" value="<?php echo $cepp; ?>" maxlength="8" minlength="8" onkeypress="return onlynumber();" /> 
          </p>
        <br>    
         <p> 
<label for="email_login" class="data">Data de Nascimento</label>
           <input id="email_login" class ="campo_data" name="datan" required="required" type="date" placeholder="DD/MM/AAAA" /> 
          </p>
        <br>
           <br>
<input type="reset" class="limpar" value="Limpar" /> 
 <input type="submit" class="salvar" value="Enviar" />
                           </h5>
                           <br>
            </fieldset>
</form>                
           
           
           
            
          

           
<hr>
     
           <br><br><br><br><br><br><br><br><br><br><br>
<!---

php

include_once('conexao.php');


if ($_GET)
{
 $codigo = $_GET['codigo'];
    
 if ($codigo == 0)  
 {
  $nome = "";
  $cpf = "";
  $email = "";
  $senha = "";
  $fone = "";
  $cep = "";
  $data = "";
 }
 else
 { 
  $sql = "select * from public.clientee where cod_cliente = $codigo";
  $dados = pg_query($conecta,$sql);  
  $linha = pg_fetch_array($dados);   
  $nome = $linha['nome'];
  $email = $linha['email'];
  $senha = $linha['senha'];
  $fone = $linha['fone'];
  $cep = $linha['cep'];
  $data = $linha['data'];
 } 

---->

           
    <!---------------->       
           <ul class="menu">
               <br><br><br><br><br><br><br>
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
                                <a href="login.php" style="text-decoration:none;">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h4> </a>
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
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>   
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
                    </div>
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