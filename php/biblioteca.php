<?php

	/* AUTOR VMF */
	include "conexao.php";
	function ListarCategorias($marca, $promo){
	$texto = "";
	$result = mysql_query("select * from categorias");
	
	if(mysql_num_rows($result)> 0 ){
		$texto  = "<ul type=\"none\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<li><a href=\"index.php?cat=".$r[0];
			
			if($marca > 0)
				$texto .= "&marca=$marca";
			if($promo > 0)
				$texto .= "&promo=$promo";
			
			$texto .= "\" >".$r[1]."</a></li>";
		}	
		$texto .= "</ul>";
	}
	else $texto = "Nenhuma Categoria Cadastrada";
	return $texto;
	}

function ListarMarcas($cat, $promo){
	$texto = "";
	$result = mysql_query("select * from marca");
	
	if(mysql_num_rows($result)>0){
		$texto = "<ul type=\"none\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<li><a href=\"index.php?marca=".$r[0];
			
			if($cat > 0)
				 $texto .= "&cat=$cat";
			if($promo > 0)
				$texto .= "&promo=$promo";
		
			$texto .= "\" >".$r[1]."</a></li>";

		}	
		$texto .= "</ul>";
	}
	else $texto = "Nenhuma Marca Cadastrada";
	return $texto;
	}

function ListarPromos(){
	$texto = "";
	$result = mysql_query("select id_promocao, nome from promocao where vigente = 1");
	

	if(mysql_num_rows($result)>0){
		$texto = "<h2>Promoções</h2><ul type=\"none\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<li><a href=\"index.php?promo=".$r[0].
                            "\" ><h3>".$r[1]."</h3></a></li>";

		}	
		$texto .= "</ul>";
	}
	else $texto = "Nenhuma Promoção Cadastrada";
	return $texto;
}
  
      
function NomeMarca($marca){
	$texto = "";
	$result = mysql_query("select nome from marca where id_marca = $marca");
	if(mysql_num_rows($result) == 0){
		$texto = "Nenhuma marca Cadastrada";
	}
	else{
	 $arr = mysql_fetch_array($result);
	 $texto = $arr[0];
	}
	return  $texto;
}

function NomePromocao($promo){
	$texto = "";
	$result = mysql_query("select nome from promocao where id_promocao = $promo and vigente = 1");
	if(mysql_num_rows($result) == 0){
		$texto = "Promoçãoo inválida";
	}
	else{
	 $arr = mysql_fetch_array($result);
	 $texto = $arr[0];
	}
	return  $texto;
}


function NomeCategoria($cat){
	$texto = "";
	$result = mysql_query("select nome from categorias where id_categoria = $cat");
	if(mysql_num_rows($result) == 0){
		$texto = "Categoria não cadastrada";
	}
	else{
	 $arr = mysql_fetch_array($result);
	 $texto = $arr[0];
	}
	return  $texto;
}
function NomeUsuario($usr){
	$texto = "";
	$result = mysql_query("select nome from cliente where id_cliente = $usr");
	if(mysql_num_rows($result) == 0){
		$texto = "usuário não cadastrado";
	}
	else{
	 $arr = mysql_fetch_array($result);
	 $texto = $arr[0];
	}
	return  $texto;
}


/*				BUSCAR PRODUTOS					*/	

