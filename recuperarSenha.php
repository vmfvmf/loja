<h1>Recuperar Senha</h1>

Digite o E-Mail: <input type="text" name="email" id="email" />

<button onclick="ConsultaEmail(document.getElementById('email').value)" >Pesquisar</button>

<div id="txtHint"></div>
<div id="txtResposta"></div>

<div id="campo_resposta" >
	<input type="hidden" id="id_email" />
	<input  type="text" id="resposta" />
	<button  id="btSenha" onclick="ConsultaResposta(document.getElementById('email').value, document.getElementById('id_email').value, document.getElementById('resposta').value);" >
	Enviar Resposta</button>
</div>