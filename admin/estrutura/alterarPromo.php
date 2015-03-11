<?php
$id = $_GET['id'];
$sql_query = mysql_query("SELECT * FROM promocao WHERE id_promocao = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

$id = $array["id_promocao"];
$nome = $array['nome'];
$desconto = $array['desconto'];
$vigente = $array['vigente'];
?>  
<form name="form1" method="post" action="?comp=../php/altPromo">
	<p>Nome:<br />
  <input name="nome" type="text" value="<?php echo $nome; ?>"><br />
		Alterar Desconto:<br />
  <input name="desconto" type="text" value="<?php echo $desconto; ?>"><br />
  		Alterar Vigente: <?php echo $vigente;?><br />
  <select name="vigente" id="vigente">
    <option value="1">Sim</option>
    <option value="0">Não</option>
  </select>
  <br />

	  <input name="Submit" type="submit" value="Alterar">
	  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
  </p>
</form>
<?php } ;?>  	