function buscaProds($pos, $cat, $marca, $promo){
	$texto="";
	
	$sql = 'select cod, categoria, tamanho, cor, genero, imagem, marca, preco_venda, descricao, 
		nome, desconto, vigente from view_produto_detalhes where estoque > 0 ';
	
	
	if($promo > 0) 	$sql .= " and id_promocao = $promo and vigente = 1 ";
	if($marca > 0)  $sql .= " and id_marca = $marca ";
	if($cat > 0) 	$sql .= " and id_categoria = $cat ";
	
	$sql .= " limit $pos, 16 ";
	
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num == 0 )
		$texto .= "Nenhum Produto Encontrado!";
	else{
		$texto .= "<div id=\"prod_geral\">";
		
		// CATEGORIA E MARCA E PROMO
		if($cat > 0 || $marca > 0 || $promo > 0){
			$texto .= "<h2><a href=\"index.php\"> Home </a>";
			if($cat > 0) $texto .= "> <a href=\"index.php?cat=$cat\">".NomeCategoria($cat)."</a>";			
			if($marca > 0) $texto .= " > <a href=\"index.php?marca=$marca\">".NomeMarca($marca)."</a>";
			if($promo > 0)$texto .= " > <a href=\"index.php?promo=$promo\">Promoção ".NomePromocao($promo)."</a>";
			$texto .= "</h2>";
		}
		
		
		// NAVEGAÇÃO
		$texto .= prodNav($cat, $marca, $promo);
				
		$texto .= "<div id=\"prods_tabela\" >";
		while($resp = mysql_fetch_array($result)){
			$texto .= "<div class=\"produto\">".
				"<div class=\"imagem\">".
					"<img src=\"admin/anexo/".$resp[5]."\" ".
					"title=\"".$resp[1]."\"  height=\"190px\" width=\"190px\" />".
				"</div>".
				"<div class=\"desc_prod\">".
					$resp[1]." ".$resp[6]." ".$resp[8].
				"</div>";
				
				
			if($resp[10] > 0){
                  $texto .= "<div class=\"preco_pc\">".
								"De <strike>R$ ".number_format($resp[7],2, ', ','.')."</strike>".
	              				"<br>Por ".number_format($resp[7]-($resp[7]*($resp[10]/100)),2, ', ','.').
                            "</div>";
            }else {
                 $texto .= "<div class=\"preco_pc\">".
								"R$ ".number_format($resp[7],2, ', ','.').
							"</div>";
			}                     
          		 
          	$texto .= "<div class=\"pag_produto\"><a href=\"index.php?func=produto&prod=".$resp[0].
          		 	"\" >Detalhes</a></div>".
           			"</div>"; // FECHA PRODUTO
		}
		$texto .= "</div>"; // FECHA TABELA PRODUTOS
		
		// NAVEGAÇÃO	
		$texto .= prodNav($cat, $marca, $promo);
		
		$texto .= "</div>"; // FECHAR GERAL
	}
	return $texto;
}

function prodNav($cat, $marca, $promo){ // VALORES PARA BUSCA
		$texto = '<div id="prod_nav" >';
		
		$sql = "select count(cod) from view_produto_detalhes where estoque > 0 "; //COUNT PARA CONTAR QTD LINHAS
		
		if($marca > 0 || $cat > 0 || $promo > 0){
			if($marca > 0) 	$sql .= " and id_marca = $marca ";
			if($cat > 0) 	$sql .= " and id_categoria = $cat ";
			if($promo > 0) 	$sql .= " and id_promocao = $promo ";
		}
		
		$result = mysql_query($sql);
		$num = mysql_fetch_array($result);
		$n = 1; 
		$texto .= "<ul>";
		
		for($aux = 0; $aux < $num[0]; $aux += 16){ 
			
			$link = "";
			if($marca > 0) 	$link .= "&marca=$marca";
			if($cat > 0) 	$link .= "&cat=$cat";
			if($promo > 0) 	$link .= "&promo=$promo";
			
			$texto .= "<li><a href=\"index.php?pos=$aux$link\" >$n</a></li>";
			$n++;
		}
		$texto .= "</ul></div>";
		
		return $texto;
}

