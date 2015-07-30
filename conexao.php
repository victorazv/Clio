<?php 

class conexao{

	function conecta(){
		
		$host = "assemany.com";
		$banco = "grweb579_combustivel";
		$usuario = "grweb579_victor";
		$senha = "core2duo";

		try {
				$conexao = new PDO("mysql:host=".$host.";dbname=".$banco, $usuario, $senha);
			}catch (PDOException $i){
				//se houver exceção, exibe
				print "Erro: <code>" . $i->getMessage() . "</code>";
				die;
			}
		return $conexao;
	}

	function desconecta($conexao){
		return null;
	}
	
}

/*	$conexao = mysql_connect('assemany.com', 'grweb579_victor', '@core2duo'); 
	if (!$conexao) { 
		die('Não foi possível conectar: ' . mysql_error()); 
	} 
	//echo 'Conexão bem sucedida'; 
	mysql_select_db('grweb579_combustivel', $conexao);
*/ 

 ?>