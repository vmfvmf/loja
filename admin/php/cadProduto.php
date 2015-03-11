<?php
include "conexao.php";

$marca = $_POST['marca'];
$categoria = $_POST['categoria'];
$cor = $_POST['cor'];
$promo = $_POST['promo']; 
$tamanho = $_POST['tamanho'];
$estoque = $_POST['estoque'];
$preco_compra = $_POST['preco_compra'];
$genero = $_POST['genero'];
$infantil = $_POST['infantil'];
$preco_venda = $_POST['preco_venda'];
$descricao = $_POST['descricao'];
$semimagem = "semimagem.jpg";

$e = $_FILES['file']['name'];
if($e == Null)
{
$q = "insert into produto values (null, '$marca', '$categoria', '$cor', ";
 if($promo > 0)
 $q .= "'$promo', '$tamanho', '$estoque', '$preco_compra', '$genero', '$infantil', '$preco_venda', '$semimagem', '$descricao')";
 else $q .= "null, '$tamanho', '$estoque', '$preco_compra', '$genero', '$infantil', '$preco_venda', '$semimagem', '$descricao')";
 
 $sql = mysql_query($q); 
if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Voltar</a>";
	}else
    	echo "Erro durante o cadastro: ".mysql_error();	
}else{		

$erro = null;
if (isset($_FILES['file']))
{   
	$caminho = "anexo/";
    $nome = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)){
            $erro = 'Não foi possível anexar o arquivo';
    }
}
$sql = mysql_query("insert into produto values (null, '$marca', '$categoria', '$cor', '$promo', '$tamanho', '$estoque', '$preco_compra', '$genero', '$infantil', '$preco_venda', '$nomeAleatorio', '$descricao')");
if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Voltar</a>";
	}else
    	echo "Erro durante o cadastro: ".mysql_error();
}
?>