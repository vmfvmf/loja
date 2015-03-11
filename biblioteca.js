//função que é chamda no onfocus e retorna mensagem na div correspondente ao campo
function informa(Ncampo)
{
var campo=document.getElementById('resposta'+Ncampo);
	//se campo Ncampo = cep retira o hífen
	if(Ncampo == 'nome')
	{
		campo.innerHTML="informe um nome com mínimo 2 caracteres";
	}
	if(Ncampo == 'sobrenome')
	{
		campo.innerHTML="informe um sobrenome com mínimo 4 caracteres";
	}
	if(Ncampo == 'contato1')
	{
		campo.innerHTML="informe somente números. Ex: 1122223333";
	}
	if(Ncampo == 'contato2')
	{
		campo.innerHTML="informe somente números. Ex: 1122223333";
	}
	if(Ncampo == 'endereco')
	{
		campo.innerHTML="informe o endereço.";
	}
	if(Ncampo == 'numero')
	{
		campo.innerHTML="informe somente números.";
	}
	if(Ncampo == 'bairro')
	{
		campo.innerHTML="informe o bairro.";
	}
	if(Ncampo == 'cidade')
	{
		campo.innerHTML="informe somente letras.";
	}
	if(Ncampo == 'senha')
	{
		campo.innerHTML="informe senha, mínimo 6 caracteres";
	}
	if(Ncampo == 'confSenha')
	{
		campo.innerHTML="confirme a senha.";
	}
	if(Ncampo == 'resposta')
	{
		campo.innerHTML="informe sua resposta.";
	}
	
	if(Ncampo == 'uf')
	{
		document.getElementById('respostacep').innerHTML="";
	}
	
	if(Ncampo == 'cep')
	{
		if(document.getElementById('uf').value=="selecione")
		{
			campo.innerHTML="selecione o estado antes de informar o CEP";
			return false;
		}else
		campo.innerHTML="somente números, 8 digitos";
	}
	 //se Ncampo = CPF retira os pontos e hífen
	if(Ncampo == 'cpf')
	{
		campo.innerHTML="somente números, 11 digitos";
	}	
	
	//se Ncampo = reg retira híifen
	if(Ncampo == 'rg')
	{
		campo.innerHTML="somente números e dígito, 9 digitos";
	}
	//se Ncampo = data retira as barras '/'
	if(Ncampo == 'datepicker')
	{
		campo.innerHTML="formato dd/mm/aaaa";
	}
	if(Ncampo == 'email')
	{
		campo.innerHTML="informe o e-mail";
	}
	if(Ncampo == 'confEmail'){
		campo.innerHTML="confirme o e-mail";
		
	}
	
}



//função que restringe caracteres digitados. Números ou letras
function valida_digitos(Ncampo)
{
		 //caracteres permitidos
		 if(Ncampo=="nome")
		 er=/[0-9, !-@]/;
		 if(Ncampo=="sobrenome")
		 er=/[0-9, !-@]/;
		 if(Ncampo=="cep" || Ncampo=="cpf")
		 er=/[a-zA-z]/;
		 if(Ncampo=="rg")
		 er=/[a-wA-W && y-zY-Z]/;
		 if(Ncampo=="contato1")
		 er=/[a-zA-z]/;
		 if(Ncampo=="contato2")
		 er=/[a-zA-z]/;
		 if(Ncampo=="endereco")
		 er=/[!-@]/;
		 if(Ncampo=="complemento")
		 er=/[!-@]/;
		 if(Ncampo=="numero")
		 er=/[a-zA-z]/;
		 if(Ncampo=="bairro")
		 er=/[!-@]/;
		 if(Ncampo=="cidade")
		 er=/[0-9]/;
		 digito=document.getElementById(Ncampo).value;
		 var tempor;
		 
		  for (var i=0;i<digito.length; i++) {
			tempor = digito.substring(i,i+1); 
			//se digitos não igual aos caracteres informado na variavel digitos, então é deletado
			  if (er.test(digito)) {
			  document.getElementById(Ncampo).value=digito.substring(0,digito.length-1);
			 
			 return false;
			  break;
    		}
   		}
 }






//função que retorna o erro na div correspondente ao campo, uando a vlaidação falha
function erro(Ncampo)
{
	//if(Ncampo=="nome")
	//resposta="nome deve ter no minimo 3 caracteres";
	if(Ncampo=="cpf")
	resposta="número de CPF inválido";
	
	/*document.getElementById('resposta'+Ncampo).innerHTML="nome deve ter no minimo 3 caracteres";
	document.getElementById(Ncampo).style.background="red";
	document.getElementById(Ncampo).focus();
	return false;
	}*/
	document.getElementById(Ncampo).style.background="#FF6347";
	//document.getElementById('resposta'+Ncampo).innerHTML="informe " + Ncampo;
	document.getElementById(Ncampo).focus();
	return false;
}
//fnção que formata o campo se a validação estiver ok
function ok(Ncampo)
{
	document.getElementById(Ncampo).style.background="#98EE84";
	document.getElementById('resposta'+Ncampo).innerHTML="";
	return true;
}





