<?php
/* AUTOR VMF */
    include "conexao.php";
	
	$con = AbrirCon();
	$end = $_POST['end'];
	
	if(mysql_query("delete from endereco where id_endereco = $end")){
		FecharCon($con);
		header("location: ../index.php?func=enderecos");
	}else{
		FecharCon($con);
		header("location: ../index.php?func=erro");
	} 
?>