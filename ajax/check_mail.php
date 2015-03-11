<?php
/* AUTOR VMF */
if(isset($_GET["q"]))
	$q = $_GET["q"];
else $q = "";

$con = mysql_connect('localhost', 'root', 'vmf');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("tcc", $con);

$sql="SELECT id_cliente FROM login WHERE email like '".$q."'";

$result = mysql_query($sql);


if(mysql_num_rows($result) > 0)
	echo "0";
else echo "1";

mysql_close($con);
?> 