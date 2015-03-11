<?php
include "conexao.php";

$id = $_POST['cod'];
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
$e = $_FILES['file']['name'];
if($e == Null)
{
mysql_query("UPDATE produto SET id_marca = '$marca', id_categoria = '$categoria', id_cor = '$cor', id_tamanho = '$tamanho', estoque = '$estoque', preco_compra = '$preco_compra', genero = '$genero', infantil = '$infantil', preco_venda = '$preco_venda', desconto = '$desconto', descricao = '$descricao' WHERE cod = '$id'") or (die);
echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Home</a>";		
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
$sql = mysql_query("UPDATE produto SET id_marca = '$marca', id_categoria = '$categoria', id_cor = '$cor', id_tamanho = '$tamanho', estoque = '$estoque', preco_compra = '$preco_compra', genero = '$genero', infantil = '$infantil', preco_venda = '$preco_venda', desconto = '$desconto', imagem = '$nomeAleatorio', descricao = '$descricao' WHERE cod = '$id'");
			if($sql){
			echo "Alterado com sucesso!<br/>"."<a href=\"?comp=listarProduto\">Voltar</a>";
			}else{
			echo "Erro durante o cadastro: ".mysql_error();
			}			
}
?>