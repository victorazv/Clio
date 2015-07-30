<?php 

//before
$sql = "SELECT MAX(data) FROM abastecimento";
sc_lookup(rs, $sql);

if(!is_null($rs[0][0])){
	$sql = "SELECT MAX(id) FROM abastecimento WHERE data = '".$rs[0][0]."'";
	sc_lookup(rs, $sql);
	{maxid}  	 = $rs[0][0];
}

if(!empty({maxid})){
	$sql = "SELECT 
				kmatual, 
				qtdlitros 
			FROM abastecimento 
			WHERE id = ".{maxid};
	sc_lookup(rs, $sql);
	
	{kmantiga}   = $rs[0][0];
	{litros_ant} = $rs[0][1];
}

//after
if(!empty({maxid})){
	$up_kmrodado = {kmatual} - {kmantiga};
	$up_media 	 = $up_kmrodado / {litros_ant};
	
	$sql = "UPDATE abastecimento SET kmrodado = ".$up_kmrodado.", mediakm = ".$up_media." WHERE id = ".{maxid};
	sc_exec_sql($sql);
}

 ?>