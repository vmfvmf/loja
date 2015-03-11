<html>
<head>
	<title>Surf Store</title>				
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
	<?php
		include "php/biblioteca.php";
		
		session_start();
		
		$func = "";
		if(!empty($_GET['func']))
			$func = $_GET['func'];
		
		$end = 0;
		if(!empty($_POST['end']))
			$end = $_POST['end'];
		
		$cont = 0;
		if(!empty($_POST['contato']))
			$cont = $_POST['contato'];
		
		
		$promo = 0;
		if(!empty($_GET['promo']))
			$promo = $_GET['promo'];
		
		  
		 /* PRODUT */
		$prod = 0;
		if(!empty($_GET['prod']))
			$prod = $_GET['prod'];
			
		$buscar="";
		if(!empty($_POST['buscar']))
			$buscar = $_POST['buscar'];
		else if(!empty($_GET['busca']))
			$buscar = $_GET['busca'];
		
		  
		 /* POSIÃ&#8225;Ã&#402;O */	
		$pos = 0;
		if(!empty($_GET['pos']))
			$pos = $_GET['pos'];

		/* CATEGORIA */
		$cat = 0;
		if(!empty($_GET['cat']))
			$cat = $_GET['cat'];
			
		/* MARCA */
		$marca = 0;
		if(!empty($_GET['marca']))
			$marca = $_GET['marca'];
		
		/* USUARIO */
		$usr = 0;
		if(!empty($_SESSION['id']))
			$usr = $_SESSION['id'];
		
		$con = AbrirCon();
?>
	<link href="css/config.css" rel="stylesheet" type="text/css" >
	<link href="css/config_lista_prods.css" rel="stylesheet" type="text/css">
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="css/config_pop.css" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/shadowbox.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#datepicker").datepicker();
		});
	Shadowbox.init({
		displayNav: true
	});
	</script>
	


</head>
<body>
	
	<div id="geral">
		<div id="cabecalho" >
			<div id="banner">
				<img src="img/banner.png">							
			</div>
		
			<div id="menu">
				<?php include "menu.php"; ?>
			</div>
			
			<div id="busca">
					<?php include "busca.php"; ?>
			</div>
			<div id="usuario">
				<?php if($usr > 0) include "usuario.php"; ?>
			</div>
		</div>
		<div id="corpo">
			<div id="menu_esquerda">
					<img src="img/img04.png" width="100%" height="40px">
					<?php
						echo ListarCategorias($marca, $promo);
					?>
					
					<img src="img/img05.png" width="100%">
					<?php
						echo ListarMarcas($cat, $promo);
					?>
					<div id="redeSocial">	
						<a href="http://www.facebook.com" target="_blank">
						<img src="img/facebook.png"></a>
						<a href="http://www.twitter.com" target="_blank">
						<img src="img/twitter1.png"></a>
					</div>
			</div>
			
			
			<div id="principal">
				<?php
					if(!empty($_GET['func'])){
						switch($_GET['func']){
							case 'cadastro':
								include "formCliente.php";
							break;
							case 'promocoes':
								echo ListarPromos();
							break;
							case 'contato':
								include "contato.php";
							break;
							case 'recuperarSenha':
								include "recuperarSenha.php";
							break;
							case 'outonoInverno':
								echo buscaProds($pos, $cat, $marca, 1); // PROMO OUTONO
							break;
							case 'novidadesINV':
								echo buscaProds($pos, $cat, $marca, 2); // NOVDADES
							break;
							case 'colecaoInverno':
								echo buscaProds($pos, $cat, $marca, 3); // PROMO INVERNO
							break;
							case 'diaNamorados':
								echo buscaProds($pos, $cat, $marca, 4); // PROMO ID DIA NAMORADOS
							break;
							case 'produto':
								echo PegaProduto($prod);
							break;
							case 'tenis': // alterar
								echo Produto(20);
							break;
							case 'login':
								include "login.php";
							break;
							case 'comoComprar':
								include "comoComprar.php";
							break;
							case 'atendCliente':
								include "atendimentoCliente.php";
							break;
							case 'deixeOpiniao':
								include "deixeOpiniao.php";
							break;
							case 'compras':
								 include "php/verificarAcesso.php";
								 echo(BuscaComprasCli($usr));
							break;
							case 'erroLogin':
								echo("<br><br>Usuário ou senha inválidos!<br><br><br>");
							break;
							case 'venda_registrada':
								echo("<br><br>Venda Registrada com Sucesso! A Surf Store agradece a preferência!<br><br><br>");
							break;						
							case 'busca':
								echo Buscar($buscar, $pos);
							break;
							case 'perfil':
								include "perfil.php";
							break;
							case 'enderecos':
								 include "php/verificarAcesso.php";
									echo enderecosCliente($usr);
							break;
							case "end":
								include "php/verificarAcesso.php";
								include "updateEndereco.php";
							break;
							case "novo_end":
								include "php/verificarAcesso.php";
								include "novoEndereco.php";
							break;
							case 'contatos':
								include "php/verificarAcesso.php";
								echo contatosCliente($usr);
							break;
							case 'cli_cont':
								include "php/verificarAcesso.php";
								include "updateContato.php";
							break;
							case "novo_cont":
								include "php/verificarAcesso.php";
								include "novoContato.php";
							break;
							case "erro":
								echo "Erro de conexão";
							break;
						}
					}
							else echo buscaProds($pos, $cat, $marca, $promo);
							
						
					?>
			<div id="banner_animado">
						
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="750" height="250">
				<param name="movie" value="/bannerPronto.swf">
				<param name="quality" value="high">
				<embed src="/bannerPronto.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="250"></embed></object>
						
			</div>	
		</div>
		
		</div>
		<div id="rodape">
			<hr/>
			<div class="barNav">
		  		<a href="index.php?func=comoComprar">Como Comprar</a>
		  			|
				  <a href="carrinho.php">Minhas Compras</a>
				  	|
				  <a href="index.php?func=deixeOpiniao">Deixe sua opinião</a>
				  	|
				  <a href="index.php?func=opnCliente">Opinião dos Clientes</a>
			      	|
				  <a href="index.php?func=cadastro">Cadastre-se</a>
			</div>
			<hr/>
			<iframe src="https://www.facebook.com/plugins/like.php?href=127.0.0.1:90"
				scrolling="no" frameborder="0"
				style="border:none; width:450px; height:80px"></iframe>
				<br>
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Surf Store</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
		if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			<br>
		<img src="img/formasPagamento.png">
			<br/>COPYRIGHT © 2012 - 2013 C4TRADE LTDA
			<br/>Todos os direitos reservados Todas as imagens aqui veiculadas são de propriedade da SurfStore OnLine. É proibida a reprodução, total ou parcial.
	</div>
	
	</div>
</body>
<?php FecharCon($con); ?>
</html>
