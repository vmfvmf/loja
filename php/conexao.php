<?php
/* AUTOR VMF */
function AbrirCon(){
	$con = mysql_connect("localhost","root","") or die(mysql_error());

	mysql_select_db("tcc");
	return $con;	
}

function FecharCon($con){
	mysql_close($con);
	return;
}
?>
