<form action="?comp=../php/cadProduto" method="post" enctype="multipart/form-data" name="form1" id="form1">

  <p>Marca:<br />
    <select name="marca" id="marca">
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
Cor:<br />
    <select name="cor" id="cor">
      <?php
$sql_query_cor = mysql_query("SELECT * FROM cor") or die(mysql_error());
$num_rows_cor = mysql_num_rows($sql_query_cor);
while($array_cor = mysql_fetch_array($sql_query_cor)){
	$id_cor = $array_cor["id_cor"];
	$nome_cor = $array_cor["nome"];
?>
      <option value="<?php echo $id_cor;?>"><?php echo $nome_cor;?></option>
      <?php } ?>  
    </select>
    <br />
 Tamanho:<br />
    <select name="tamanho" id="tamanho">
      <?php
$sql_query_tamanho = mysql_query("SELECT * FROM tamanho") or die(mysql_error());
$num_rows_tamanho = mysql_num_rows($sql_query_tamanho);
while($array_tamanho = mysql_fetch_array($sql_query_tamanho)){
	$id_tamanho = $array_tamanho["id_tamanho"];
	$nome_tamanho = $array_tamanho["tamanho"];
?>
      <option value="<?php echo $id_tamanho;?>"><?php echo $nome_tamanho;?></option>
      <?php } ?>  
    </select>
    <br />
    Estoque:<br />
    <label for="estoque"></label>
    <input type="text" name="estoque" id="estoque" />
    <br />
    Pre&ccedil;o de Compra:<br />
    <label for="preco_compra"></label>
    <input type="text" name="preco_compra" id="preco_compra" />
    <br />
  G&ecirc;nero:<br />
  <select name="genero" id="genero">
    <option value="m">Masculino</option>
    <option value="f">Feminino</option>
    <option value="u">Unisex</option>
  </select>
  <br />
  Infantil:<br />
  <label for="infantil"></label>
  <select name="infantil" id="infantil">
    <option value="1">Sim</option>
    <option value="0">N&atilde;o</option>
  </select>
  <br />
  Pre&ccedil;o de Venda:<br />
  <label for="preco_venda"></label>
  <input type="text" name="preco_venda" id="preco_venda" />
  <br />
  Desconto:<br />
  <input type="text" name="desconto" id="desconto" />
  <br />
  Imagem:<br />
  <label for="imagem"></label>
  <input type="file" name="file" id="file" />
  <br />
  Descri&ccedil;&atilde;o:<br />
  <label for="descricao"></label>
  <input type="text" name="descricao" id="descricao" />
  </p>
  <p>
    <input name="Submit" type="submit" value="Enviar">
  </p>
</form>
