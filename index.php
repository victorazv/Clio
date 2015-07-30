<!DOCTYPE html>
<html>

<head>
	<title>Abastecimentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="UTF-8">
</head>

<body>
<div class="container">
	<!-- class="row"-->
	<div class="tabela">
		<div class="col-md-12">
			<?php 
				
				include("conexao.php");
				$link = new conexao();
				$conexao = $link->conecta();

				$sql = "SELECT * FROM abastecimento ORDER BY data DESC";
				$query = $conexao->query($sql);
				//$query = mysql_query($sql);
				/*if(!$query){
					echo "Não foi possível executar a consulta ($sql) no banco de dados: " . mysql_error();
			    	exit;
				}*/			
			?>
			<nav class="botoes">
				<a href="formulario.php"> <button type="button" class="btn btn-default btn-sm" >Novo abastecimento</button> </a>
			</nav>
			
			<div>
				<table class="table table-condensed table-striped table-responsive">
					<tr class="dados_tabela"> 
						<td></td>
						<td>Data 		</td> 
						<td>Km atual	</td>
						<td>KMs rodados </td>
						<td>Média		</td>
						<td>Combustível </td>
						<td>Litros		</td>
						<td>valor		</td>
					</tr>
					
					<?php while ($linha = $query->fetch(PDO::FETCH_OBJ)):/*mysql_fetch_row($query)):*/ ?>
						<?php if ($linha->combustivel == "G"): $linha->combustivel = "Gasolina" ?>
						<?php endif ?>
						<?php if ($linha->combustivel == "A"): $linha->combustivel = "Álcool" ?>
						<?php endif ?>

						<tr class="dados_tabela"> 
							<td><a href= <?php echo "formulario.php?id=".$linha->id; ?> ><img src="img/lapis.png"></a></td>
							<td> <?php echo date("d/m/Y", strtotime($linha->data)) ?> </td> 
							<td> <?php echo $linha->kmatual ?> 		</td>
							<td> <?php echo $linha->kmrodado ?> 	</td>
							<td> <?php echo $linha->mediakm ?> 		</td>
							<td> <?php echo $linha->combustivel ?>  </td>
							<td> <?php echo $linha->qtdlitros ?> 	</td>
							<td> <?php echo "R$".$linha->valor ?>	</td>
						</tr>
					<?php endwhile ?>
				</table>
			</div>
		<?php 
			//fecha a conexão
			//mysql_close($conexao);
			$conexao = $link->desconecta($conexao);
	 	?>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>