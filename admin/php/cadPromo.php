<?php
	include "conexao.php";

$nome = $_POST['nome'];
$desconto = $_POST['desconto'];

$sql = mysql_query("insert into promocao values (null,'$nome','$desconto','1')");

if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarPromo\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>