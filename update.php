<?php 

include("conexao.php");

$sql = "UPDATE abastecimento SET usr_login = 'admin', data = '".$_POST["data_abastecimento"]."' WHERE id = ". $_POST["id"];
$conexao->exec($sql);

$conexao = null; //fecha a conexão

?>
<script type="text/javascript">
	alert("Registro alterado com sucesso!");
</script>
<?php 
header("Location: formulario.php?id=".$_POST["id"] );
 ?>