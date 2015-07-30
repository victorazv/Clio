<?php 

if (isset($_GET['operacao'])) {

	include("conexao.php");

	if ($_GET['operacao'] == "insert") {
		$kmrodado  = $mediakm = 0;
		$sql = "INSERT INTO `abastecimento` (`usr_login`, `data`, `kmatual`, `kmrodado`, `mediakm`, `combustivel`, `qtdlitros`, `valor`) 
		VALUE ('admin', '".$_POST['data_abastecimento']."', ".$_POST['km'].", ".$kmrodado.", ".$mediakm.", '".$_POST['combustivel']."', ".$_POST['litros'].", ".$_POST['valor'].");";
		$conexao->exec($sql);
		//matar a variavel resultado
	}elseif($_GET['operacao'] == "delete") {
		$sql = "DELETE FROM abastecimento WHERE id = " . $_POST['id'];
		$conexao->exec($sql);
	}


	$conexao = null; //fecha a conexão
}else{
	echo "Nenhum parâmetro foi passado.";
}

?>