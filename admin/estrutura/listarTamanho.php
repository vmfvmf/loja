<h2>Tamanhos</h2>
<blockquote><a href="?comp=cadastroTamanho">Cadastrar novo tamanho</a></blockquote>

<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM tamanho") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["id_tamanho"];
	$tamanho = $array["tamanho"];

?>  
  <tr>   
    <td width="100" align="center" valign="middle"><a href="?comp=alterarTamanho&id=<?php echo $id ?>">Alterar</a></td>
    <td width="100" align="center" valign="middle"><a href="?comp=excluirTamanho&id=<?php echo $id ?>">Excluir</a></td>
    <td><?php echo $tamanho; ?></td>
  </tr>
 <?php } ;?>  
</table>