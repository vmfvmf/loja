<?php
	include "conexao.php";

$nome = $_POST['cor'];
$id = $_POST['id'];

$sql = mysql_query("UPDATE cor SET nome = '$nome' WHERE id_cor = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarCor\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>