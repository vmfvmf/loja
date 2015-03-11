<?php
	$res = mysql_query("select * from endereco where id_endereco = $end");
	$r = mysql_fetch_array($res);
	$a =  $r[0].";".$r[1].";".$r[2].";".$r[3].';'.$r[4].';'.$r[5].';'.
			$r[6].';'.$r[7].';'.$r[8];
?>
<form method="post" action="php/updateEnd.php"  >
	<h1>Atualizar Endereço</h1>
	
	<?php include "frmDadosEnd.php"; ?>
	<input type="submit" value="Atualizar" />
	<input type="hidden" value="<?php echo $end;?>" name="id_end" />	
</form>
<form method="post" action="index.php?func=enderecos"  >
	<input type="submit" value="Voltar" />
</form>
<input type="hidden" value="<?php echo $a;?>" id="aux" />
<script>
	document.onfocus = PopulaEnd(document.getElementById('aux').value);
</script>