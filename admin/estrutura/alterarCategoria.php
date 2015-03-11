<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM Categorias WHERE id_categoria = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$nome = $array["nome"];
	$id = $array["id_categoria"];

?>  
<form name="form1" method="post" action="?comp=../php/altCategoria">
	Alterar Categoria: <input name="categoria" type="text" value="<?php echo $nome; ?>">
    <input name="Submit" type="submit" value="Alterar">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
</form>
<?php } ;?>  	