<?php
/* AUTOR VMF */
    include "conexao.php";
	$con = AbrirCon();
	$cont = $_POST['contato'];
	
	if(mysql_query("delete from contato where id_contato = $cont")){
		FecharCon($con);
		header("location: ../index.php?func=contatos");
	}
	else{
		fecharCon($con);
		header("location: ../index.php?func=erro");
	}
?>