/*********************BUSCAR COMPRAS CLIENTE***************************/
function BuscaComprasCli($cli){
	$sql = "select data_hora from venda where id_cliente = $cli";
		echo '<link href="css/tabela.css" rel="stylesheet" type="text/css">';
	$result = mysql_query($sql);
	$texto = '<h1>Histórico de Compras</h1>
		<table id="tabela_geral" >
				<thead id="thead_titulos" >
							<td class="cell_texto">Dt Compra</td>
							<td class="cell_texto">Descrição</td>
							<td class="cell_texto">Qtd</td>
							<td class="cell_texto">Detalhes</td>
							<td class="cell_valores">Preço </td>
							<td class="cell_valores">Preço x Qtd</td>
				</thead>';
		
	if(mysql_num_rows($result) == 0 )
		$texto .= '<tr><td class="cell_special" colspan="6" >Nenhuma compra registrada...</td></tr></table>';

	else{
	
		$compra = 1;
		while($resp = mysql_fetch_array($result)){
			$vt = 0;
			if($compra % 2 == 0)
				$clas = "par";
			else $clas = "impar";
			
			$data = substr($resp[0], 8, 2)."/".substr($resp[0], 5, 2)."/".substr($resp[0], 0, 4);
			$sql = "select count(id_venda) from view_compras_cliente where id_cliente = $cli and data_hora = '$resp[0]'";			
			$q = mysql_query($sql);
			$itens = mysql_fetch_array($q);
			
			$texto .= 
				'<tr class="'.$clas.'"> 
					<td class="data_c" rowspan="'.$itens[0].'"'; 
			if($itens[0] == 0) $texto .= ' colspan="6" >DATA: '.$data.'</td></tr>';
			
			else{
				$texto .= '>DATA: '.$data.'</td>';
				$sql = "select * from view_compras_cliente where id_cliente = $cli and data_hora = '$resp[0]'";			
				$q = mysql_query($sql);
				$lista = 1;
				while($r = mysql_fetch_array($q)){
					if($lista % 2 != 0) $clas = "par1";
					else $clas = "impar1";
	
					if($lista > 1) $texto .= '<tr class="'.$clas.'" >';
					
					$valor = $r[0];
					$sub = $r[0]*$r[1];
					$texto .=
								'<td class="cell_texto" >'.$r['categoria'].' '.
														$r['descricao'].'</td>'.
								'<td class="cell_texto">'.$r[1].'</td>
								 <td class="cell_texto">'.$r[6].' '.$r[5].'</td>
	                             <td class="cell_valores" >	R$ '.
									number_format($valor,2, ', ','.').'</td>                                        
								 <td class="cell_valores" > R$ '.
									number_format($sub,2, ', ','.').'</td>
						</tr>';
					$vt += $sub;
					$lista++;
				}
				$texto .= '<tr><td class="cell_special" colspan="6">Total..: R$ '.
							number_format($vt,2, ', ','.').'</td></tr>';
			} 
		
		$compra++;
		}//fim while
		$texto .= "</table>";
	}
	return $texto;
}

