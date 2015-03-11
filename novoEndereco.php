<form method="post" action="php/novoEnd.php"  >
	<h1>Atualizar Endereço</h1>
	
	<?php include "frmDadosEnd.php"; ?>
	<input type="hidden" value="<?php echo $usr;?>" name="idCli"/>
	<input type="submit" value="Salvar" />	
</form>
