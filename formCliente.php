	<link href="css/config_form.css" rel="stylesheet" type="text/css" >
	<script src="biblioteca.js" type="text/javascript"></script>

<form method="post" action="php/cadCliente.php" id="formCad" enctype="multipart/form-data">

<div id="formulario">

<div class="titulo">
<h2>Dados pessoais</h2>
</div>

<div class="col1">Nome:</div>
	<div class="col2"><input type="text" name="nome" onKeyPress="valida_digitos('nome')" onBlur="valida_campos('nome')" onFocus="informa('nome')" size="50" 
	id="nome" maxlength="20" />*
	<div id="respostanome" style="color: red"></div></div>

<div class="col1">Sobrenome:</div>
	<div class="col2"><input type="text" maxlength="80" name="sobrenome" onKeyPress="valida_digitos('sobrenome')" onBlur="valida_campos('sobrenome')" onFocus="informa('sobrenome')" size="50" id="sobrenome" />*
	<div id="respostasobrenome" style="color: red"></div></div>

<div class="col1">RG:</div>
	<div class="col2"><input type="text" name="rg" onKeyPress="valida_digitos('rg')" onblur="valida_campos('rg')" onKeyUp="formata('rg')" 
        onfocus="informa('rg')" size="30" maxlength="10" id="rg" >*
	<div id="respostarg" style="color: red"></div></div>

<div class="col1">CPF:</div>
	<div class="col2"><input type="text" name="cpf" onKeyPress="valida_digitos('cpf')" onblur="validar_CPF('cpf')" onKeyUp="formata('cpf')" 
            onfocus="informa('cpf')" maxLength="14" size="30" id="cpf" >*
	<div id="respostacpf" style="color: red"></div></div>

<div id="dtNasc">
<div class="col1">Data de Nascimento:</div>
	<div class="col2"><input type="text" name="datepicker" onblur="validar_Data('datepicker')"  
		maxlength="10"	onkeyup="formata('datepicker')" onfocus="informa('datepicker')" size="10" id="datepicker" />
	<div id="respostadatepicker" style="color:red"></div></div>
</div>

<div class="col1">Sexo:</div>
	<div class="col2"><input type="radio" name="sexo" onClick="limpaID('sexo')" value="m" checked="true" >Masculino
	<input type="radio" name="sexo" onClick="limpaID('sexo')" value="f" >Feminino
	<div id="respostasexo" style="color: red"></div></div>

<div class="col1">Contato 1:</div>
	<div class="col2"><input type="text" name="contato1" onKeyPress="valida_digitos('contato1')" onblur="valida_campos('contato1')" 
	onKeyUp="formata('contato1')" onfocus="informa('contato1')" size="30" maxlength="10" id="contato1" />
					<?php echo ComboBoxOperadoras('operadora1'); ?>*
	<div id="respostacontato1" style="color: red"></div></div>
	
<div class="col1">Contato 2:</div>
	<div class="col2"><input type="text" name="contato2" onKeyPress="valida_digitos('contato2')" onblur="valida_campos('contato2')" 
	onKeyUp="formata('contato2')" onfocus="informa('contato2')" size="30" maxlength="10" id="contato2" />
					<?php echo ComboBoxOperadoras('operadora2'); ?>
	<div id="respostacontato2" style="color: red"></div></div>


<div class="titulo">
<h2>Dados do endereço</h2>
</div>

<div class="col1">UF:</div>
	<div class="col2"><select name="uf" onchange="limpaID('uf'),informa('uf'),valida_cep('cep')" size="1">
	<option value="selecione">selecione..</option>
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espí­rito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MT">Mato Grosso</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraí­ba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí­</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
	</select>
	<div id="respostauf" style="color: red"></div></div>

<div class="col1">CEP:</div>
	<div class="col2"><input type="text" maxlength="9" onKeyPress="valida_digitos('cep')" onkeydown="formata('cep')" onBlur="valida_cep('cep')" onfocus="informa('cep')" name="cep" size="30" id="cep" >*
	<div id="respostacep" style="color: red"></div></div>

<div class="col1">Endereí§o:</div>
	<div class="col2"><input type="text" name="endereco" onKeyPress="valida_digitos('endereco')" onBlur="valida_campos('endereco')" 
	onFocus="informa('endereco')" size="50" maxlength="60" id="endereco" >*
	<div id="respostaendereco" style="color: red"></div></div>

<div class="col1">Número:</div>
	<div class="col2"><input type="text" name="numero" onKeyPress="valida_digitos('numero')" onblur="valida_campos('numero')" 
	onKeyUp="formata('numero')" onfocus="informa('numero')" maxlength="6" size="6" id="numero" >*
	<div id="respostanumero" style="color: red"></div></div>

<div class="col1">Complemento:</div>
	<div class="col2"><input type="text" name="complemento"   
	 size="20" maxlength="20"/></div>

<div class="col1">Bairro:</div>
	<div class="col2"><input type="text" name="bairro" onKeyPress="valida_digitos('bairro')" onBlur="valida_campos('bairro')" onFocus="informa('bairro')" 
	size="50" maxlength="45" id="bairro" >*
	<div id="respostabairro" style="color: red"></div></div>

<div class="col1">Cidade:</div>
	<div class="col2"><input type="text" name="cidade" onKeyPress="valida_digitos('cidade')" onBlur="valida_campos('cidade')" onFocus="informa('cidade')" 
	size="50" maxlength="45" id="cidade" >*
	<div id="respostacidade" style="color: red"></div></div>
	
<div class="titulo">
<h2>Dados da conta</h2>
</div>

<div class="col1">E-mail:</div>
	<div class="col2"><input type="text" name="email" maxlength="55" onBlur="valida_campos('email'); checkEmail(this.value);" onfocus="informa('email')" size="50" id="email" >*
	<div id="respostaemail" style="color: red"></div><div id="erroemail" style="color: red"></div></div>
	
<div class="col1">Confirmar e-mail:</div>
	<div class="col2"><input type="text" name="confEmail" maxlength="55" onKeyUp="ConferiEmails(document.getElementById('email').value, this.value)" onfocus="informa('confEmail')" size="50" maxlength="55" 
	id="confEmail" >*
	<div id="respostaconfEmail" style="color: red"></div></div>

<div class="col1">Senha:</div>
	<div class="col2"><input type="password" name="senha" onBlur="valida_campos('senha')" onfocus="informa('senha')" size="12" maxlength="12" id="senha" >*
	<div id="respostasenha" style="color: red"></div></div>

<div class="col1">Confirmar senha:</div>
	<div class="col2"><input type="password" name="confSenha" onkeyup="ConferiSenhas(document.getElementById('senha').value, this.value)" maxlength="12" onfocus="informa('confSenha')" size="12" 
		id="confSenha" >*
	<div id="respostaconfSenha" style="color: red"></div></div>
	
<div class="col1">Pergunta de segurança:</div>
	<div class="col2"><?php echo(ComboBoxPerguntas()); ?>
	</div>

<div class="col1">Resposta:</div>
	<div class="col2"><input type="text" name="resposta" onBlur="valida_campos('resposta')" onfocus="informa('resposta')" size="50" maxlength="45" 
	id="resposta" >*
	<div id="respostaresposta" style="color: red"></div>
	<input type="checkbox" id="assinar" onclick="valida_enviar();" > Confirmar o envio dos dados...
<div class="btn">
	<input type="submit" value="Cadastrar" disabled="disabled" id="cadastrar">
	<input type="reset" value="Apagar">
<br>
* <font size="2"> - campos obrigatórios.</font>
<input type="hidden" value="1" id="aux" />
</div>
</div>

</form>