/*********************BUSCAR ENEDEREÇOS CLIENTE***************************/
function enderecosCliente($cli){
	$sql = "select * from view_enderecos_cliente where id_cliente = $cli";
		echo '<link href="css/tabela.css" rel="stylesheet" type="text/css">';
	$result = mysql_query($sql);
		$texto="";		
	if(mysql_num_rows($result) == 0 )
		$texto .= 'Nenhum Endereço cadastrado
		<form action="index.php?func=novo_end" method="post">
				<input type="submit" value="Novo Endereço" />
			</form>
			<a href="index.php?func=perfil">Voltar</a>';

	else{
	$texto .= '<h1>Endereços</h1>
		<table id="tabela_geral" >
				<thead id="thead_titulos" >
							<td class="cell_texto">Controle</td>
							<td class="cell_texto">CEP</td>
							<td class="cell_texto">Endereço</td>
							<td class="cell_texto">Núm</td>
							<td class="cell_texto">Bairro</td>
							<td class="cell_texto">Cidade</td>
							<td class="cell_texto">UF</td>
				</thead>';

		$lista = 1;
		while($r = mysql_fetch_array($result)){
			
			if($lista % 2 != 0) $clas = "par1";
			else $clas = "impar1";
	
			$texto .= '<tr class="'.$clas.'" >
							<td class="cell_texto"><form action="index.php?func=end" method="post">
								<input type="hidden" name="end" value="'.$r['id_endereco'].'" />
								<input type="submit" value="Atualizar">
								</form>
								<form action="php/delEndereco.php" method="post">
								<input type="hidden" name="end" value="'.$r['id_endereco'].'" />
								<input type="submit" value="Remover">
								</form></td>
							<td class="cell_texto" >'.$r['cep'].'</td>'.'
							<td class="cell_texto">'.$r['endereco'].'</td>
							 <td class="cell_texto">'.$r['numero'].'</td>
	                         <td class="cell_texto" >'.$r['bairro'].'</td>                                        
							 <td class="cell_texto" > '.$r['cidade'].'</td>
							 <td class="cell_texto" > '.$r['uf'].'</td>
						</tr>';
						
			$lista++;
		}
		$texto .= '</table>
			<form action="index.php?func=novo_end" method="post">
				<input type="submit" value="Novo Endereço" />
			</form>
			<a href="index.php?func=perfil">Voltar</a>';
	}
	return $texto;
}
/*********************BUSCAR CONTATOS CLIENTE***************************/
function contatosCliente($cli){
	$sql = "select * from view_contato_operadora where id_cliente = $cli";
		echo '<link href="css/tabela.css" rel="stylesheet" type="text/css">';
	$result = mysql_query($sql);
		$texto="";		
	if(mysql_num_rows($result) == 0 )
		$texto .= "Nenhum Contato cadastrado.";

	else{
	$texto .= '<h1>Contatos</h1>
		<table id="tabela_geral" >
				<thead id="thead_titulos" >
							<td class="cell_texto">Controle</td>
							<td class="cell_texto">Número</td>
							<td class="cell_texto">Operadora</td>
				</thead>';

		$lista = 1;
		while($r = mysql_fetch_array($result)){
			
			if($lista % 2 != 0) $clas = "par1";
			else $clas = "impar1";
	
			$texto .= '<tr class="'.$clas.'" >
							<td class="descricao_pc">
								<form action="index.php?func=cli_cont" method="post">
									<input type="hidden" name="contato" value="'.$r['id_contato'].'" />
									<input type="submit" value="Atualizar">
								</form>
								<form action="php/delContato.php" method="post">
									<input type="hidden" name="contato" value="'.$r['id_contato'].'" />
									<input type="submit" value="Remover">
								</form>
							</td>
							<td class="cell_texto" >'.$r['numero'].'</td>'.'
							<td class="cell_texto">'.$r['nome'].'</td>
						</tr>';
						
			$lista++;
		}
		$texto .= '</table>
			<form action="index.php?func=novo_cont" method="post">
				<input type="submit" value="Novo Contato" />
			</form>
			<a href="index.php?func=perfil">Voltar</a>';
	}
	return $texto;
}

function ComboBoxCategorias(){
	$texto = "";
	$result = mysql_query("select id_categoria, nome from categorias order by nome");
	
	if(mysql_num_rows($result)>0){
		$texto = "<select name=\"categoria\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<option value=\"".$r[0]."\" >".$r[1]."</option>";
		}	
		$texto .= "</select>";
	}
	else $texto = "Nenhuma Categoria Cadastrada";
	return $texto;
}
function ComboBoxOperadoras($nome){
	$texto = "";
	$result = mysql_query("select * from operadora order by nome ");
	if(mysql_num_rows($result)>0){
		$texto = '<select name="'.$nome.'" id="cb_operadora">';
		while($r = mysql_fetch_array($result)){
			$texto .= '<option value="'.$r[0].'" >'.$r[1].'</option>';
		}	
		$texto .= '</select><br>';
	}
	else $texto = "Nenhuma operadora cadastrada";
	return $texto;
}
	

