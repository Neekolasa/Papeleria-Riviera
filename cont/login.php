<?php
    session_start();
    include_once('conn.php');
    include_once('encriptar.php');
    
    if (isset($_REQUEST['usuario'])) { //Comprueba si se ingreso un dato
      //Almacena la informacion ingresada en el formulario
      $user = $_REQUEST['usuario'];
      $pass = encrypt($_REQUEST['password'],"poio"); //Se encripta la contraseña

      //Se crea la variable privilegio para almacenar la información
      $privilegio="";

      //Se prepara la consulta a la base de datos para comprobar si existe el usuario ingresado
      $query="SELECT * FROM usuarios WHERE nombre= '$user' AND contrasena='$pass'";

      //Se ejecuta la consulta
      $result = mysqli_query($conexion, $query);

      //Si se obtiene un dato de la base de datos, se almacena el privilegio
      while ($a = mysqli_fetch_array($result)) {
        $privilegio = $a['privilegio'];
      }
  
      //Se almacena el usuario y el privilegio en variables globales
      $_SESSION['nombre']=$user;
      $_SESSION['privilegio']=$privilegio;

      //Se devuelve una respuesta de exito o error segun el resultado de la consulta
      if ($result && $privilegio != NULL) {
      
        $respuesta = "exito";

        
      } else{
    
        $respuesta = "error";
      }
  
      $conexion->close();
      echo $respuesta;
    }

?>