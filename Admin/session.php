<?php 
session_start();   
  // Controlo si el usuario ya está logueado en el sistema.
  if(isset($_SESSION['usuario'])){
    // Le doy la bienvenida al usuario.
    echo '<br> Bienvenido <strong> <br>' . $_SESSION['usuario'] . '</strong>';
  }else{
    // Si no está logueado lo redireccion a la página de login.
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: index.php");
  }
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Recorre Cundinamarca</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PruebaInventarioT</title>
    <link rel="shortcut icon" href="../images/favicon.ico">    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/modern-business.css" rel="stylesheet">

  
</head>

<body>

  <!-- Navigation -->
    <nav id="nav" class="navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container">
        <a  class="navbar-brand" href="PruebaInventarioT.php" ><img src="../images/#" class="img-circle" width="200" height="50"></a>

          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id="texto_nav" class="nav-link" href="cerrar-sesion.php">cerrar sesion</a>
            </li>
            <li class="nav-item">
                <a  id="texto_nav" class="nav-link" href="productos.php">Productos</a>
              </li>
                  
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <header>
    	
    </header>

<div class="container">
	<div class="row">
		<div class="col-md-12"><br></div>
	</div>
 
<?php 
$dato =  date("Y-m-d ");

$coneccion =  new mysqli('localhost', 'reecorriendocund_Diego666','Diego666*','reecorriendocund_pruebainventario');
#$coneccion = new mysqli('localhost','root','','reecorriendocund_pruebainventario');
   if (!$coneccion->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
}
#$id_producto = $_POST['id_producto'];

//$buscar ="SELECT * FROM `productos` WHERE `id_producto` = $id_producto";
$buscar ="SELECT * FROM `productos` WHERE `estado` = 1 ORDER BY fecha DESC;";
$query = $coneccion -> query($buscar);



  if(!$query)
  {
    echo "ERRO DE QUERY :".$buscar;
    die();
  }
else
{
 ?>
  <div class="row">
    <div class="col-md-12"></div>
    <div class="col-md-4">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Fecha de ingreso</th>
    </tr>
  </thead>
  <?php 
if(mysqli_num_rows($query) > 0)
  {
  while($row = $query->fetch_assoc()){

  $id_producto = $row['id_producto'];
  $nombre_producto = $row['nombre'];
  $precio = $row['precio'];
  $fecha = $row['fecha'];
   ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $id_producto; ?></th>
      <td><?php echo $nombre_producto; ?></td>
      <td><?php echo $precio; ?></td>
      <td><?php echo $fecha;  }}}?></td>
    </tr>
    
  </tbody>
</table>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
  </div>

  
</div>


<footer>  
</footer>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="--/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script language="Javascript">
document.oncontextmenu = function(){return false}
</script>
<script>
$(document).ready(function(){
    $("#myModal").modal();    
});
</script>
</body>
</html>
