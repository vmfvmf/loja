<h2>Pedidos</h2>
<table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
<?php
	$sql_query = mysql_query("SELECT * FROM venda") or die(mysql_error());;
	$num_rows = mysql_num_rows($sql_query);
	while($array = mysql_fetch_array($sql_query)) {
		
	$id = $array["id_venda"];
	$data_hora = $array["data_hora"];
	$id_forma_pagamento = $array["id_forma_pagamento"];
	$status = $array["id_status"];	
	$id_cliente = $array["id_cliente"];
	$id_end_entrega = $array["id_end_entrega"];
?>
<form id="form<?php echo $id; ?>" name="form1" method="post" action="?comp=../php/altStatus">
    <tr>
      <td width="244" align="left" valign="middle">Nº do Pedido: <?php echo $id; ?>
<?php
			$sql_query_cliente = mysql_query("SELECT * FROM view_cliente_venda WHERE id_cliente=$id_cliente") or die(mysql_error());;
			$num_rows_cliente = mysql_num_rows($sql_query_cliente);
			while($array_cliente = mysql_fetch_array($sql_query_cliente)) {
				
			$nome_cliente = $array_cliente["nome"];
			$sobrenome_cliente = $array_cliente["sobrenome"];
		?>
   <?php } ;?><br />
	   Cliente: <?php echo "$nome_cliente $sobrenome_cliente"; ?><br/>
       Endereço: <?php echo $id_end_entrega; ?><br />
     	<?php echo $data_hora; ?>
</td>
      <td width="173" align="center" valign="middle"><label for="status"></label>
        <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
        Status: <?php echo $status; ?><br />
        <select name="status" id="status">
        <?php
			$sql_query2 = mysql_query("SELECT * FROM statusvenda") or die(mysql_error());;
			$num_rows2 = mysql_num_rows($sql_query2);
			while($array2 = mysql_fetch_array($sql_query2)) {
				
			$id_status = $array2["id_status"];
			$nome_status = $array2["nome"];
		?>
          <option value="<?php echo $id_status; ?>"><?php echo $id_status; ?> - <?php echo $nome_status; ?></option>
        <?php } ;?>  
      </select></td>
      <td width="55" align="center" valign="middle"><input type="submit" name="button" id="button" value="Alterar" /></td>
    </tr>
</form>    
    <?php } ;?>
  </table>
