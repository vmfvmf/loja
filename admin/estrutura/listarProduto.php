<h2>Produtos</h2>
<blockquote>
<a href="?comp=cadastroProduto">Cadastrar novo produto</a></blockquote>

<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM produto") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["cod"];
	$nome = $array["descricao"];
	$img = $array["imagem"];

?>  
  <tr>   
    <td width="100" align="center" valign="middle"><a href="?comp=alterarProduto&id=<?php echo $id; ?>"> Alterar</a></td>
    <td width="100" align="center" valign="middle"><a href="?comp=excluirProduto&id=<?php echo $id; ?>">Excluir</a></td>
    <td><?php echo $nome; ?> - <img src="anexo/<?php echo $img; ?>" width="50" align="middle" /></td>
  </tr>
 <?php } ;?>  
</table>