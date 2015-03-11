<?php
	include "conexao.php";

$nome = $_POST['cor'];
$sql = mysql_query("insert into cor values (null, '$nome')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarCor\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>