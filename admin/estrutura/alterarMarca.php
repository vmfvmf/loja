<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM marca WHERE id_marca = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$nome = $array["nome"];
	$id = $array["id_marca"];

?>  
<form name="form1" method="post" action="?comp=../php/altMarca">
Alterar Marca:
  <input name="marca" type="text" value="<?php echo $nome; ?>">
	  <input name="Submit" type="submit" value="Alterar">
	  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
  </p>
</form>
<?php } ;?>  	