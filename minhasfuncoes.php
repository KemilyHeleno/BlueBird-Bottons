<?php 

////////////////////////////////////////////////////////////////
function EnviaEmail ( $pEmailDestino, $pAssunto, $pHtml, $pRemetente )   
{
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
 require "PHPMailer/PHPMailerAutoload.php";
    
 try {

 //cria instancia de phpmailer
 echo "<br>Tentando enviar para ".$pEmailDestino."...";
 $mail = new PHPMailer(); 
 $mail->IsSMTP();  
 
 // servidor smtp
 //$mail->SMTPDebug = SMTP::DEBUG_SERVER;   // use se tiver problemas, ele lista toda a transacao com o servidor
 $mail->Host = "smtp.efesonet.com";
 $mail->SMTPAuth = true;      // requer autenticacao com o servidor                         
 $mail->SMTPSecure = 'tls';                            
     
 $mail-> SMTPOptions = array (
   'ssl' => array (
   'verificar_peer' => false,
   'verify_peer_name' => false,
   'allow_self_signed' => true ) );
     
 $mail->Port = 587;      
    
 $mail->Username = "efesonet@efesonet.com"; 
 $mail->Password = "php72C2020!"; 
 $mail->From = "efesonet@efesonet.com"; 
 $mail->FromName = "Suporte de senhas"; 
 
 $mail->AddAddress($pEmailDestino, "Usuario"); 
 $mail->IsHTML(true); 
 $mail->Subject = "Nova Senha!"; 
 $mail->Body = $pHtml;
 $enviado = $mail->Send(); 
     
 if (!$enviado) {
    echo "<br>Erro: " . $mail->ErrorInfo;
 } else {
    echo "<br><b>Enviado!</b>";
 }
 return $enviado;         
     
 } catch (phpmailerException $e) {
   echo $e->errorMessage(); // erros do phpmailer
 } catch (Exception $e) {
   echo $e->getMessage(); // erros da aplicação - gerais
 }       
 
}
          

function ExecutaSQL($pSQL) 
{
    
 include "conexao.php";
 
 $resultado= pg_query($conecta,$pSQL);
 $linhas= pg_affected_rows($resultado);
 
 if ($linhas > 0)
 {
     return TRUE;
 }
 else
 { 
     echo "<br><b>Erro SQL:</b>".pg_last_error()."<br>";
     return FALSE; 
 }
    
}
    
/**
* Função para gerar senhas aleatórias
*
* @author    Thiago Belem <contato@thiagobelem.net>
*
* @param integer $tamanho Tamanho da senha a ser gerada
* @param boolean $maiusculas Se terá letras maiúsculas
* @param boolean $numeros Se terá números
* @param boolean $simbolos Se terá símbolos
*
* @return string A senha gerada
*/
function GeraSenha($tamanho = 6, $maiusculas = true, $numeros = true, $simbolos = false)
{
//$lmin = 'abcdefghijklmnopqrstuvwxyz';
$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$num = '1234567890';
$simb = '!@#$%*-';
$retorno = '';
$caracteres = '';

//$caracteres .= $lmin;
if ($maiusculas) $caracteres .= $lmai;
if ($numeros) $caracteres .= $num;
if ($simbolos) $caracteres .= $simb;

$len = strlen($caracteres);
for ($n = 1; $n <= $tamanho; $n++)
{
    $rand = mt_rand(1, $len);
    $retorno .= $caracteres[$rand-1];
}
return $retorno;
}




?>