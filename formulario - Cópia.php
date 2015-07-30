<html>

<head>
	<title>Abastecimento</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="UTF-8">
</head>

<body>

<?php 
if (isset($_GET['id'])) {
	include("conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	$sql   = "SELECT * FROM abastecimento WHERE id = ".$_GET['id']." ORDER BY data DESC";
	$query = $conexao->query($sql);
	$linha = $query->fetch(PDO::FETCH_OBJ);
} 
?>

<div class="container">
	<div class="tabela">
		<div class="col-md-12">
			
			<nav class="botoes">
				<a href="index.php"> <button type="button" class="btn btn-default btn-sm">Cancelar</button> </a>
			</nav>
			
			<form action="update.php" method="post">
				
				<div class="form-group" style = "width:80%">
			    	<input name="id" value=
			    	<?php if(isset($_GET["id"])){
			    		echo $_GET["id"];
			    	}else{
			    		echo " " ;
			    	} ?> >

			    	<label for="exampleInputEmail1">Data</label>
			    	<input type="date" class="form-control" id="data_abastecimento" name="data_abastecimento" required value=
				    	<?php if(isset($linha)){ 
				    		echo $linha->data;
				    	}else{
				    		echo "";
				    	} ?> >
			    	
			    	<label for="exampleInputEmail1">Km atual</label>
			    	<input type="text" class="form-control" id="km" name="km" value=
			    	   	<?php if(isset($linha)){ 
				    		echo $linha->kmatual;
				    	}else{ echo "";	} ?> >
			  	
			    	<label for="exampleInputEmail1">Litros</label>
			    	<input type="text" class="form-control" id="litros" name="litros" value=
			    	  	<?php if(isset($linha)){ 
				    		echo $linha->qtdlitros;
				    	}else{ echo ""; } ?> >

			    	<label for="exampleInputEmail1">Valor</label>
			    	<input type="text" class="form-control" id="valor" name="valor" value=
			    	 	<?php if(isset($linha)){ 
				    		echo $linha->valor;
				    	}else{ echo ""; } ?> >

					<label for="exampleInputEmail1">Combustível</label>
					<select class="form-control" id="combustivel" name="combustivel" value=
					   	<?php if(isset($linha)){ 
				    		echo $linha->combustivel;
				    	}else{
				    		echo ""; } ?> >
						<option>Álcool</option> 
			 			<option>Gasolina</option>
			 			<option>Ambos</option>
					</select>

					<input id="incluir" class="botoes" type="button" value="Incluir" onclick="gravaRegistro();">
					<input id="alterar" class="botoes" type="submit" value="Alterar" >
					<input id="excluir" class="botoes" type="button" value="Excluir" onclick= 
						<?php if( isset($_GET['id']) ){
							echo "excluiRegistro(" . $_GET['id'] . ")";
						}else{ echo ""; }?> >
				</div>
			</form>
 		</div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>

<?php 
	if (isset($_GET['id'])){
		?> <script type="text/javascript"> ocultaIncluir(); </script> <?php 
	}else{
		?> <script type="text/javascript"> ocultaAlterar(); ocultaExcluir();</script> <?php  
	}
?>

</body>
</html>