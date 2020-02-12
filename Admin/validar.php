<?php 
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['contrasena'];

if ($usuario != "" || $password !="") 
{
  validar($usuario,$password);
}
else
{
   echo '<script type="text/javascript">
       alert("Datos InCorrectos");
      window.location="http://localhost/PruebaInventarioT.com/Admin/index.php";
    </script> ';
}

function validar($usuario,$password)
{
$coneccion =  new mysqli('localhost', 'reecorriendocund_Diego666','Diego666*','reecorriendocund_pruebainventario');
#$coneccion = new mysqli('localhost','root','','reecorriendocund_pruebainventario');
echo "Errno: -> " . $coneccion->connect_errno . "\n";

$consulta = "SELECT * FROM `usuarios` WHERE `nombre_usuario` LIKE '%$usuario' AND `contrasena` LIKE '%$password%' ; ";

$query = $coneccion -> query($consulta);

if(!$query){
  echo "ERRO DE QUERY";
}
else{
  if(mysqli_num_rows($query) > 0)
  {

     while($row = $query->fetch_assoc())
          {
            $id_usuario = $row['id_usuario'];
            $nombre_usuario = $row['nombre_usuario'];
            $rol = $row['id_rol'];  


          }
          if($rol ==1)
          {
              $_SESSION['usuario'] = $usuario;
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: session.php"); 

          }
          if ($rol ==2)
           {
              $_SESSION['usuario'] = $usuario;
              header("HTTP/1.1 302 Moved Temporarily");
              header("Location: session.php"); 

          }
          if ($rol ==3)
           {
              $_SESSION['usuario'] = $usuario;
              header("HTTP/1.1 302 Moved Temporarily");
              header("Location: ../Estudiantes_Talleres_Cursos/index.php"); 

          }

  
}
else{
    echo '<script type="text/javascript">
       alert("Datos InCorrectos");
      window.location="http://localhost/PruebaInventarioT.com/Admin/index.php";
    </script> ';
}
}


}

 ?>