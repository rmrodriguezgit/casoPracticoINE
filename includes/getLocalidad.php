<?php
	require ('../config.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT id, nombre FROM localidades WHERE municipio_id = '$id_municipio' ORDER BY nombre";
	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id']."'>".$row['nombre']."</option>";
	}
	echo $html;
?>