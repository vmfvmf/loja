<div class="col1">CEP:</div>
	<div class="col2"><input type="text" name="cep" size="30" maxlength="8" id="cep" >*
		<span id="CEP"></span>
	</div>

	<div class="col1">Endereço:</div>
	<div class="col2"><input type="text" name="endereco" size="50" maxlength="60" id="endereco" >*
		<span id="Endereco"></span>
	</div>

	<div class="col1">Número:</div>
	<div class="col2"><input type="text" name="numero" size="6" maxlength="6" id="numero" >*
		<span id="Numero"></span>
	</div>

	<div class="col1">Complemento:</div>
		<div class="col2"><input type="text" name="complemento" id="complemento" size="20" maxlength="20" 
			onblur="if(this.value == ''){ this.value = 'casa/ap/etc';}"
			onfocus="if(this.value == 'casa/ap/etc'){ this.value = '';}" 
			value="casa/ap/etc"  >
		</div>

	<div class="col1">Bairro:</div>
	<div class="col2"><input type="text" name="bairro" size="50" maxlength="45" id="bairro" >*
		<span id="Bairro"></span>
	</div>

	<div class="col1">Cidade:</div>
	<div class="col2"><input type="text" name="cidade" size="50" maxlength="45" id="cidade" >*
		<span id="Cidade"></span>
	</div>


	<div class="col1">UF:</div>
	<div class="col2">
		<select name="uf" size="1" id="uf">
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espírito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MT">Mato Grosso</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraíba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondonia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP" id="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantins</option>
		</select>
	</div>
	