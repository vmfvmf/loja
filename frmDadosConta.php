	<div class="col1">E-mail:</div>
	<div class="col2"><input type="text" name="email" id="email" onkeyup="checkEmail(this.value);" />
		<div id="txtHint">aqui</div>
		
	</div>
	
	<div class="col1">Confirmar e-mail:</div>
	<div class="col2"><input type="text" size="50" maxlength="55" id="confEmail" >*
		<span id="ConfEmail"></span>
	</div>

	<div class="col1">Senha:</div>
	<div class="col2"><input type="password" name="senha" size="30" maxlength="55" id="senha" >*
		<span id="Senha"></span>
	</div>

	<div class="col1">Confirmar senha:</div>
	<div class="col2"><input type="password" size="30" maxlength="55" 
		id="confSenha" >*
		<span id="ConfSenha"></span>
	</div>
	
	<div class="col1">Pergunta de segurança:</div>
	<div class="col2"><?php echo(ComboBoxPerguntas()); ?>
	</div>

	<div class="col1">Resposta:</div>
	<div class="col2"><input type="text" name="resposta" size="50" maxlength="55" id="resposta" >*
		<span id="Resposta"></span>
	</div>