//função que é chamda no submit, valida os campos em geral, veificandos se estão vazios e os botões de radio e checkbox
function valida_enviar(){
	
	d=document.getElementById('uf').value;
	//a=document.getElementById(campo);
	b=document.getElementById;
	var conta=0;
	campos=new Array('nome','sobrenome','contato1', 'senha','cep','cpf','rg','datepicker','email', 'assinar', 'endereco', 
		'numero', 'cidade', 'bairro', 'uf', 'resposta');
	for(i=0;i<campos.length;i++)
	{	
		if(campos[i]=='nome')
		{
			if(document.getElementById(campos[i]).value.length < 2)
			{
				document.getElementById('resposta'+campos[i]).innerHTML="informe o "+campos[i];
				conta++;
			}	
		}	
		if(campos[i]=='email')
		{
			var er=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
			if(!er.test(document.getElementById(campos[i]).value))
			{
				//alert("informe o e-mail correto")
				document.getElementById('resposta'+campos[i]).innerHTML="informe o e-mail correto";
//				document.getElementById(campos[i]).style.background="red";
				conta++;
			}
		}
			/*if(!er.test(b))
				{	
					return erro(Ncampo);			
				}		
				//se Ncamp
			
			if(document.getElementById(campos[i]).value.length < 3)
			{
				document.getElementById('resposta'+campos[i]).innerHTML="informe o "+campos[i];
				conta++;
			}	
		}*/
		if(document.getElementById(campos[i]).value=="")
		{
			document.getElementById('resposta'+campos[i]).innerHTML="informe "+campos[i];
			conta++;
		}
			
	}			
	
		//se campo select opção=selecione, não passa e retorna alert
	if(d == "selecione")
	{
			document.getElementById('respostauf').innerHTML="selecione o Estado";
			conta++;
	}
	
	if(document.getElementById('email').value != document.getElementById('confEmail').value){
		document.getElementById('respostaConfEmail').innerHTML = "Digite o mesmo email nos dois campos";
		conta++;
	}
	if(document.getElementById('senha').value != document.getElementById('confSenha').value){
		document.getElementById('respostaconfSenha').innerHTML = "As senhas não conferem";
		conta++;
	}
	if(document.getElementById('aux').value == 0){
		document.getElementById('aux').innerHTML = 'Email já cadastrado, <a href="index.php?func=recuperarSenha">Recuperar Senha</a>';
		erro('email');
		conta++;
	}
	
			if(conta==0){
			document.getElementById('cadastrar').disabled=false;
			return true;
			}
			else{
			alert("Preencha os campos obrigatórios corretamente");
			document.getElementById('confSenha').value="";
			document.getElementById('confEmail').value="";
			document.getElementById('assinar').checked=false;
			return false;
			}
	//return true;
}	
	


//função que limpa a div correspondente a checkbox, radio e select quando não vazios
function limpaID(ID)
{
document.getElementById('resposta'+ID).innerHTML="";
}



