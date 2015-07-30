function gravaRegistro(){			
	//pegando os valores com jquery
	var data_abastecimento = $("#data_abastecimento")[0].value; 
	var km = $("#km")[0].value; 
	var litros = $("#litros")[0].value; 
	var valor = $("#valor")[0].value; 
	var combustivel = $("#combustivel")[0].value; 
	
	$.ajax({
	  method: "POST",
	  url: "faz_crud.php?operacao=insert",
	  data: {data_abastecimento: data_abastecimento, km: km, litros: litros, valor: valor, combustivel: combustivel},
	  context: document.body
	}).done(function() {
	  $( this ).addClass( "done" );
	});
	alert("Registro incluido com sucesso!");
}

function excluiRegistro(id){			

	console.log(id);

	$.ajax({
	  method: "POST",
	  url: "faz_crud.php?operacao=delete",
	  data: {id: id},
	  context: document.body
	}).done(function() {
	  $( this ).addClass( "done" );
	});

}

function ocultaIncluir(){

	var elemento = document.getElementById("incluir");
	elemento.style.display = "none";
}

function ocultaAlterar(){

	var elemento = document.getElementById("alterar");
	elemento.style.display = "none";
}

function ocultaExcluir(){

	var elemento = document.getElementById("excluir");
	elemento.style.display = "none";
}

function carregaValoresCampos(){
		
		var data 		= document.getElementById("data_abastecimento");
		var km 			= document.getElementById("km");
		var litros 		= document.getElementById("litros");
		var valor 		= document.getElementById("valor");
		var combustivel = document.getElementById("combustivel");
				
		data.value = '<?php echo $linha->data ?>';
		km.value = '<?php echo $linha->kmatual ?>';
		litros.value = '<?php echo $linha->qtdlitros; ?>';
		valor.value = '<?php echo $linha->valor; ?>';
		combustivel.value = '<?php echo $linha->combustivel; ?>';
}