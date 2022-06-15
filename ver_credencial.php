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
   
  $id_credencial = $_GET['id'];
    include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT *
  FROM credenciales C
  JOIN localidades L
  ON C.id_localidad = L.id
  JOIN municipios M
  ON L.municipio_id = M.id
  JOIN estados E
  ON M.estado_id = E.id
  WHERE C.id=$id_credencial;
  "); // using mysqli_query instead
  ?>
  

                    <?php
                        while($res = mysqli_fetch_array($result)) { 
                    ?>
                    <div class="container justify-content-center">
                      <div class="row">
                          <div class="col-1 mt-2 justify-content-center">
                            <img src='escudo.png' width='130' height='auto'>
                          </div>
                          <div class="col-2 mt-4 justify-content-center">
                          <h3>MEXICO</h3>
                          </div>
                           <div class="col-6 justify-content-center">
                             <h1> Instituto Nacional Electoral</h1>
                             <h2> CREDENCIAL PARA VOTAR </h2>
                           </div>
                       </div>
                       <div class="row">
                         <div class="col-3">
                         <img src='foto.png' width='280' height='auto'>
                         </div>
                         <div class="col-6 mt-1 ">
                           <small class="text-primary">NOMBRE</small>
                           <p class='p-0 m-0'><?php echo $res[2] ?></p>
                           <p class='p-0 m-0'><?php echo $res[3] ?></p>
                           <p class='p-0 m-0'><?php echo $res[1] ?></p>
                           <small class="text-primary">DOMICILIO</small>
                           <p class='p-0 m-0'><?php echo $res[4] ?></p>
                           <p class='p-0 m-0'><?php echo $res[5].' ',$res[6] ?></p>
                           <p class='p-0 m-0'><small class="text-primary">CLAVE DE ELECTOR </small><?php echo $res[7] ?></p>
                           <p class='p-0 m-0'><?php echo $res[8].'<small class="text-primary"> AÑO DE REGISTRO </small>',$res[10] ?></p>
                           <p class='p-0 m-0'><small class="text-primary">ESTADO </small><?php echo $res[32] ?><small class="text-primary"> MUNICIPIO </small><?php echo $res[15] ?><small class="text-primary"> SECCIÓN </small><?php echo $res[12] ?> </p>
                           <p class='p-0 m-0'><small class="text-primary">LOCALIDAD </small><?php echo $res[9] ?><small class="text-primary"> EMISION </small>2022<small class="text-primary"> VIGENCIA </small><?php echo $res[11] ?> </p>
                         </div>
                       </div>
                      </div>                    
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>