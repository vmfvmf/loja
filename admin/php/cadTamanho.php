<?php
	include "conexao.php";

$tamanho = $_POST['tamanho'];
$sql = mysql_query("insert into tamanho values (null, '$tamanho')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarTamanho\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>