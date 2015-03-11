<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM produto WHERE cod=$id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

$id_marca = $array["id_marca"];
$id_categoria = $array['id_categoria'];
$id_cor = $array['id_cor'];
$id_promo = $array['id_promo'];
$id_tamanho = $array['id_tamanho'];
$estoque = $array['estoque'];
$preco_compra = $array['preco_compra'];
$genero = $array['genero'];
$infantil = $array['infantil'];
$preco_venda = $array['preco_venda'];
$imagem = $array['imagem'];
$descricao = $array['descricao'];
?>  

<form action="?comp=../php/altProduto" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input name="cod" type="hidden" value="<?php echo $id; ?>" />
  <p>Marca:<br />
    <select name="marca" id="marca">
      <?php
$sql_query_marca = mysql_query("SELECT * FROM marca") or die(mysql_error());
$num_rows_marca = mysql_num_rows($sql_query_marca);
while($array_marca = mysql_fetch_array($sql_query_marca)){
	$id_marca2 = $array_marca["id_marca"];
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
	
Promo&ccedil;&atilde;o:<br />
    <select name="promo" id="promo">
      <?php
$sql_query_promo = mysql_query("SELECT * FROM promocao") or die(mysql_error());
$num_rows_promo = mysql_num_rows($sql_query_promo);
while($array_promo = mysql_fetch_array($sql_query_promo)){
	$id_promo = $array_promo["id_promocao"];
	$nome_promo = $array_promo["nome"];
?>
      <option value="<?php echo $id_promo;?>"><?php echo $nome_promo;?></option>
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
    <input name="estoque" type="text" id="estoque" value="<?php echo $estoque;?>" />
    <br />
    Pre&ccedil;o de Compra:<br />
    <label for="preco_compra"></label>
    <input name="preco_compra" type="text" id="preco_compra" value="<?php echo $preco_compra;?>" />
    <br />
   G&ecirc;nero:<br />
  <select name="genero" id="genero">
    <option value="m">Masculino</option>
    <option value="f">Feminino</option>
    <option value="u">Unisex</option>
  </select><?php echo $genero;?>
  <br />
  Infantil:<br />
  <label for="infantil"></label>
  <select name="infantil" id="infantil">
    <option value="1">Sim</option>
    <option value="0">N&atilde;o</option>
  </select>
  <?php echo $infantil;?> (0 = N&atilde;o e 1 = Sim)<br />
  Pre&ccedil;o de Venda:<br />
  <label for="preco_venda"></label>
  <input name="preco_venda" type="text" id="preco_venda" value="<?php echo $preco_venda;?>" />
  <br />
  Imagem:<br />
  <label for="imagem"></label>
  <input type="file" name="file" id="file" />
  <br />
  <img src="anexo/<?php echo $imagem; ?>" width="50" align="middle" /><br />
  Descri&ccedil;&atilde;o:<br />
  <label for="descricao"></label>
  <input name="descricao" type="text" id="descricao" value="<?php echo $descricao;?>" />
  </p>
  <p>
    <input name="Submit" type="submit" value="Enviar">
  </p>
</form>

<?php } ;?>  	