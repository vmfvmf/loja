<?php
	include "php/validarAcesso.php";
	include "php/conexao.php";
?>
<html>
	<head>
		<title>Painel Administrativo</title>
        <link rel="shortcut icon" href="images/favicon.ico" />
	
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        
   		<link href="css/config.css" rel="stylesheet" type="text/css" media="screen, projection"/>   
    		
		<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>	
		<script type="text/javascript" language="javascript" src="js/hoverIntent.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dropdown.js"></script>
    </head>
	<body>
	<div id="geral">
			<div id="banner">
				<h1 align="center"><a href="principal.php?comp="><img src="images/banner01.jpg" width="300" height="120"></a></h1>
			</div>
	<div id="menu">
		<ul class="dropdown">
        	<li><a href="principal.php?comp=listarCliente">Clientes</a></li>
            <li><a href="principal.php?comp=listarPedido">Pedidos</a></li>
            <li><a>Produtos</a>
        		<ul class="sub_menu">
        			<li><a href="?comp=listarCategoria">Categoria</a></li>
   					<li><a href="?comp=listarMarca">Marca</a></li>
					<li><a href="?comp=listarTamanho">Tamanho</a></li> 
   					<li><a href="?comp=listarCor">Cor</a></li>   
					<li><a href="?comp=listarProduto">Produto</a></li> 
        		</ul>
        	</li>
            <li><a href="principal.php?comp=listarPromo">Promoções</a></li>
            <li><a href="php/logoff.php">Sair</a></li>
        </ul>
	</div>
		<div id="conteudo">
       			<div id="formulario">
					<?php
							$area = $_GET['comp'];
							if($area == ""){
							include("estrutura/principal.php");
							} else {
							include("estrutura/$area.php");
							}
					?>
				</div>
			</div>
		<div id="rodape">
			Painel Administrativo SurfStore
		</div>
	</div>
	</body>
</html>