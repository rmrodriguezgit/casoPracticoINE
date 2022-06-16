<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Credenciales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include_once 'menu.php'; ?>
  <?php
   
    include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM credenciales WHERE activo=1"); // using mysqli_query instead
  ?>
  

    <div class="row mt-5 justify-content-center">
        <div class="col-9 text-center">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Calle</th>
                    <th scope="col">Colonia</th>
                    <th scope="col">CP</th>
                    <th scope="col">Clave Elector</th>
                    <th scope="col">CURP</th>
                    <!-- <th scope="col">id_localidad</th>
                    <th scope="col">año Registro</th>
                    <th scope="col">vigenciaP</th>
                    <th scope="col">sección</th> -->
                    <th scope="col">estatus</th>
                    <th scope="col">credencial</th>
                    <th scope="col">editar/borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)) { 
                            echo '<tr>';
                            echo ' <th scope="row">'.$res[0].'</th> ';
                            echo ' <td>'.$res[2].' '.$res[3].' '.$res[1].'</td>';
                            echo ' <td>'.$res[4].'</td>';
                            echo ' <td>'.$res[5].'</td>';
                            echo ' <td>'.$res[6].'</td>';
                            echo ' <td>'.$res[7].'</td>';
                            echo ' <td>'.$res[8].'</td>';
                            // echo ' <td>'.$res[9].'</td>';
                            // echo ' <td>'.$res[10].'</td>';
                            // echo ' <td>'.$res[11].'</td>';
                            // echo ' <td>'.$res[12].'</td>';
                            echo ' <td>'.$res[13].'</td>';
                            echo "<td><a class='btn btn-primary' href=\"ver_credencial.php?id=$res[0]\">Ver Credencial</a></td>";
                            echo "<td><a class='btn btn-primary' href=\"edita.php?id=$res[id]\">Edit</a>  <a class='btn btn-danger' href=\"borra.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>