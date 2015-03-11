<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?func=promocoes">Promoções</a></li>
	<li><a href="carrinho.php">Carrinho</a></li>
	<li><a href="index.php?func=contato">Contato</a></li>
	<?php
		if($usr == 0) echo '<li><a href="index.php?func=login">Login</a></li>';
		else echo '<li><a href="index.php?func=perfil">Perfil</a></li>';
	?>
	<li><a href="app.html">App</a></li>
</ul>