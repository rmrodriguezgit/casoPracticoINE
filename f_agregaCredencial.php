<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script> 

</head>
  <body>
  
  <?php include_once 'menu.php'; ?>
<div class="container mt-4">
	<div class="row" >
		 <h3> Agregar Credencial </h3>
		<div class="col-12">
		<form action="agregaCredencial.php" method="post" name="form1" >
         
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <strong>Generales</strong>
                    <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" >
                        </div>
                        <div class="mb-3">
                            <label for="apellidoP" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellidoP" id="apellidoP" >
                        </div>
                        <div class="mb-3">
                            <label for="apellidoM" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellidoM" id="apellidoM" >
                        </div>
                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" name="calle" id="calle" >
                        </div>
                        <div class="mb-3">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" >
                        </div>
                        <div class="mb-3">
                            <label for="cp" class="form-label">CP</label>
                            <input type="text" class="form-control" name="cp" id="cp" >
                        </div>
                </div>
                <div class="col-4">
                    <strong>INE</strong>
                        <div class="mb-3">
                            <label for="claveElector" class="form-label">Clave Elector</label>
                            <input type="text" class="form-control" name="claveElector" id="claveElector" >
                        </div>
                        <div class="mb-3">
                            <label for="curp" class="form-label">CURP</label>
                            <input type="text" class="form-control" name="curp" id="curp" >
                        </div>
                        <div class="mb-3">
                            <label for="aRegistro" class="form-label">año Registro</label>
                            <input type="text" class="form-control" name="aRegistro" id="aRegistro" >
                        </div>
                        <div class="mb-3">
                            <label for="vigencia" class="form-label">Vigencia</label>
                            <input type="text" class="form-control" name="vigencia" id="vigencia" >
                        </div>
                        <div class="mb-3">
                            <label for="seccion" class="form-label">Sección</label>
                            <input type="text" class="form-control" name="seccion" id="seccion" >
                        </div>
                </div>
                <div class="col-4">
                <strong>Localidad</strong>
                <?php
                    require ('config.php');
                    $query = "SELECT id, clave, nombre FROM estados ORDER BY id";
                    $resultado=$mysqli->query($query);
                 ?>
                    <div class="mb-3 mt-2">
                            <label for="id_cliente" class="form-label">Estado</label>
                            <select name="cbx_estado" id="cbx_estado" class="form-select" aria-label="Default select example">
                                    <option selected>Seleccione un estado</option>
                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                    <?php } ?>
                            </select>
                    </div>

                    <div class="mb-3">
                            <label for="id_cliente" class="form-label">Municipio</label>
                            <select name="cbx_municipio" id="cbx_municipio" class="form-select" aria-label="Default select example">
                            </select>
                    </div>

                    <div class="mb-3">
                            <label for="id_cliente" class="form-label">Localidad</label>
                            <select name="cbx_localidad" id="cbx_localidad" class="form-select" aria-label="Default select example">
                            </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 offset-md-4">
            <button type="submit" name="submit" value="Add" class="btn btn-primary">Agregar</button>
        </div>

		</form>
		</div>
	</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>