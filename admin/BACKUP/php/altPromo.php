<?php
	include "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$desconto = $_POST['desconto'];
$genero = $_POST['genero'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];

$sql = mysql_query("UPDATE promocao SET nome = '$nome', desconto = '$desconto', genero = '$genero', id_marca = '$marca', id_categoria = '$categoria' WHERE id_promocao = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarPromo\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>