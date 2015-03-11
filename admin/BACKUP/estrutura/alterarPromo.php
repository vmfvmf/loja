<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM promocao WHERE id_promocao = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

$id = $array["id_promocao"];
$nome = $array['nome'];
$desconto = $array['desconto'];
$genero = $array['genero'];
$id_marca = $array["id_marca"];
$id_categoria = $array['id_categoria'];


?>  
<form name="form1" method="post" action="?comp=../php/altPromo">
	<p>Nome:<br />
  <input name="nome" type="text" value="<?php echo $nome; ?>"><br />
		Alterar Desconto:<br />
  <input name="desconto" type="text" value="<?php echo $desconto; ?>"><br />
  		Alterar G&ecirc;nero: <?php echo $genero;?><br />
  <select name="genero" id="genero">
    <option value=""></option>
    <option value="m">Masculino</option>
    <option value="f">Feminino</option>
    <option value="u">Unisex</option>
  </select>
  <br />
  		Alterar Marca: <?php echo $marca; ?><br />
    <select name="marca" id="marca">
	<option value="0"></option>
      <?php
$sql_query_marca = mysql_query("SELECT * FROM marca") or die(mysql_error());
$num_rows_marca = mysql_num_rows($sql_query_marca);
while($array_marca = mysql_fetch_array($sql_query_marca)){
	$id_marca2 = $array_marca["id_marca"];
	$nome_marca = $array_marca["nome"];
	$desconto_marca = $array_marca["desconto"];

?>
      <option value="<?php echo $id_marca;?>"><?php echo $nome_marca;?></option>
  <?php } ?>  
    </select>
<br />
		Alterar Categoria: <?php echo $categoria; ?><br />
    <select name="categoria" id="categoria">
<option value="0"></option>
      <?php
$sql_query_categoria = mysql_query("SELECT * FROM categorias") or die(mysql_error());
$num_rows_categoria = mysql_num_rows($sql_query_categoria);
while($array_categoria = mysql_fetch_array($sql_query_categoria)){
	$id_categoria = $array_categoria["id_categoria"];
	$nome_categoria = $array_categoria["nome"];
?>
      <option value="<?php echo $id_categoria;?>"><?php echo $nome_categoria;?></option>
      <?php } ?>  
    </select>
    <br />

	  <input name="Submit" type="submit" value="Alterar">
	  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
  </p>
</form>
<?php } ;?>  	