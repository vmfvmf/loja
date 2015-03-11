<?php
	include "conexao.php";

$nome = $_POST['marca'];
$desconto = $_POST['desconto'];
$sql = mysql_query("insert into marca values (null, '$nome', '$desconto')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarMarca\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>