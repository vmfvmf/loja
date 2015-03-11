<?php
/* AUTOR VMF */
include "../php/conexao.php";
if(isset($_GET["conta"]))
	$conta = $_GET["conta"];
else $conta = "";

if(isset($_GET["resp"]))
	$resp = $_GET["resp"];
else $resp = "";

if(isset($_GET["email"]))
	$email = $_GET["email"];
else $email = "";

$con = AbrirCon();
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("tcc", $con);

$sql="SELECT senha FROM login WHERE id_cliente = ".$conta." and resposta = '".$resp."' and email = '".$email."'";

$result = mysql_query($sql);


if(mysql_num_rows($result) > 0){
	$r = mysql_fetch_array($result);
	
	echo $r[0];
}
else echo 'Resposta Incorreta';

FecharCon($con);
?> 