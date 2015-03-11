<?php
	include "conexao.php";

$nome = $_POST['nome'];
$desconto = $_POST['desconto'];
$genero = $_POST['genero'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];

$sql = mysql_query("insert into promocao values (null,'$nome','$desconto','$genero','$marca','$categoria')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarPromo\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>