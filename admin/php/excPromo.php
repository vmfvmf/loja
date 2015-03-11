<?php 
	include "conexao.php";

$id	= $_POST["id"];

$sql = mysql_query("DELETE FROM promocao WHERE id_promocao='$id' ") or die(mysql_error());

if ($sql){
				echo "Excluido com sucesso!<br/>"."<a href=\"?comp=listarPromo\">Voltar</a>";
		}else
				echo "Erro durante o cadastro: ".mysql_error();
?>