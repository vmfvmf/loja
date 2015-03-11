<?php
	include "conexao.php";

$id_endereco = $_POST['id_endereco'];

$sql_query = mysql_query("select * from endereco WHERE id_endereco = '$id_endereco'") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {

	$endereco = $array["endereco"];
	$numero = $array["numero"];
	$complemento = $array["complemento"];
	$bairro = $array["bairro"];
	$cidade = $array["cidade"];
	$uf = $array["uf"];
	$cep = $array["cep"];
?>

<b>Endereço:</b> <?php echo $endereco; ?><br>
<b>Número:</b> <?php echo $numero; ?><br>
<b>Complemento:</b> <?php echo $complemento; ?><br>
<b>Bairro:</b> <?php echo $bairro; ?><br>
<b>Cidade:</b> <?php echo $cidade; ?> / <b>UF:</b> <?php echo $uf; ?><br>
<b>CEP:</b> <?php echo $cep; ?><br>
<input type="button" name="button" id="button" value="Voltar" onclick="window.location='?comp=listarCliente'"  />
<?php }; ?>

