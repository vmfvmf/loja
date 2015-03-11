<?php
	include "conexao.php";

$tamanho = $_POST['tamanho'];
$id = $_POST['id'];

$sql = mysql_query("UPDATE tamanho SET tamanho = '$tamanho' WHERE id_tamanho = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarTamanho\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>