<h2>Categorias</h2>
<blockquote><a href="?comp=cadastroCategoria">Cadastrar nova categoria</a></blockquote>

<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM categorias") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["id_categoria"];
	$nome = $array["nome"];

?>  
  <tr>   
    <td width="100" align="center" valign="middle"><a href="?comp=alterarCategoria&id=<?php echo $id ?>"> Alterar</a></td>
    <td width="100" align="center" valign="middle"><a href="?comp=excluirCategoria&id=<?php echo $id ?>">Excluir</a></td>
    <td><?php echo $nome; ?></td>
  </tr>
 <?php } ;?>  
</table>