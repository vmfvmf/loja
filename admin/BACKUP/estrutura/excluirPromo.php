<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM promocao WHERE id_promocao = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$nome = $array["nome"];
	$id = $array["id_promocao"];

?>  
<form name="form1" method="post" action="?comp=../php/excPromo">
  <p>Voc&ecirc; tem certeza que vai excluir a promoção - <b><?php echo $nome; ?></b> -?
    <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
    <br>
	<input name="Excluir" type="submit" value="Excluir" id="Excluir">
    <input type="button" name="button" id="button" value="Voltar" onclick="window.location='?comp=listarPromo'"  />
  </p>
</form>
<?php } ;?> 