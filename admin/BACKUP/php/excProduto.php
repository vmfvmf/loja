<?php 
	include "conexao.php";
$id	= $_POST["id"];
$sql = mysql_query("DELETE FROM produto WHERE cod='$id' ") or die(mysql_error());
if ($sql){
				echo "Excluido com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Voltar</a>";
		}else
				echo "Erro durante o cadastro: ".mysql_error();
?>