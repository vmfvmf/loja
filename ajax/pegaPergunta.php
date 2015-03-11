<?php
/* AUTOR VMF */
include "../php/conexao.php";
if(isset($_GET["q"]))
	$q = $_GET["q"];
else $q = "";

$con = AbrirCon();
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("tcc", $con);

$sql="SELECT p.pergunta, l.id_cliente FROM perguntasecreta p  INNER JOIN login l on p.id = l.id_pergunta ".
		"WHERE l.email = '".$q."'";

$result = mysql_query($sql);


if(mysql_num_rows($result) > 0){
	$r = mysql_fetch_array($result);
	$v = $r[0].';'.$r[1];
	echo $v;
}
else echo 'E-Mail não cadastrado... <a href="index.php?func=cadastro">Cadastrar</a>';

FecharCon($con);
?> 