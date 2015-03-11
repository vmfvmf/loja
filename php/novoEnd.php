<?php

include "conexao.php";
$con = AbrirCon();
$idCli = $_POST['idCli'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$sit = mysql_query("insert into endereco values(null, '$endereco', '$numero', '$complemento', '$bairro', ".
		"'$cidade', '$uf', '$cep', 'Principal')");

if($sit){
	$sit = mysql_query("select max(id_endereco) from endereco");
	$r = mysql_fetch_array($sit);
	echo ("insert into clienteenderecos values($idCli, ".$r[0].")");
	$sit = mysql_query("insert into clienteenderecos values($idCli, ".$r[0].")");
    if($sit){
    	FecharCon($con);
    	header("location: ../index.php?func=enderecos");
	}else{
		mysql_query("delete from endereco where id_endereco = ".$r[0]);
		FecharCon($con);
		header("location: ../index.php?func=erro");
	}
}else{
	FecharCon($con);
	header("location: ../index.php?func=erro");
}
?>