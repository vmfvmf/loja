<?php
	session_start();
?>
<html>
	<head>
		<title>Painel Administrativo</title>
        <link href="css/configInicial.css" rel="stylesheet" type="text/css"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
		<div id="geral">
			<div id="banner">
           <h1 align="center"><img src="images/banner01.jpg" width="300" height="120"></h1>
		</div>
	    <div id="conteudo">
			  <div id="formulario" align="center">
				<form method="post" action="php/login.php">
				<p>Usu&aacute;rio:
  					<input type="text" name="usuario" maxlength="10" size="12"/>
  				Senha: <input type="password" name="senha" maxlength="10" size="12"/>
  				&nbsp;&nbsp;&nbsp;
  				<input type="submit" value="Entrar" id="button"/>
				</p>
				</form>			
			</div>
		</div>
				<div id="rodape">
                	Painel Administrativo SurfStore
				</div>	
			  </div>
		  </div>
	</div>
	</body>
</html>