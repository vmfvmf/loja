<?php 
	include "conexao.php";
$id	= $_POST["id"];
$sql = mysql_query("DELETE FROM tamanho WHERE id_tamanho='$id' ") or die(mysql_error());
if ($sql){
				echo "Excluido com sucesso!<br/>"."<a href=\"?comp=listarTamanho\">Voltar</a>";
		}else
				echo "Erro durante o cadastro: ".mysql_error();
?>