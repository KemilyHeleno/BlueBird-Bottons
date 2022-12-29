<?php
include "conexao.php";
/////////////////////////////////////////////////////////
//////// PARTE NOVA QUE FAZ O GRIDE NA TELA
/////////////////////////////////////////////////////////

$sql = "select produto.id_produto, produto.nome_produto, produto.preco, produto.descricao from public.produto where produto.excluido='n' order by produto.nome_produto ";

$query = pg_query($conecta, $sql);
echo "<table border='0'>";
$td = 1;

///// enquanto houverem registros no select
while ($row = pg_fetch_array($query))  {

   // se td = 1 então nova linha
   if ($td==1) { echo "<tr>"; }   
   echo "<td><center>";

   // cria var com caminho e nome de arquivo de imagem 
   $id_produto = "media/produtos/".sprintf("%03d", $row['id_produto']).".jpg";
   $imgfrete = "media/produtos/frete.jpg";
   $imgindisponivel = "media/produtos/indisponivel.jpg";
   // insere fotos
   echo "<img src='". $id_produto."' width=150 height=100 ><br>";
   
   //// calcula desconto se maior que zero
   $valor = floatval($row['preco']);
   $desconto = floatval($row['desconto']);
   $novovalor = $valor - $valor * $desconto / 100;

   
   echo "<font size=3>".number_format($valor,2,",",".")."<br>";  

   echo "<font size=3>".$row['nome_produto']."<br>";
 
        
       echo "<a href=carrinho.php?acao=add&id_produto=".$row['id_produto']."><img src='media/produtos/carrinho.jpg' width=30 height=30></a><br>";             

   $td++;    

   echo "</font></center></td>";
   if ($td==4) 
   { 
     // encerra a linha se ja imprimiu 3 produtos na mesma linha
     echo "</tr>"; 
     $td = 1;
   }   
}

 // se encerrou o while antes de completar uma linha 
if ($td < 4)   
{ 
 echo "</tr>"; 
} 

echo "</table>";
