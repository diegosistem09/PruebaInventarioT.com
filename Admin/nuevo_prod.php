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


$coneccion =  new mysqli('localhost', 'reecorriendocund_Diego666','Diego666*','reecorriendocund_pruebainventario');
#$coneccion = new mysqli('localhost','root','','reecorriendocund_pruebainventario');
   if (!$coneccion->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
}

$nombre_prod = $_POST['nombre_producto'];
$precio = $_POST['precio'];
$fecha = date('Y-m-d');

$guardar = "INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `fecha`, `estado`) VALUES (NULL, '$nombre_prod', '$precio', '$fecha', '1');";

$query = $coneccion -> query($guardar);

if(!$query){
	echo '<script type="text/javascript">
          alert("Error de query");
          window.location="http://localhost/PruebaInventarioT.com/Admin/productos.php";
        </script> ';
    }else{
    	echo '<script type="text/javascript">          
          alert("Datos almacenados correctamente");
          window.location="http://localhost/PruebaInventarioT.com/Admin/productos.php";
        </script> ';
    }


 ?>