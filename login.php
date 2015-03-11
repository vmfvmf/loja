	<link href="css/config_form.css" rel="stylesheet" type="text/css"/>
<div id="formulario">
	<form method="post" action="php/login.php" enctype="multipart/form-data">
		<br><br><div class="titulo">
			<h2>Login</h2>
		</div>

		<div class="col1">Usuário:</div><div class="col2"><input type="text" name="usuario"></div>
		<br>
		<div class="col1">Senha: </div><div class="col2"><input type="password" name="senha"></div>
		<br>
		<div class="btn">
			<input type="submit" value="Logar">
		</div>
	</form>
<a href=index.php?func=cadastro>Faça seu Cadastro!</a>
<br/>
<a href=index.php?func=recuperarSenha>Esqueceu a Senha?</a>
<br/>
<br/>
<br/>

</div>