function ComboBoxEndereco($idCli){
	$texto = "";
	$result = mysql_query("select * from endereco e inner join clienteenderecos ".
                "ce on e.id_endereco = ce.id_endereco where ce.id_cliente = $idCli");
	
	if(mysql_num_rows($result)>0){
		$texto = "<select name=\"end_cliente\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<option value=\"".$r[0]."\" >".$r[1]." | ".$r[2]." | ".$r[4]." | ".$r[5]." | ".$r[6]."</option>";
		}	
		$texto .= "</select><br>";
	}
	else if($idCli == 0) $texto = "Faça o Login...<br>";
	else $texto = "Nenhum endereço Cadastrado";
	return $texto;
}

function ComboBoxFormas(){
	$texto = "";
	$result = mysql_query("select * from formapagamento");
	
	if(mysql_num_rows($result)>0){
		$texto = "<select name=\"forma_pag\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<option value=\"".$r[0]."\" >".$r[1]."</option>";
		}	
		$texto .= "</select>";
	}
	else $texto = "Nenhuma Forma Cadastrada";
	return $texto;
}

function ComboBoxPerguntas(){
	$texto = "";
	$result = mysql_query("select id, pergunta from perguntasecreta order by pergunta");
	
	if(mysql_num_rows($result)>0){
		$texto = "<select name=\"pergunta\">";
		
		while($r = mysql_fetch_array($result)){
			$texto .= "<option value=\"".$r[0]."\" >".$r[1]."</option>";
		}	
		$texto .= "</select>";
	}
	else $texto = "Nenhuma Pergunta Cadastrada";
	return $texto;
}

function Carrinho()
{
	echo '<link href="css/tabela.css" rel="stylesheet" type="text/css">';
	$texto = '<table id="tabela_geral">
					<thead id="thead_titulos">
						<td class="cell_texto">Controle</td>
						<td class="cell_texto">Produto</td>
						<td class="cell_texto">Quantidade</td>
						<td class="cell_texto">Preço</td>
						<td class="cell_texto">Subtotal</td>
					</thead>
					';
	if(count($_SESSION['carrinho']) == 0){
		$texto .= '<tr><td colspan=5 class="cell_special">Carrinho Vazio...</td><tr>';
	}else{
		
		$num = 1;
		$total = 0;
		foreach($_SESSION['carrinho'] as $id =>$qtd){
			$sql   = "SELECT * FROM view_produto_detalhes WHERE cod = $id";
			$qr    = mysql_query($sql) or die (mysql_error());
			$ln    = mysql_fetch_assoc($qr);
			$nome  = $ln['categoria']." ".$ln['marca']." ".$ln['descricao'];
			if($ln['id_promocao'] > 0)
				$preco = $ln['preco_venda']-($ln['preco_venda']*($ln['desconto']/100));
			else $preco = $ln['preco_venda'];

			$sub   = $preco * $qtd;
			$total += $sub;
			$row = "";
			if($num % 2 == 0) $row = "par"; else $row = "impar";
								
			$texto .= '
				<tr class="'.$row.'">
					<td class="cell_textos">
						<ul>';
						if($ln['estoque'] > $qtd)
							$texto .= '<li><a href="carrinho.php?acao=up&id='.$id.'" ><b>+</b></a></li>';
						else	$texto .= '<li><b>+</b></li>';
						
						$texto .=
							'<li><a href="carrinho.php?acao=down&id='.$id.'" ><b>-</b><a></li>
			 				<li><a href="?acao=del&id='.$id.'">Remover<a/></li>
							</ul>
					</td>
					<td class="cell_texto">'.$nome.'</td>
					<td class="cell_texto">'.$qtd.'</td>
					<td class="cell_valores">R$ '.number_format($preco,2,',','.').'</td>
					<td class="cell_valores">R$ '.number_format($sub,2,',','.').'</td>
					
				</tr>';
			
			$num++;
		}
		$total = number_format($total,2,',','.');
		$texto .= '
			<tr class="cell_special"><td colspan="5">Total R$ '.$total.'</td> </tr>';
	}
	$texto .= "</table>";				
	return $texto;
}


