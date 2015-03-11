<form method="post" action="php/novoCont.php"  >
	<h1>Novo Contato</h1>
	
	Número:<input type="text" name="numero" id="numContato" maxlength="10" size="10"/>
	Operadora:<?php echo ComboBoxOperadoras(); ?>
	
	<input type="hidden" value="<?php echo $usr;?>" name="idCli"/>
	<input type="submit" value="Salvar" />	
</form>
