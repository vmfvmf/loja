<?php

	include "conexao.php";
	$con = AbrirCon();
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	
	$sql = "select id_cliente from login where email = '$usuario' and senha = '$senha'";
	$result = mysql_query($sql);
	
	
	if(mysql_num_rows($result) == 0){
		FecharCon($con);
		header("location: ../index.php?func=erroLogin");
		
	}else{
		session_start();
		$dados = mysql_fetch_array($result);
		$_SESSION['id'] = $dados[0];
		FecharCon($con);
		header("location: ../index.php");

	}
	
?>