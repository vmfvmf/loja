<?php
$id = $_GET['id'];

$sql_query = mysql_query("SELECT * FROM cliente WHERE id_cliente = $id") or die(mysql_error());;
$num_rows = mysql_num_rows($sql_query);
while($array = mysql_fetch_array($sql_query)) {
	$id = $array["id_cliente"];
	$nome = $array["nome"];
	$dn = $array["data_nasc"];
	$rg = $array["rg"];
	$cpf = $array["cpf"];
	$sexo = $array["sexo"];
?>
<h2>Nome: <?php echo $nome?></h2>
Data Nascimento: <?php echo $dn?><br />
RG: <?php echo $rg?><br />
CPF: <?php echo $cpf?><br />
Sexo: <?php echo $sexo?><br />
    <input type="button" name="button" id="button" value="Voltar" onclick="window.location='?comp=listarCliente'"/>
<?php } ?>