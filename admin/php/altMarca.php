<?php
	include "conexao.php";

$nome = $_POST['marca'];
$id = $_POST['id'];

$sql = mysql_query("UPDATE marca SET nome = '$nome' WHERE id_marca = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarMarca\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>