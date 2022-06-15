<?php
	require ('../config.php');
	
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT id, nombre FROM municipios WHERE estado_id = '$id_estado' ORDER BY nombre";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>