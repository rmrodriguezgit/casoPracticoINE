<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  
  <?php include_once 'menu.php'; ?>
   
 

<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['submit'])) {	

$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
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
$localidad = mysqli_real_escape_string($mysqli, $_POST['cbx_localidad']);

// checking empty fields
if(empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($claveElector) || empty($curp)) {	
    
if(empty($nombre)) {
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
    // if all the fields are filled (not empty) 	
    //insert data to database
    $result = mysqli_query($mysqli, "SELECT id FROM credenciales WHERE clave_elector='$claveElector'");
    $existe = mysqli_num_rows($result);
    
    if($existe>0) {
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Clave Elector existente, intente nuevamente.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
       
    } else {
      $result = mysqli_query($mysqli, "INSERT INTO `credenciales` (`nombres`,`apellidoP`,`apellidoM`,`calle`,`colonia`,`cp`,`clave_elector`,`curp`,`id_localidad`,`aRegistro`,
      `vigencia`,`seccion`)
      VALUES ('$nombre','$apellidoP','$apellidoM','$calle','$colonia',$cp,'$claveElector','$curp',$localidad,'$aRegistro','$vigencia','$seccion');
      ");
      echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo "<div class='alert alert-success' role='alert'>";
        echo "Registro agregado satisfactoriamente.";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }	
    
    //display success message
    
    
}
echo "<br/><a class='btn btn-primary' href='index.php'>Inicio</a>";

}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
