<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >

	<div class="col1">Nome:</div>
		<div class="col2"><input type="text" name="nome" size="50" maxlength="20" id="nome" 
			onblur="informa(this)" >
		<span id="erro_nome" >*</span>
	</div>

	<div class="col1">Sobrenome:</div>
		<div class="col2"><input type="text" name="sobrenome" size="50" maxlength="80" id="sobrenome" 
			 onblur="informa(this)" >
		<span id="erro_sobrenome">*</span>
	</div>


	<div id="rg">
	<div class="col1">RG:</div>
		<div class="col2"><input type="text" name="rg" onblur="informa(this)"
			onfocus="if(this.value == 'n�o digite tra�os e pontos'){ this.value = '';}" 
			value="n�o digite tra�os e pontos" size="30" 
			 maxlength="12" id="rg" >
		<span id="erro_rg">*</span>
	</div>

	<div id="cpf">
	<div class="col1">CPF:</div>
		<div class="col2"><input type="text" name="cpf" onblur="informa(this)"
			onfocus="if(this.value == 'n�o digite tra�os e pontos'){ this.value = '';}" 
			value="n�o digite tra�os e pontos" size="30" maxlength="11" id="cpf" >
			<span id="erro_cpf">*</span>
		</div>
	</div>

	<div id="dtNasc">
		<div class="col1">Data de Nascimento:</div>
			<div class="col2"> <input type="text" id="datepicker" name="data_nasc">
			<span id="erro_data"></span>
		</div>
	</div>

	<div class="col1">Sexo:</div>
	<div class="col2">
		<input type="radio" name="sexo" value="m" checked="true" >Masculino
		<input type="radio" name="sexo" value="f" >Feminino
	</div>
	
	<div class="col1">Telefone:</div>
	<div class="col2"><input type="text" name="telefone" size="30" maxlength="11" id="telefone" >*
		<span id="Telefone"></span>
	</div>
	
	<div class="col1">Celular:</div>
	<div class="col2"><input type="text" name="celular" size="30" maxlength="11" id="celular" >*
						<?php echo ComboBoxOperadoras(); ?>
			<span id="Celular"></span>
	</div>
	
