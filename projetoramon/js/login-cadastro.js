$(document).ready(function(){

	$("#login").click(function(){
		
		
		var dadosajax = 
		{		
			funcao : "login",
			
			email : $("#email_login").val(),
				
			senha : $("#senha_login").val()
		}
		
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
	});
	
	$("#cadastrar").click(function(){
		
		
		var dadosajax = 
		{				
			funcao : "cadastro",
			
			nome : $("#nome_cadastro").val(),
			
			email : $("#email_cadastro").val(),
			
			senha : $("#senha_cadastro").val()
		}
		
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
					alert("Cadastro realizado com sucesso");
					
					$("#nome_cadastro").val("");
					
					$("#email_cadastro").val("");
					
					$("#senha_cadastro").val("");
					
					$("#conf_senha").val("");
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
	});
});