<?php
	include "conexao.php";
	
	$id = $_GET['id'];
	
	$sql = mysql_query("select foto from produto where id = $id");
	
	$foto = mysql_fetch_array($sql);
	
	$sql = mysql_query("delete from produto where id = $id");
	
	if($sql){
		$arq = unlink("../arquivos/".$foto[0]);
		
		if($arq)
			echo "Produto excluído com sucesso!<br/>".
			"<a href=\"../index.php\">Voltar</a>";
		else
			echo "Erro ao excluir arquivo!<br/>".$arq;
	}else
		echo "Erro ao escluir produto! ". mysql_error();
		
	echo "<br/><a href=\"../listarProduto.php\">Voltar</a>";
?>