//função que valida o cep de acorodo com o estado selecionado, é feito um loop e de acorodo com o indice do estado é verificado
//a expressão regular correspondente ao cep no indice
function valida_cep(Ncampo)
{
	var er;
	var cep = document.getElementById(Ncampo).value;
	var uf=new Array('AM','SP','RJ','MS','MG','MT','AC','AL','AP','CE','DF','ES','GO','MA','PA','PE','PI','PR','RN','RO','RR','RS','SC','SE','TO','BA');
	var ers=new Array(/^[6][9][0-8][0-9]{2}-[0-9]{3}$/,/^([1][0-9]{3}|[01][0-9]{4})-[0-9]{3}$/,/^[2][0-8][0-9]{3}-[0-9]{3}$/,
	/^[2][0-8][0-9]{3}-[0-9]{3}$/,/^[2][0-8][0-9]{3}-[0-9]{3}$/,/^[7][8][8][0-9]{2}-[0-9]{3}$/,/^[6][9]{2}[0-9]{2}-[0-9]{3}$/,
	/^[5][7][0-9]{3}-[0-9]{3}$/,/^[6][89][9][0-9]{2}-[0-9]{3}$/,/^[6][0-3][0-9]{3}-[0-9]{3}$/,/^[7][0-3][0-6][0-9]{2}-[0-9]{3}$/,
	/^[2][9][0-9]{3}-[0-9]{3}$/,/^[7][3-6][7-9][0-9]{2}-[0-9]{3}$/,/^[6][5][0-9]{3}-[0-9]{3}$/,/^[6][6-8][0-8][0-9]{2}-[0-9]{3}$/,
	/^[5][0-6][0-9]{2}-[0-9]{3}$/,/^[6][4][0-9]{3}-[0-9]{3}$/,/^[8][0-7][0-9]{3}-[0-9]{3}$/,/^[5][9][0-9]{3}-[0-9]{3}$/,
	/^[7][8][9][0-9]{2}-[0-9]{3}$/,/^[6][9][3][0-9]{2}-[0-9]{3}$/,/^[9][0-9]{4}-[0-9]{3}$/,/^[8][89][0-9]{3}-[0-9]{3}$/,
	/^[4][9][0-9]{3}-[0-9]{3}$/,/^[7][7][0-9]{3}-[0-9]{3}$/,/^[4][0-8][0-9]{3}-[0-9]{3}$/);
	
		
		//document.getElementById('resposta'+Ncampo).innerHTML="";
			
	/*if(document.getElementById('uf').value=="selecione")
	{
		document.getElementById('resposta'+Ncampo).innerHTML="selecione o estado";
		return false;
	}*/
	if(document.getElementById('uf').value=="selecione" && document.getElementById('cep').value!="")
	{
		document.getElementById(Ncampo).style.background="#FF6347";
		document.getElementById(Ncampo).innerHTML ="selecione o estado antes de informar o CEP";
		return false;
	}
	
	for(i=0;i<uf.length;i++)
	{	
			if(uf[i]==document.getElementById('uf').value)
			{	
				if(cep!="")
				{	
					er=ers[i];
					if(!er.test(cep))
					{	
						return erro(Ncampo);						
					}		
					else
					{	
						return ok(Ncampo);					
					}
				}
				

		 }	document.getElementById(Ncampo).style.background="#FFFFFF";
			document.getElementById('resposta'+Ncampo).innerHTML="";
	}	
}


//valida os campos
function valida_campos(Ncampo)

{   
		//de acorodo com o campo a var er recebe uma expressão regular que vai vlaidar o campo exceto  CPF,CEP e Data que valida atrave da função
		//validar_CPF()		
			if(Ncampo=="senha")
				var er =/^\w{6,}$/;
			if(Ncampo=="rg")
				var er =/^[0-9]{8}-[0-9] || [x]{2}$/;		
			if(Ncampo=="nome")
				var er=/[a-zA-Z]{2,}/;
			if(Ncampo=="sobrenome")
				var er=/[a-zA-Z]{4,}/;
			if(Ncampo=="contato1")
				var er =/^[0-9]{10}$/;
			if(Ncampo=="contato2")
				var er =/^[0-9]{10}$/;
			if(Ncampo=="numero")
				var er =/^[0-9]{1,}$/;
			if(Ncampo=="bairro")
				var er=/[a-zA-Z, 0-9]{1,}/;
			if(Ncampo=="endereco")
				var er=/[a-zA-Z, 0-9]{1,}/;
			if(Ncampo=="complemento")
				var er=/[a-zA-Z, 0-9]{1,}/;
			if(Ncampo=="cidade")
				var er=/[a-zA-Z]{1,}/;
			if(Ncampo=="email")
				var er=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
			if(Ncampo=="resposta")
				var er =/^\w{1,}$/;
				
			 b=document.getElementById(Ncampo).value;
			if(b != "")
			{ 
				if(!er.test(b))
				{	
					return erro(Ncampo);			
				}		
				//se Ncampo passar na ER, então é feita a formatação do campo CEP = xxxxx-xxx
				else
				{	
					return ok(Ncampo);					
				}
			}
			document.getElementById(Ncampo).style.background="#FFFFFF";
	 		document.getElementById('resposta'+Ncampo).innerHTML="";
			
}   





