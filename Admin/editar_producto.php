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
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PruebaInventarioT">
    <meta name="author" content="Diego Mauricio Poveda Carreño">

    <title>PruebaInventarioT</title>
    <link rel="shortcut icon" href="images/favicon.ico">    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="../js/fileinput.min.js" type="text/javascript"></script>
</head>
<body onload="cargar_tip()" background="../images/bg.jpg">
   
     <!-- Navigation -->
    <nav id="nav" class="navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container">
        <a  class="navbar-brand" href="PruebaInventarioT.php" ><img src="../images/logo.png" class="img-circle" width="200" height="50"></a>

          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id="texto_nav" class="nav-link" href="cerrar-sesion.php">cerrar sesion</a>
            </li>
            <li class="nav-item">
                <a  id="texto_nav" class="nav-link" href="">Productos</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    
<header>

</header>

  <?php 
    $dato =  date("Y-m-d ");

$coneccion =  new mysqli('localhost', 'reecorriendocund_Diego666','Diego666*','reecorriendocund_pruebainventario');
#$coneccion = new mysqli('localhost','root','','reecorriendocund_pruebainventario');
   if (!$coneccion->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
}
$id_producto = $_POST['id_producto'];

$buscar ="SELECT * FROM `productos` WHERE `id_producto` = $id_producto";
$query = $coneccion -> query($buscar);



  if(!$query)
  {
    echo "ERRO DE QUERY :".$buscar;
    die();
  }
else
{
  if(mysqli_num_rows($query) > 0)
  {
  	$nombre_prod = $_POST['nombre_producto'];
  	$precio_prod = $_POST['precio'];
  	$fecha_modificacion = date('Y-m-d');

  	$update ="UPDATE `productos` SET `nombre` = '$nombre_prod', `precio` = '$precio_prod', `fecha` = '$fecha_modificacion' WHERE `productos`.`id_producto` = $id_producto;";
  	$query2 = $coneccion->query($update);

  	if(!$query2){
  		echo "<br> ERRROR DE ACTUALIZACION";die();
  	}else{
  		echo '<script type="text/javascript">
          alert("Datos almacenados correctamente");
          window.location="http://localhost/PruebaInventarioT.com/Admin/productos.php";
        </script> ';
    
  	}
  
  }else
  {
	
  }
   }
  ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<?php   
  $directory = "uploads/";      
  $images = glob($directory . "*.*");
  ?>
<script>
  $("#imagen").fileinput({
  uploadUrl: "guardar_den.php", 
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 1,
  showUpload: true, 
  showRemove: true,
  initialPreview: [
  <?php
   foreach($images as $image){?>
    "<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
  <?php } ?>],
    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
  {caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
  <?php } ?>]
  }).on("filebatchselected", function(event, files) {
  
  $("#imagen").fileinput("upload");
  
  });
  
  </script>
  <script language="Javascript">
document.oncontextmenu = function(){return false}
</script>
</html>