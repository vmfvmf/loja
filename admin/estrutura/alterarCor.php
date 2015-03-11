<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM Cor WHERE id_cor = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$nome = $array["nome"];
	$id = $array["id_cor"];

?>  
<form name="form1" method="post" action="?comp=../php/altCor">
	Alterar cor: <input name="cor" type="text" value="<?php echo $nome; ?>">
    <input name="Submit" type="submit" value="Alterar">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
</form>
<?php } ;?>  	