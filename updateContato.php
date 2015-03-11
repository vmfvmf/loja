<?php
	$res = mysql_query("select * from contato where id_contato = $cont");
	$r = mysql_fetch_array($res);
	$a =  $r[0].";".$r[1].";".$r[2];
?>
<form method="post" action="php/updateContato.php"  >
	<h1>Atualizar Contato</h1>
	
	Número:<input type="text" name="numero" id="numContato" maxlength="10" size="10"/>
	Operadora:<?php echo ComboBoxOperadoras(); ?>
	<input type="submit" value="Atualizar" />
	<input type="hidden" value="<?php echo $cont;?>" name="id_cont" />
		
</form>
<input type="hidden" value="<?php echo $a;?>" id="auxContato" />
<form method="post" action="index.php?func=contatos"  >
	<input type="submit" value="Voltar" />
</form>
<script>
	document.onfocus = PopulaContato(document.getElementById('auxContato').value);	
</script>
