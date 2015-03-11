<form name="form1" method="post" action="?comp=../php/cadPromo">
	Nome da Promoção:<br />
  <input type="text" name="nome">
  <br />
	Desconto:<br />
  <input type="text" name="desconto">
  <br />
 	G&ecirc;nero:<br />
  <select name="genero" id="genero">
    <option value=""></option>
    <option value="m">Masculino</option>
    <option value="f">Feminino</option>
    <option value="u">Unisex</option>
  </select>
  <br />
  Marca:<br />
    <select name="marca" id="marca">
<option value="0"></option>
      <?php
$sql_query_marca = mysql_query("SELECT * FROM marca") or die(mysql_error());
$num_rows_marca = mysql_num_rows($sql_query_marca);
while($array_marca = mysql_fetch_array($sql_query_marca)){
	$id_marca = $array_marca["id_marca"];
	$nome_marca = $array_marca["nome"];
?>
   	
      <option value="<?php echo $id_marca;?>"><?php echo $nome_marca;?></option>
  <?php } ?>  
    </select>
    <br />
Categoria:<br />
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
    <input name="Submit" type="submit" value="Enviar">
</form>
