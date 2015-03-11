<?php
include "conexao.php";

$marca = $_POST['marca'];
$categoria = $_POST['categoria'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];
$estoque = $_POST['estoque'];
$preco_compra = $_POST['preco_compra'];
$genero = $_POST['genero'];
$infantil = $_POST['infantil'];
$preco_venda = $_POST['preco_venda'];
$desconto = $_POST['desconto'];
$descricao = $_POST['descricao'];
$semimagem = "semimagem.jpg";

$e = $_FILES['file']['name'];
if($e == Null)
{
$sql = mysql_query("insert into produto values (null, '$marca', '$categoria', '$cor', '$tamanho', '$estoque', '$preco_compra', '$genero', '$infantil', '$preco_venda', '$desconto', '$semimagem', '$descricao')");
if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarProdutos\">Home</a>";
	}else
    	echo "Erro durante o cadastros: ".mysql_error();	
}else{		
// Flag que indica se há erro ou não
$erro = null;
// Quando enviado o formulário
if (isset($_FILES['file']))
{
    $caminho = "anexo/";
    // Recuperando informações do arquivo
    $nome = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
        // Movendo arquivo para servidor
        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)){
            $erro = 'Não foi possível anexar o arquivo';
    }
}
$sql = mysql_query("insert into produto values (null, '$marca', '$categoria', '$cor', '$tamanho', '$estoque', '$preco_compra', '$genero', '$infantil', '$preco_venda', '$desconto', '$nomeAleatorio', '$descricao')");
if($sql){
		echo "Cadastro realizado com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Voltar</a>";
	}else
    	echo "Erro durante o cadastros: ".mysql_error();
}
?>