function PegaProduto($prod){
		$texto="";
	
	
		   //  		0		1		2		3		4		5		6		7			8		9			10				11
	$sql = "select cod, categoria, tamanho, cor, genero, imagem, marca, preco_venda, descricao, id_marca, id_categoria, estoque, ".
			"nome, desconto, vigente, id_promocao from view_produto_detalhes where cod = $prod and estoque > 0 ";
		/*		12	13	 		14		15*/
	$result = mysql_query($sql);
	$resp = mysql_fetch_array($result);
	$num = mysql_num_rows($result);


	if($num == 0 ){
		$texto = "Nenhum Produto Encontrado!";
	}else{
		if($resp[15] > 0 && $resp[14] == 1)
			$texto .= "<h2>Promoção <a href=\"index.php?promo=".$resp[15]."\">".$resp[12]."</a></h2>";
			$descprod = $resp[1]." ".$resp[6]." ".$resp[8];
		$texto .= "<div id=\"prod_desc\" ><h3>".$descprod."</h3>".
			"<div id=\"produto_twitter\" >".
				"<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-lang=\"pt\">Surf Store </a>".
				"<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];".
				"if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";".
				"fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>".
			"</div>". 
			"<div id=\"prod_imagem\">".
				"<img src=\"admin\anexo\/".$resp[5]."\" ".
				" title=\"".$resp[1]."\" height=\"400px\" width=\"400px\" />".
			"</div>";
			if($resp[13] > 0)
				$texto .= "<div id=\"prod_preco\">".
							"De <strike>R$ ".number_format($resp[7],2, ',','.')."</strike>".
						  	"<br>Por R$ ".number_format($resp[7]-($resp[7]*($resp[13]/100)),2, ',','.')."</strike>".
						  "</div>";
			else $texto .= "<div id=\"prod_preco\">".
							"R$ ".number_format($resp[7],2, ',','.')."</div>";
        
		// FOTOS
		$fotos = mysql_query("select * from fotosproduto where Produto_cod = $prod");
		$texto .= '<div id="fotos_produto"><a class="imagem" rel="shadowbox[fotos]" title="'.$descprod.'" href="admin/anexo/'.$resp[5].'">
			<img src="/admin/anexo/'.$resp[5].'" width="100px" /></a>';
		
	 	while($r = mysql_fetch_array($fotos)){
			// Add images to the array
			$texto .= '<a rel="shadowbox[fotos]" title="'.$descprod.'"
						href="admin/anexo/'.$r[1].'" class="imagem"><img class="border" 
						src="admin/anexo/'.$r[1].'" title="clique aqui" height="100" width="100\"></a>';
	 	}

		$texto .= "</div>";
		/*		*/
       	$texto .=  $resp[2]." ".$resp[3].
	    		"<form method=\"post\" action=\"carrinho.php?acao=add\" >".
                            "<input type=\"hidden\" name=\"id\" value=\"".$resp[0]."\" >".
                            "<input type=\"submit\" value=\"Comprar\" >".
	             "</form>".
	              	 "<iframe src=\"https://www.facebook.com/plugins/like.php?href=127.0.0.1:90/index.php?func=produto&prod=$prod\"".
			        	"scrolling=\"no\" frameborder=\"1\"".
			        	"style=\"border:none; width:450px; height:80px\"></iframe>". 
		"</div>";	
	}
return $texto;
}

