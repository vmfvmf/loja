<h2>Cores</h2>
<blockquote><a href="?comp=cadastroCor">Cadastrar nova cor</a></blockquote>

<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM Cor") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["id_cor"];
	$nome = $array["nome"];

?>  
  <tr>   
    <td width="100" align="center" valign="middle"><a href="?comp=alterarCor&id=<?php echo $id ?>">Alterar</a></td>
    <td width="100" align="center" valign="middle"><a href="?comp=excluirCor&id=<?php echo $id ?>">Excluir</a></td>
    <td><?php echo $nome; ?></td>
  </tr>
 <?php } ;?>  
</table>