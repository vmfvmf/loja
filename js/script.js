function PopulaContato(a){
	var id_cont = a.split(';')[0];
	var num = a.split(';')[1];
	var id_op = a.split(';')[2];
	document.getElementById('numContato').value = num;
	var Combo = document.getElementById('cb_operadora');
	for(var i = 0; i <= Combo.length; i++){
		if(Combo.options[i].value == id_op){
			 Combo.options[i].selected = 'true';
			 break;
		}
	}
}

function PopulaEnd(a){
	var id_end = a.split(';')[0];
	var end = a.split(';')[1];
	var num = a.split(';')[2];
	var comp = a.split(';')[3];
	var bairro = a.split(';')[4];
	var cidade = a.split(';')[5];
	var uf = a.split(';')[6];
	var cep = a.split(';')[7];
	var desc = a.split(';')[8];
	document.getElementById('numero').value = num;
	document.getElementById('cep').value = cep;
	document.getElementById('endereco').value = end;
	document.getElementById('complemento').value = comp;
	document.getElementById('bairro').value = bairro;
	document.getElementById('cidade').value = cidade;
	var Combo = document.getElementById('uf');
	for(var i = 0; i <= Combo.length; i++){
		if(Combo.options[i].value == uf){
			 Combo.options[i].selected = 'true';
			 break;
		}
	}		
	
}
function ConsultaEmail(email){
	if (email==""){
		 document.getElementById("txtHint").innerHTML="";
		 return;
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		  		var resp = xmlhttp.responseText;
			    document.getElementById("txtHint").innerHTML=resp.split(";")[0];
			    document.getElementById("id_email").value=resp.split(";")[1];
			    document.getElementById("resposta").unselectable=off;
			    document.getElementById("btSenha").unselectable=off;
		  }
	}
	xmlhttp.open("GET","ajax/pegaPergunta.php?q="+email,true);
	xmlhttp.send();
	
}
function ConsultaResposta(Email, Conta, Resposta){
	if (Conta=="" || Resposta=="" || Email == ""){
		 document.getElementById("txtHint").innerHTML="";
		 return;
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			    document.getElementById("txtHint").innerHTML="Senha: "+xmlhttp.responseText;
		  }
	}
	xmlhttp.open("GET","ajax/pegaResposta.php?conta="+Conta+"&resp="+Resposta+"&email="+Email,true);
	xmlhttp.send();
}
