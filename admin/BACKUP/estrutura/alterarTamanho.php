<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM tamanho WHERE id_tamanho = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$tamanho = $array["tamanho"];
	$id = $array["id_tamanho"];

?>  
<form name="form1" method="post" action="?comp=../php/altTamanho">
	Alterar Tamanho: <input name="tamanho" type="text" value="<?php echo $tamanho; ?>">
    <input name="Submit" type="submit" value="Alterar">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
</form>
<?php } ;?>  	