//function que valida, data pelo formato xx/xx/xxxx e verifica se a data existe
function validar_Data(Ncampo){

var er = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
b=document.getElementById(Ncampo).value;
document.getElementById(Ncampo).style.background="#FFFFFF";
document.getElementById('resposta'+Ncampo).innerHTML="";
if(b!=""){
if(er.test(b)){

var dia = b.split("/")[0];
var mes = b.split("/")[1];
var ano = b.split("/")[2];
	
	if(ano < 1900 || ano > 2010)
	{
		//alert("O ano especificado não é valido");
		document.getElementById(Ncampo).style.background="#FF6347";
		document.getElementById('resposta'+Ncampo).innerHTML="O ano especificado não é válido";
		document.getElementById(Ncampo).focus();
		return false;
	}
	
		if((mes==4 || mes==6 || mes==9 || mes==11) && (dia > 30)){
			document.getElementById(Ncampo).style.background="#FF6347";
			//alert("O mês especificado contém no máximo 30 dias");
			document.getElementById('resposta'+Ncampo).innerHTML="O mês especificado contém no máximo 30 dias";
			document.getElementById(Ncampo).focus();
			return false;
		} else
		{
		if(ano%4!=0 && mes==2 && dia>28){
			document.getElementById(Ncampo).style.background="#FF6347";
			//alert("Data incorreta!! O mês especificado contém no máximo 28 dias.");
			document.getElementById('resposta'+Ncampo).innerHTML="Data incorreta!! O mês especificado contém no máximo 28 dias.";
			document.getElementById(Ncampo).focus();
			return false;
		} else{
		if(ano%4==0 && mes==2 && dia>29){
			document.getElementById(Ncampo).style.background="#FF6347";
			//alert("Data incorreta!! O mês especificado contém no máximo 29 dias");
			document.getElementById('resposta'+Ncampo).innerHTML="Data incorreta!! O mês especificado contém no máximo 29 dias";
			document.getElementById(Ncampo).focus();
			return false;
		} else{ 
		//alert ("Data correta!");
		return ok(Ncampo);
		}}}} else {
			document.getElementById(Ncampo).style.background="#FF6347";
			//alert("Formato inválido de data");
			document.getElementById('resposta'+Ncampo).innerHTML="Formato inválido de data";
			document.getElementById(Ncampo).focus();
			return false;
		}
		}
		document.getElementById(Ncampo).style.background="#FFFFFF";
		document.getElementById('resposta'+Ncampo).innerHTML="";
}




//função que valida o cpf
function validar_CPF(Ncampo)   
{   	
		erro = new String;   
  		cpf=document.getElementById(Ncampo);
        if (cpf.value.length == 14)   
   		 {     
				cpf.value = cpf.value.replace('.', '');   
				cpf.value = cpf.value.replace('.', '');   
				cpf.value = cpf.value.replace('-', ''); 
	  
				var nonNumbers = /\D/;   
				
				if (nonNumbers.test(cpf.value))   
				{   
						erro = "A verificacao de CPF suporta apenas números!";   
				}   
				else   
				{   
						if (cpf.value == "00000000000" ||   
								cpf.value == "11111111111" ||   
								cpf.value == "22222222222" ||   
								cpf.value == "33333333333" ||   
								cpf.value == "44444444444" ||   
								cpf.value == "55555555555" ||   
								cpf.value == "66666666666" ||   
								cpf.value == "77777777777" ||   
								cpf.value == "88888888888" ||   
								cpf.value == "99999999999") {   
								   
								erro = "Número de CPF inválido 1!"   
								//document.getElementById(Ncampo).value = cpf.value;
						}   
						
						
						var a = [];   
						var b = new Number;   
						var c = 11;   
	  
						for (i=0; i<11; i++){   
								a[i] = cpf.value.charAt(i);   
								if (i < 9) b += (a[i] * --c);   
						}   
		   
						if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }   
						b = 0;   
						c = 11;   
		   
						for (y=0; y<10; y++) b += (a[y] * c--);   
		   
						if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }   
		   
						if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {   
							erro = "Número de CPF inválido.";  
							//document.getElementById(Ncampo).value = cpf.value; 
						}   
				}   
		}   
		else   
		{   
			if(cpf.value.length == 0)  
			{
				document.getElementById('resposta'+Ncampo).innerHTML="";
				document.getElementById(Ncampo).style.background="#FFFFFF" 
				return false;   
			}
			else   
				erro = "Número de CPF inválido.";   
		}   
		if (erro.length > 0) {   
				alert(erro);   

				if (cpf.value.length == 11)   
				{     
					str = cpf.value;
					str2 = cpf.value.substring(0,3);
					str3 = cpf.value.substring(3,6);
					str4 = cpf.value.substring(6,9);
					str5 = cpf.value.substring(9,12);
					result=str.replace(str,str2+'.');
					result2=str.replace(str,str3+'.');
					result3=str.replace(str,str4+'-');
					document.getElementById(Ncampo).value = result + result2 + result3 + str5;
					document.getElementById(Ncampo).style.background="#FF6347";
					document.getElementById(Ncampo).focus(); 
					return false;   
				}				
			
				document.getElementById(Ncampo).value = cpf.value;
				document.getElementById(Ncampo).style.background="#FF6347";
				document.getElementById(Ncampo).focus(); 
				return false;   
		}     
		document.getElementById(Ncampo).style.background="#98EE84";
		document.getElementById('resposta'+Ncampo).innerHTML="";
		str = cpf.value;
		str2 = cpf.value.substring(0,3);
		str3 = cpf.value.substring(3,6);
		str4 = cpf.value.substring(6,9);
		str5 = cpf.value.substring(9,12);
		result=str.replace(str,str2+'.');
		result2=str.replace(str,str3+'.');
		result3=str.replace(str,str4+'-');
		document.getElementById(Ncampo).value = result + result2 + result3 + str5;
		return true;       
}   




