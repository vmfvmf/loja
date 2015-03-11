<?php
	include "conexao.php";

$nome = $_POST['categoria'];
$sql = mysql_query("insert into categorias values (null, '$nome')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarCategoria\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>