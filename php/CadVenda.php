<?php
    include "conexao.php";
    include "verificarAcesso.php";   
    $forma = $_POST['forma_pag'];
    $end = $_POST['end_cliente'];
    $cli = $_SESSION['id'];
    $data = date("Y/m/d H:i:s");
	
    if(count($_SESSION['carrinho']) > 0 && $_SESSION['id'] > 0){
		$con = AbrirCon();		
        mysql_query("insert into venda values(null, \"$data\", $cli, $forma, $end, 1)");
        
        $result = mysql_query("select max(id_venda) from venda");
        $idVenda = mysql_fetch_array($result);

        if($result){
            foreach($_SESSION['carrinho'] as $cod => $qtd){
                $sql = "SELECT preco_venda FROM produto WHERE cod = $cod";
                $qr    = mysql_query($sql) or die (mysql_error());
                $precoV    = mysql_fetch_array($qr);
								
                $sql = "UPDATE produto SET estoque = (estoque - $qtd) WHERE cod = $cod";
                mysql_query($sql);
                
                $sql = "insert into itensvenda values(null, ".$idVenda[0].", ".$precoV[0].", $qtd, $cod)";
                mysql_query($sql);
            }
            $_SESSION['carrinho'] = null;
			FecharCon($con);
            header("location: ../index.php?func=venda_registrada");
        }else{
            FecharCon($con);
            header("location: ../index.php?func=erro");
        }
    }else header("location: ../index.php?func=login");

   
?>