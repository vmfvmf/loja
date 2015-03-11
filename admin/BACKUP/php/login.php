<?php
	include "conexao.php";
	
	$usuario=$_POST['usuario'];
	$senha=$_POST['senha'];
		
	$cons="select id,nome from user where usuario='$usuario' and senha='$senha'";
	
	$sql=mysql_query($cons);

	if(mysql_num_rows($sql)>1)
		header("location: ../index.php?sit=1");
	else{
		session_start();
		$dados=mysql_fetch_array($sql);
		$_SESSION['id']=$dados[0];
		$_SESSION['nome']=$dados[1];
		header("location: ../principal.php?comp=");
	}
?>