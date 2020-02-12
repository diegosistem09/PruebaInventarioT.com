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
<style type="text/css">
  #seccion1{
  
    width: 800;
    height: 400;
    background-color: #0F8DC6;

  }
  #nproducto{
    position: relative;
    top: 50;
    width: 800;
    height: 650;
    background-color: #0F8DC6;

  }
</style>
<body  background="../images/#">
   
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
                <a  id="texto_nav" class="nav-link" href="#">Productos</a>
              </li>
              <li class="nav-item">
                <a  id="texto_nav" class="nav-link" href="#nproducto">Nuevo Producto</a>
              </li>
              

            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<header>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
    </div>
  </div>
</div>
</header>
<section>
  
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
$buscar ="SELECT * FROM `productos` WHERE `estado` = 1";
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
  while($row = $query->fetch_assoc()){

  $id_producto = $row['id_producto'];
  $nombre_producto = $row['nombre'];
  $precio = $row['precio'];
  $fecha = $row['fecha'];
  
       
  ?>
<div class="container"> 
  <div id="seccion1">
    <div class="row">    
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h2 id="textsubmenu"></h2>
        <p id="texto3">Productos </p>
      </div>
      <div class="col-md-12"></div>
      <div class="col-md-4"></div>
        <div class="col-xs-12 col-md-6">
          <form enctype="multipart/form-data" class="form-group" role="form" action="editar_producto.php" method="post">

            <div class="form-group">              
              <div class="col-md-6">
                <img src="../images/celular.jpg" class="img-circle" width="200" height="50">              </div>
              <div class="col-sm-6">
                <input type="text" name="nombre_producto" class="form-control" id="inputEmail3" value="<?php echo $nombre_producto; ?>">
              </div>

              <div class="col-sm-6">               
                <input type="text" name="precio" value="<?php echo $precio; ?>" class="form-control" id="exampleFormControlTextarea1" rows="1">                                   
              </div>
            </div>            
            
                      
            <div class="form-group">           
             <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" id="btn_denunciar" class="btn btn-default">EDITAR</button>
              </div>
            </div>
         
      </form>
    </div>
    </div>
    </div>
      </div>   

      
</div>

<?php 
 }
  }else
  {

  }
   }
           ?>
           </section>
<section>
  <div class="container" id="nproducto" >
           <div class="row">
            <div class="col-md-12">    
              <div class="col-md-12"></div>
              <div id="">
                <H1>Nuevo Producto</H1>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-xs-12 col-md-12">
          <form enctype="multipart/form-data" class="form-group" role="form" action="nuevo_prod.php" method="post">

            <div class="form-group">              
              
              <div class="col-sm-6">
                <input type="text" name="nombre_producto" class="form-control" id="inputEmail3" placeholder="Nombre Producto">
              </div>

              <div class="col-sm-6">               
                <input type="text" name="precio" placeholder="Precio" class="form-control" id="exampleFormControlTextarea1" rows="1">                                   
              </div>
            </div>            
            
                      
            <div class="form-group">           

              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" id="btn_denunciar" class="btn btn-default">Guardar</button>
              </div>
            </div>
         
      </form>
    </div>
            </div>
            
          </div>
</div>
</section>
  <footer class="py-5 bg-dark">    
      <div class="container">
        <div class="row">
          <div class="col-md-12"></div>
          <div class="col-md-12">
        <p class="m-0 text-center text-white">Copyright &copy; PruebaInventarioT.COM</p>
        </div>
        </div>
      </div>
      <!-- /.container -->
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