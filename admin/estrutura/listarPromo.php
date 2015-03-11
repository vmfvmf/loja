<h2>Promoções</h2>
<blockquote><a href="?comp=cadastroPromo">Cadastrar nova promoção</a></blockquote>

<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM promocao") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["id_promocao"];
	$nome = $array["nome"];

?>  
  <tr>   
    <td width="100" align="center" valign="middle"><a href="?comp=alterarPromo&id=<?php echo $id ?>">Alterar</a></td>
    <td width="100" align="center" valign="middle"><a href="?comp=excluirPromo&id=<?php echo $id ?>">Excluir</a></td>
    <td><?php echo $nome; ?></td>
  </tr>
 <?php } ;?>  
</table>