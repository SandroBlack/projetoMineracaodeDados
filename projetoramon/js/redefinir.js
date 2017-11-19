$(document).ready(function(){

	$("#redefinirSenha").click(function(){
		
		senha = $("#senha").val();
		
		confSenha = $("#confSenha").val();
		
		funcao = "redefinir";
		
		if (senha != confSenha)
		{
			alert("Senhas não equivalentes");
			
			return false
		}
		
		else
		{
			dadosajax = {funcao,senha};
			
			$.ajax({
				
				type: 'POST',
					
				url: 'php/funcoes.php',
					
				data: dadosajax, 
					
				success: function(dados)
				{
					if(dados == "sucesso")
					{	
						alert("Senha alterada com sucesso");
					
						window.location="menu-usuario.php"; 
					}
					
					else
					{
						alert("Ocorreu algum erro");
					}		
				},
					
				error: function(XMLHttpRequest, textStatus, errorThrown) 
				{ 
					alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
				}  		
			});	
		}	
	});	
})