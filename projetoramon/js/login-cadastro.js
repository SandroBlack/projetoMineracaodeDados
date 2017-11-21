$(document).ready(function(){

	$("#login").click(function(){	
	
		var funcao = "login";
		var email = $("#email_login").val();
		var senha = $("#senha_login").val();
		
		/* VALIDAÇÃO FORM LOGIN */
		if(email == "" || senha == ""){
			alert("Favor Preencher Todos os Campos!");
			return false;		
		} else{

		var dadosajax = {funcao, email,	senha}
		
		$.ajax({
				
			type: 'POST',

			url: 'php/funcoes.php',

			data: dadosajax,
			
			dataType : 'html', 

			success: function(sucess)
			{
				if(sucess == "11")
				{
					window.location="menu-usuario.php"; 
				}
				
				else if (sucess == "111")
				{
					window.location="redefinir.php"; 
				}
				
				else if(sucess == "1")
				{
					alert('Conta não Ativada, Favor Verificar o E-mail Informado no Cadastro para Ativar Sua Conta!');
					$("#email_login").val("");
					$("#senha_login").val("");
				}	

				else	
				{
					alert("E-mail ou Senha incorretos");
				}
			},

			error: function(XMLHttpRequest, textStatus, errorThrown) 
			{ 
				alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
			}  		
		});
		}
	});
	
	$("#cadastrar").click(function(){
		
		var funcao = "cadastro";
		var nome = $("#nome_cadastro").val();
		var email = $("#email_cadastro").val();
		var senha = $("#senha_cadastro").val();
		var conf_senha = $("#conf_senha").val();
		//var captcha = $("#captcha_cadastro").val();

		/* VALIDAÇÕES FORM CADASTRO */
		if(nome == "" || email == "" || senha == "" || conf_senha == ""){
			alert("Favor Preencher Todos os Campos!");
			return false;	
		} else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
			alert("Favor Informar um E-mail Válido!");
			return false;
		} else if(senha.length <= 5){
			alert("A Senha Deve Conter no Mínimo 6 Digitos!");
			return false;
		} else if(senha != conf_senha){
			alert("Senhas Divergentes!");
			return false;
		} else{

			var dadosajax =	{funcao, nome, email, senha}
					
			$.ajax({
					
				type: 'POST',

				url: 'php/funcoes.php',

				data: dadosajax,
				
				dataType : 'html', 

				success: function(sucess)
				{					
					if(sucess == "01")
					{
						alert("E-mail ja cadastrado");
					}
					
					else if(sucess == "1")
					{
						alert("Cadastro realizado com sucesso, acesse seu e-mail para ativar sua conta");
						
						$("#nome_cadastro").val("");
						
						$("#email_cadastro").val("");
						
						$("#senha_cadastro").val("");
						
						$("#conf_senha").val("");
					}
					
					else if(sucess == "invalido")
					{
						alert("Necessário preencher todas as informações");
					}		
					else	
					{
						alert("Ocorreu um erro, tente novamente mais tarde");
					}
				},

				error: function(XMLHttpRequest, textStatus, errorThrown) 
				{ 
					alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
				}  		
			});
		}
	});	
});