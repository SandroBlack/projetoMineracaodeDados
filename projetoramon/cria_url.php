<?php 
	include_once("db/conexao.php");
	
	function gerarUrl(){
		
		$disponivel = true;
		
		while($disponivel)
		{
			$retorno = "";
			
			$tamanho = 30;
			
			$maiusculas = true;
			
			$numeros = true;
			
			$simbolos = false;
			
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			
			$num = '1234567890';
			
			$simb = '!@#$%-';
			
			$retorno = '';
			
			$caracteres = '';
			
	
			$caracteres .= $lmin;
			
			if ($maiusculas) $caracteres .= $lmai;
			
			if ($numeros) $caracteres .= $num;
			
			if ($simbolos) $caracteres .= $simb;
			

			$len = strlen($caracteres);
			
			for ($n = 1; $n <= $tamanho; $n++) 
			{
				$rand = mt_rand(1, $len);

				$retorno .= $caracteres[$rand-1];
			}
			
			try
			{
				$pdo = conectar();
				
				$sql = "SELECT link_conteudo FROM link WHERE link_conteudo = :link_conteudo";
				
				$select = $pdo->prepare($sql);			
				
				$select->bindValue(":link_conteudo", $retorno);
				
				$select->execute();
				
				$linha = $select->rowCount();
				
				if ($linha == 0)
				{
					break;
				}
			} 
		
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();
			}
		};
		
		return $retorno;			
	}

?>