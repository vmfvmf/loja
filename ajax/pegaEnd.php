<?php
/* AUTOR VMF */
if(isset($_GET["q"]))
	$q = $_GET["q"];
else $q = "";

$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("tcc", $con);

$sql="SELECT * FROM login WHERE email like '".$q."'";

$result = mysql_query($sql);


if(mysql_num_rows($result) > 0)
	echo "e-mail já cadastrado,<a href=\"index.php?func=recuperarSenha\">Recuperar Senha</a>";
else echo "";

mysql_close($con);
?> 