<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']);
    $apellidoP = mysqli_real_escape_string($mysqli, $_POST['apellidoP']);
    $apellidoM = mysqli_real_escape_string($mysqli, $_POST['apellidoM']);
    $calle = mysqli_real_escape_string($mysqli, $_POST['calle']);
    $colonia = mysqli_real_escape_string($mysqli, $_POST['colonia']);
    $cp = mysqli_real_escape_string($mysqli, $_POST['cp']);
    $claveElector = mysqli_real_escape_string($mysqli, $_POST['claveElector']);
    $curp = mysqli_real_escape_string($mysqli, $_POST['curp']);
    $aRegistro = mysqli_real_escape_string($mysqli, $_POST['aRegistro']);
    $vigencia = mysqli_real_escape_string($mysqli, $_POST['vigencia']);
    $seccion = mysqli_real_escape_string($mysqli, $_POST['seccion']);
    $localidad = mysqli_real_escape_string($mysqli, $_POST['localidad']);

	
	// checking empty fields
	if(empty($nombres) || empty($apellidoP) || empty($apellidoM) || empty($claveElector) || empty($curp)) {	
    
        if(empty($nombres)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Campo nombre vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        
        if(empty($apellidoP)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Campo apellido Paterno vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        
        if(empty($apellidoM)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Campo apellido Materno vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        
        if(empty($claveElector)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Campo Clave Elector vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        
        if(empty($curp)) {
            echo "<div class='row'>";
            echo "<div class='col-3'>";
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Campo curp vacío";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE credenciales SET nombres='$nombres',apellidoP='$apellidoP',
                                                                 apellidoM='$apellidoM', calle='$calle',
                                                                 colonia='$colonia', cp='$cp', clave_elector='$claveElector',
                                                                 curp='$curp',aRegistro='$aRegistro',vigencia='$vigencia',
                                                                 seccion='$seccion', id_localidad='$localidad'
                                         WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
        
         header('Location: index.php');
	}
}
?>
<?php
//getting id from url
$id= $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM credenciales WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombres = $res['nombres'];
    $apellidoP = $res['apellidoP'];
    $apellidoM = $res['apellidoM'];
    $calle = $res['calle'];
    $colonia = $res['colonia'];
    $cp = $res['cp'];
    $claveElector = $res['clave_elector'];
    $curp = $res['curp'];
    $aRegistro = $res['aRegistro'];
    $vigencia = $res['vigencia'];
    $seccion = $res['seccion'];
    $localidad = $res['id_localidad'];
}
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'menu.php'; ?>
    
	
	
    <div class="container mt-12">
		<div class="row" >
			 <h3> Edita Cliente </h3>
			<div class="col-12">
			<form action="edita.php" method="post" name="form1" >
            <div class="container">
            <div class="row">
                <div class="col-4">
                    <strong>Generales</strong>
                    <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $nombres;?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoP" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellidoP" id="apellidoP" value="<?php echo $apellidoP;?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoM" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellidoM" id="apellidoM" value="<?php echo $apellidoM;?>">
                        </div>
                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" name="calle" id="calle" value="<?php echo $calle;?>">
                        </div>
                        <div class="mb-3">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" value="<?php echo $colonia;?>">
                        </div>
                        <div class="mb-3">
                            <label for="cp" class="form-label">CP</label>
                            <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp;?>">
                        </div>
                </div>
                <div class="col-4">
                    <strong>INE</strong>
                        <div class="mb-3">
                            <label for="claveElector" class="form-label">Clave Elector</label>
                            <input type="text" class="form-control" name="claveElector" id="claveElector" value="<?php echo $claveElector;?>" >
                        </div>
                        <div class="mb-3">
                            <label for="curp" class="form-label">CURP</label>
                            <input type="text" class="form-control" name="curp" id="curp" value="<?php echo $curp;?>">
                        </div>
                        <div class="mb-3">
                            <label for="aRegistro" class="form-label">año Registro</label>
                            <input type="text" class="form-control" name="aRegistro" id="aRegistro" value="<?php echo $aRegistro;?>">
                        </div>
                        <div class="mb-3">
                            <label for="vigencia" class="form-label">Vigencia</label>
                            <input type="text" class="form-control" name="vigencia" id="vigencia" value="<?php echo $vigencia;?>">
                        </div>
                        <div class="mb-3">
                            <label for="seccion" class="form-label">Sección</label>
                            <input type="text" class="form-control" name="seccion" id="seccion" value="<?php echo $seccion;?>">
                        </div>
                        <div class="mb-3">
                            <label for="localidad" class="form-label">ID Localidad</label>
                            <input type="text" class="form-control" name="localidad" id="localidad" value="<?php echo $localidad;?>">
                        </div>
                </div>
                
            </div>
        </div>

                <tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			</tr>
				
				<button type="submit" name="update" value="Update" class="btn btn-primary">Actualizar</button>
			</form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>