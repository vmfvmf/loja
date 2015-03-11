<?php
/* AUTOR VMF */
include "conexao.php";
$con = AbrirCon();
$idCli = $_POST['idCli'];
$numero = $_POST['numero'];
$op = 0;
if($_POST['operadora'] != "")
	$op = $_POST['operadora'];

$sit = mysql_query("insert into contato values(null, '$numero', $op)");

if($sit){
	$sit = mysql_query("select max(id_contato) from contato");
	$r = mysql_fetch_array($sit);
	$sit = mysql_query("insert into clientecontatos values(".$r[0].", $idCli)");
    if($sit) {
    	FecharCon($con);
    	header("location: ../index.php?func=contatos");
	}else{
		 mysql_query("delete from contato where id_contato = ".$r[0]);
		 FecharCon($con);
		 header("location: ../index.php?func=erro");
	}
}else{
	FecharCon($con);
	header("location: ../index.php?func=erro");
}
?>