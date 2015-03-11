<html>
<head>
	<title>Carrinho de Compras Surf Store</title>				
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >

	<?php
		include "php/biblioteca.php";
		
		session_start();
		$con = AbrirCon();
	$erro = "";
	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();
	}
	

	if(isset($_SESSION['id']))
		$usr = $_SESSION['id'];
	else $usr = 0;
	//adicionar produto
	// CARRINHO
	if(isset($_GET['acao'])){
		
		//adicionar carrinho
		if($_GET['acao'] == 'add'){
			$id = intval($_POST['id']);
			if(!isset($_SESSION['carrinho'][$id])){
				$_SESSION['carrinho'][$id]=1;
			}else{
				$r = mysql_query("SELECT estoque FROM produto WHERE cod = $id");
				$s = mysql_fetch_array($r);
				if($s[0] < $_SESSION['carrinho'][$id])
					$_SESSION['carrinho'][$id] +=1;
				else $erro = 'Estoque insuficiente...';
			}
		}
		
		//mais carrinho
		if($_GET['acao'] == 'up'){
			$id = intval($_GET['id']);
			if(!isset($_SESSION['carrinho'][$id])){
				$_SESSION['carrinho'][$id]=1;
			}else{
				$_SESSION['carrinho'][$id] +=1;
			}
		}
		

		//menos carrinho
		if($_GET['acao'] == 'down'){
		$id = intval($_GET['id']);
		if(isset($_SESSION['carrinho'][$id])){
			if($_SESSION['carrinho'][$id] > 1)
				$_SESSION['carrinho'][$id] -=1;
			else unset($_SESSION['carrinho'][$id]);
			}
		}
		//remover do carrinho
		if($_GET['acao']=='del'){
			$id = intval($_GET['id']);
			if(isset($_SESSION['carrinho'][$id])){
				unset($_SESSION['carrinho'][$id]);
			}
		}		
	
	}
?>
	<link href="css/config.css" rel="stylesheet" type="text/css" >
	
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
				echo ListarCategorias(0, 0);
			?>
			
			<img src="img/img05.png" width="100%">
			<?php
				echo ListarMarcas(0, 0);
			?>
			<div id="redeSocial">	
				<a href="http://www.facebook.com" target="_blank">
				<img src="img/facebook.png"></a>
				<a href="http://www.twitter.com" target="_blank">
				<img src="img/twitter1.png"></a>
			</div>
		</div>
	
	
		<div id="principal">
			<div id="carrinho">
				<h1>Carrinho de Compras</h1>
			
				<form action="?acao=up" method="post">	
						<?php echo Carrinho(); ?>
				</form>
		
				<div id="botao_carrinho">
					
					
					<form  method="post" action="php/CadVenda.php" >
						<?php
							echo 'Selecione o Endereço de Entrega: '.ComboBoxEndereco($usr);
							echo '<br>Selecione a Forma de Pagamento: '.ComboBoxFormas().'<br>';
									
						?>
							<br><input type="submit" value="Fechar Venda" > 
						</form>
						<br><?php if($erro != "")echo "$erro"; ?><br>
						<form method="post" action="index.php" >
							<input type="submit" value="Continuar Compra" >
						</form>
				</div>
			</div>	
		</div>
		
		<div id="banner_animado">
				
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="750" height="250">
				<param name="movie" value="/bannerPronto.swf">
				<param name="quality" value="high">
				<embed src="bannerPronto.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="750" height="250"></embed></object>
				
		</div>
	</div>
	<hr/>
	
	<div class="barNav">
	  <a href="index.php?func=comoComprar">Como Comprar</a>
	  |
	  <a href="carrinho.php">Minhas Compras</a>
	  |
	  <a href="index.php?func=deixeOpiniao">Deixe sua opiniï¿½o</a>
	  |
	  <a href="index.php?func=opnCliente">Opinião dos Clientes</a>
      |
	  <a href="index.php?func=cadastro">Cadastre-se</a>
	</div>

	<div id="rodape">
	<hr/>
	<iframe src="http://www.facebook.com/plugins/like.php?href=127.0.0.1:90"
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
