<?php
/* AUTOR VMF */
include "conexao.php";
$con = AbrirCon();
$idEnd = $_POST['id_end'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];


        //ENDEREÇO
$sit = mysql_query("update endereco set endereco = '$endereco', numero = '$numero', ".
	"complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', ".
	"cep = '$cep', descricao = 'Principal' where id_endereco = $idEnd");
if($sit){
	FecharCon($con);
	header("location: ../index.php?func=enderecos");
}else{
	FecharCon($con);
    header("location: ../index.php?func=erro");
}
?>