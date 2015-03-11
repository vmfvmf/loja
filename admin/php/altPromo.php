<?php
	include "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$desconto = $_POST['desconto'];
$vigente = $_POST['vigente'];

$sql = mysql_query("UPDATE promocao SET nome = '$nome', desconto = '$desconto', vigente = '$vigente' WHERE id_promocao = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarPromo\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>