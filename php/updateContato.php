<?php
/* AUTOR VMF */
include "conexao.php";
$con = AbrirCon();
$idCont = $_POST['id_cont'];
$operadora = $_POST['operadora'];
$num = $_POST['numero'];


        //ENDEREÇO
$sit = mysql_query("update contato set numero = '$num', id_operadora = '$operadora' ".
	"where id_contato = $idCont");
if($sit){
	FecharCon($con);
	header("location: ../index.php?func=contatos");
    
}else{
	FecharCon($con);
    header("location: ../index.php?func=erro");
}
?>