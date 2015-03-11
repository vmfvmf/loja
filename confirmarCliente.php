<html>
	<head>
		<title>Confirmação de Cadastro</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	<form method="post" action="CadCliente.php">
	
<?php

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$data = $_POST['ano']."/".$_POST['mes']."/".$_POST['dia'];
$sexo = $_POST['sexo'];
$civil = $_POST['estado_civil'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$cel = $_POST['celular'];

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];

$login = $_POST['login'];
$senha = $_POST['senha'];

echo("<b><u>Dados Pessoais</u></b><br/>
<b>Nome</b>: $nome, <br/><b>RG</b>: $rg, <br/><b>CPF</b>: $cpf, <br/><b>Data</b>: $data");
echo("<br/><b>Sexo</b>:");
if($sexo=='m') echo(" Masculino"); else echo(" Feminino");
echo("<br/><b>Estado civil</b>: $civil, <br/><b>E-mail</b>: $email, <br/><b>Telefone</b>: $tel, <br/><b>Celular</b>: $cel, <br/><br/><b><u>Endereço</u>
</b><br/><b>Rua</b>: $rua, <br/><b>Numero</b>: $numero, <br/><b>Complemento</b>: $complemento, <br/><b>Bairro</b>: $bairro, <br/><b>Cidade</b>: $cidade, <br/><b>CEP</b>: $cep, <br/><b>UF</b>: $uf, <br/><br/><b><u>Conta</u></b>
<br/><b>Login</b>: $login");
?>
<br/><br/>
<input type="submit" value="Confirmar">
<input type="reset" value="Cancelar">

</form>
</body>
</html>