function Buscar($busca, $pos){
	$texto = "<h1>Resultados da Busca por $busca</h1><div id=\"res_busca\">";
	$valor = 0;
	
			   //  		0		1		2		3		4		5		6		7			8
	$sql = "select cod, categoria, tamanho, cor, genero, imagem, marca, preco_venda, descricao, ".
//		9	10			11
	" nome, desconto, vigente from view_produto_detalhes where estoque > 0  and ".
	" marca like '%$busca%' or categoria like '%$busca%' or descricao like '%$busca%' ".
		" or nome like '%$busca%' limit $pos, 8";

	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		$texto .= "<h2>Produtos</h2>";	
		$texto .= "<div id=\"prods_tabela\" >".prodNavBusca($busca);
		while($resp = mysql_fetch_array($result)){
			$texto .= "<div class=\"produto\">".
				"<div class=\"imagem\">".
					"<img src=\"admin/anexo/".$resp[5]."\" ".
					"title=\"".$resp[1]."\"  height=\"190px\" width=\"190px\" />".
				"</div>".
				"<div class=\"desc_prod\">".
					$resp[1]." ".$resp[6]." ".$resp[8].
				"</div>";
				$promo = "";
				
			if($resp[10] > 0){
                  $texto .= "<div class=\"preco_pc\">".
								"De <strike>R$ ".number_format($resp[7],2, ', ','.')."</strike>".
	              				"<br>Por ".number_format($resp[7]-($resp[7]*($resp[10]/100)),2, ', ','.').
                            "</div>";
            }else {
                 $texto .= "<div class=\"preco_pc\">".
								"R$ ".number_format($resp[7],2, ', ','.').
							"</div>";
			}                     
          		 
          	$texto .= "<div class=\"pag_produto\"><a href=\"index.php?func=produto&prod=".$resp[0].
          		 					"\" >Detalhes</a></div>".
           "</div>"; // FECHA PRODUTO
		}
		$texto .= "</div>"; // FECHA TABELA PRODUTOS
		

			
					
		
		$valor =1;
	}
	

	
	$result = mysql_query("select id_marca, nome from marca where nome like '%$busca%'");
	if(mysql_num_rows($result) > 0){
		$texto .= "<h2>Marcas</h2><ul type=\"none\">";	
		while($r = mysql_fetch_array($result)){
			$texto .= "<br><li><a href=\"index.php?marca=".$r[0]."\">".$r[1]."</a></li>";
		}
		$texto .= "</ul>";
		$valor = 1;
	}
	
	$result = mysql_query("select id_categoria, nome from categorias where nome like '%$busca%'");
	if(mysql_num_rows($result) > 0){
		$texto .= "<h2>Categorias</h2>";
		$texto .= "<ul>";	
		while($r = mysql_fetch_array($result)){
			$texto .= "<br><li><a href=\"index.php?cat=".$r[0]."\">".$r[1]."</a></li>";
		}
		$texto .= "</ul>";
		$valor = 1;
	}


	$result = mysql_query("select id_promocao, nome from promocao where nome like '%$busca%' and vigente = 1");
	if(mysql_num_rows($result) > 0){
		$texto .= "<h2>Promoções</h2>";
		$texto .= "<ul>";	
		while($r = mysql_fetch_array($result)){
			$texto .= "<br><li><a href=\"index.php?promo=".$r[0]."\">".$r[1]."</a></li>";
		}
		$texto .= "</ul>";
		$valor = 1;		
	}
	if($valor == 0) $texto .= "nenhum valor parecido encontrado...";
	$texto .= "</div>";
	
	return $texto;
}

function prodNavBusca($busca){ // VALORES PARA BUSCA
	$texto = "<div class=\"prod_nav\" >";
		
	$result = mysql_query("select count(cod) from view_produto_detalhes where estoque > 0 ".
		" and marca like '%$busca%' or categoria like '%$busca%' or descricao like '%$busca%' or nome like '%$busca%'");
						
	$num = mysql_fetch_array($result);
	$n = 1; 
	$texto .= "<ul>";
		
	for($aux = 0; $aux < $num[0]; $aux += 8){ 
		$texto .= "<li><a href=\"index.php?func=busca&pos=$aux&busca=$busca\" >$n</a></li>";
		$n++;
	}
	$texto .= "</ul></div>";
		
	return $texto;
}



?>
