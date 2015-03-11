<html>
	<head>
    </head>
    <body>
<?php
	include "conexao.php";

$status = $_POST['status'];
$id = $_POST['id'];

$sql = mysql_query("UPDATE venda SET id_status = '$status' WHERE id_venda = '$id'");

if($sql){
		echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarPedido\">Voltar</a>";
	}else
	echo "Erro durante o cadastro: ".mysql_error();
?>
</body>