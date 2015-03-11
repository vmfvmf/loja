<h2>Clientes</h2>

<table width="711" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
$sql_query = mysql_query("SELECT * FROM cliente") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$id = $array["id_cliente"];
	$nome = $array["nome"];
	$sobrenome = $array["sobrenome"];

?>  
<form id="form<?php echo $id; ?>" name="form1" method="post" action="?comp=../php/verEnd">
  <tr>   
  	<td width="37"><?php echo $id; ?></td>
    <td width="475"><?php echo $nome; ?> <?php echo $sobrenome; ?></td>
	<td width="171">
   		Endereço: <br />
        <select name="end" id="end">
          <?php
			$sql_query2 = mysql_query("SELECT * FROM clienteenderecos WHERE $id=id_cliente") or die(mysql_error());;
			$num_rows2 = mysql_num_rows($sql_query2);
			while($array2 = mysql_fetch_array($sql_query2)) {
				
			$id_cliente = $array2["id_cliente"];
			$id_endereco = $array2["id_endereco"];

		?>
          <option value="<?php echo $id_endereco ?>"><?php echo $id_endereco; ?></option>
          <?php } ;?>  
        </select>
      <input name="id_endereco" type="hidden" id="id_endereco" value="<?php echo $id_endereco;?>"/>
      <input type="submit" name="button" id="button" value="Ver" />
    </p></td>
  </tr>
  </form>
 <?php } ;?>  
</table>