//função que formata os campos - auto completa os campos cep,cpf,rg e data
function formata(Ncampo)
{
	var campo=document.getElementById(Ncampo).value;
	var str;
	var str2;
	var str3;

	if(Ncampo=='cep')
	{	
		if(campo.length==5)
		{	
			var str = campo.substring(0,5);
			document.getElementById(Ncampo).value = str+"-";
		}
	}
	if(Ncampo=='rg')
	{	
		if(document.getElementById(Ncampo).value.length==8)
		{	
			var str = document.getElementById(Ncampo).value.substring(0,8);
			document.getElementById(Ncampo).value = str+"-";
		}
	}
	
	if(Ncampo=='datepicker')
	{	
		if(document.getElementById(Ncampo).value.length==2)
		{	
			var str = document.getElementById(Ncampo).value.substring(0,2);
			pt1=document.getElementById(Ncampo).value = str+"/";
		}
		if(document.getElementById(Ncampo).value.length==5)
		{	
			var str2 = document.getElementById(Ncampo).value.substring(3,5);
			pt2=document.getElementById(Ncampo).value = pt1+str2+"/";
		}
	}
	
	if(Ncampo=="cpf")
	{
		if(document.getElementById(Ncampo).value.length==3)
			{
				
				valor=document.getElementById(Ncampo).value;
				str = document.getElementById(Ncampo).value.substring(0,3);
				result=valor.replace(valor,str+'.');
				document.getElementById(Ncampo).value = result;
			}
		if(document.getElementById(Ncampo).value.length==7)
			{
				valor1=document.getElementById(Ncampo).value;
				str2 = document.getElementById(Ncampo).value.substring(4,8);
				result2=valor1.replace(valor1,str2+'.');
				document.getElementById(Ncampo).value = result + result2;
			}
		if(document.getElementById(Ncampo).value.length==11)
			{
				valor2=document.getElementById(Ncampo).value;
				str3 = document.getElementById(Ncampo).value.substring(8,11);

				result3=document.getElementById(Ncampo).value = result + result2 + str3 + "-";
			}
		if(document.getElementById(Ncampo).value.length==15)
			{
				valor3=document.getElementById(Ncampo).value;
				str3 = document.getElementById(Ncampo).value.substring(12,15);
				result4=valor3.replace(valor3,str3);
				document.getElementById(Ncampo).value = result + result2 + result3 + result4;
			}
					
	}
	
}


function ConferiEmails(email, conferi){
	if(email == conferi){
		document.getElementById('respostaconfEmail').innerHTML="";
		ok('confEmail');
		}else{
		document.getElementById('respostaconfEmail').innerHTML="Digite o mesmo email";
		erro('confEmail');
		}
}

function ConferiSenhas(senha, conferi){
	if(senha == conferi){
		document.getElementById('respostaconfSenha').innerHTML="";
		ok('confSenha');
		}else{
		document.getElementById('respostaconfSenha').innerHTML="Digite a mesmo senha";
		erro('confSenha');
		}
}
function checkEmail(str){
	document.getElementById('erroemail').innerHTML = 'Verificando Email <img src="../img/loading.gif" height="20px"/>';
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			  		var resp = xmlhttp.responseText;
			  		document.getElementById('aux').value = resp;
			  		if(resp == 1){
			  			document.getElementById('erroemail').innerHTML = "";
			  			ok('email');
			  		}
			  		else if(resp == 0){
			  				document.getElementById('erroemail').innerHTML = "Email já cadastrado";
			  				erro('email');
			  		}else{
			  			document.getElementById('erroemail').innerHTML = "Não foi possivel consultar o servidor";
			  				erro('email');
			  		} 
			  }
			  else
			  	document.getElementById('aux').value = "";
		}
		xmlhttp.open("GET","ajax/check_mail.php?q="+str,true);
		xmlhttp.send();
}
	