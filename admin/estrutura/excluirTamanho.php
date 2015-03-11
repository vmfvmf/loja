<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM tamanho WHERE id_tamanho = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$tamanho = $array["tamanho"];
	$id = $array["id_tamanho"];

?>  
<form name="form1" method="post" action="?comp=../php/excTamanho">
  <p>Voc&ecirc; tem certeza que vai excluir o tamanho - <b><?php echo $tamanho; ?></b> -?
    <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
    <br>
	<input name="Excluir" type="submit" value="Excluir" id="Excluir">
    <input type="button" name="button" id="button" value="Voltar" onclick="window.location='?comp=listarTamanho'"  />
  </p>
</form>
<?php } ;?> 