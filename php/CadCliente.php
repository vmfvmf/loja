<?php
/* AUTOR VMF */
include "conexao.php";
$con = AbrirCon();
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];

$rg = $_POST['rg'];
$rg_a = explode("-",$rg);
$rg = $rg_a[0].$rg_a[1];

$cpf = $_POST['cpf'];
$cpf_a = explode(".",$cpf);
$cpf = $cpf_a[0].$cpf_a[1].$cpf_a[2];
$cpf_a = explode("-",$cpf);
$cpf = $cpf_a[0].$cpf_a[1];

$data = $_POST['datepicker'];
$data_a = explode("/", $data);
$data = $data_a[2].$data_a[1].$data_a[0];

$sexo = $_POST['sexo'];
$tel = $_POST['contato1'];
$cel = $_POST['contato2'];
$operadora1 = $_POST['operadora1'];
$operadora2 = $_POST['operadora2'];
$cep = $_POST['cep'];
$cep_a = explode("-",$cep);
$cep = $cep_a[0].$cep_a[1];


$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$email = $_POST['email'];
$senha = $_POST['senha'];
$pergunta = $_POST['pergunta'];
$resposta = $_POST['resposta'];

/*
echo "insert into cliente values(null, '$nome', '$sobrenome', '$data', '$rg', '$cpf',  '$sexo', 0, 0)";
echo "insert into endereco values(null, '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep', 'Principal')";
echo "insert into contato values(null, '$tel', $operadora1)";
echo "insert into contato values(null, '$cel', $operadora2)";
echo "insert into login values(idcli, '$email', '$senha', $pergunta, '$resposta')";
*/
$situacao = mysql_query("insert into cliente values(null, '$nome', '$sobrenome', '$data', '$rg', '$cpf',  '$sexo', 0, 0)");
if($situacao){
	$resp=mysql_query("select max(id_cliente) from cliente");
	$idCli=mysql_fetch_array($resp);
	$situ = mysql_query("insert into login values(".$idCli[0].", '$email', '$senha', '$resposta', $pergunta)");	
	if($situ){
        //ENDEREÇO
        $sit = mysql_query("insert into endereco values(null, '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep', 'Principal')");
        if($sit){
                $resp=mysql_query("select max(id_endereco) from endereco");
                $idEnd=mysql_fetch_array($resp);
                $situacao = mysql_query("insert into clienteenderecos values(".$idCli[0].", ".$idEnd[0].")");
                 if(!$situacao)
                      mysql_query("delete from endereco where id_endereco = ".$idEnd[0]);
        }        
        //TELEFONE
        $sit = mysql_query("insert into contato values(null, '$tel', $operadora1)");
        if($sit){
                $resp=mysql_query("select max(id_contato) from contato");
                $idTel=mysql_fetch_array($resp);
                $situacao = mysql_query("insert into clientecontatos values(".$idTel[0].", ".$idCli[0].")");
                if(!$situacao)
                    mysql_query("delete from contato where id_contato = ".$idTel[0]);
        }
        
        // CELULAR
        $sit = mysql_query("insert into contato values(null, '$cel', $operadora2)");
        if($sit){
                $resp=mysql_query("select max(id_contato) from contato");
                $idCel=mysql_fetch_array($resp);
                $situacao = mysql_query("insert into clientecontatos values(".$idCel[0].", ".$idCli[0].")");
                if(!$situacao)
                    mysql_query("delete from contato where id_contato = ".$idCel[0]);
        }
		FecharCon($con);
        header("location: ../index.php");
    }else{
    	mysql_query("delete from cliente where id_cliente = ".$idCli[0]);
		FecharCon($con);
        header("location: ../index.php?func=erro");

    }

}else{
	FecharCon($con);
    header("location: ../index.php?func=erro");
}
?>