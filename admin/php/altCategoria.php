<?php
	include "conexao.php";

$nome = $_POST['categoria'];
$id = $_POST['id'];

$sql = mysql_query("UPDATE categorias SET nome = '$nome' WHERE id_categoria = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarCategoria\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>