<html>
<head>
<title> Comprar</title>
</head>
<body background="image/fundo.jpg">
<center><h1><marquee direction="right"><img src="image/asd.gif"/> Produtos Lixo da YouStore<img src="image/asd2.gif"/></marquee></h1></center><hr/>
<?php
	require("conexao.php");
	
	$sql ="SELECT * FROM  view_produto_detalhes";
	$qr = mysql_query($sql) or die (mysql_error());
	while($ln = mysql_fetch_assoc($qr)){
		echo'<h2>'.$ln['modelo'].'</h2><br/>';
		echo '<img src="image/'.$ln['imagem'].'" /> <br/>';
		echo 'Preço : R$ '.number_format($ln['preco_venda'],2,',', '.').'<br />';
		echo' Temos '.$ln['estoque'].'x no estoque<br/>';
		echo 'Desconto : R$ '.number_format($ln['desconto'],2,',', '.').' a vista<br />';
		echo 'Descrição : '.$ln['descricao'].' <br/> ';
		echo '<a href="carrinho.php?acao=add&cod='.$ln['cod'].'">Comprar</a>';
		echo '<hr/>';
		}
?>
<h1> Escreva Para Brincar (:
	<?php
		include "flash/langsettings.php";
	?>
	
		&nbsp;<p>
		<h1>	
		<?php 
			echo $TEXT['flash-head']; 
		?>
		</h1>
		<?php
			$text=$_REQUEST['text'];
			if($text=="")$text = "YouStore";
		?>

		<object data="flash/mingswf.php?text=<?=urlencode($text)?>" width="520" height="320" type="application/x-shockwave-flash">
			<param name="movie" value="flash/mingswf.php?text=<?=urlencode($text)?>">
			<param name="loop" value="true">
            <a href="http://www.macromedia.com/go/getflashplayer"><img src="http://www.macromedia.com/images/shared/download_buttons/get_flash_player.gif" width="88" height="31" alt="get flash player" title=""></a>
		</object>

			<p class=small>
			<?=$TEXT['iart-text1']?>
			<p>

		<form name="ff" action="flash/ming.php" method="get">
			<br/>
			<input type="text" name="text" value="<?=$text?>" size="30">
			<input type="submit" value="OK">
		</form>

		<a href="/tcc">Home Page</a>
		
</body>
</html>