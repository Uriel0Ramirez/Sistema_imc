<?php
$usuario=$_POST['usuario'];
$contraseña = md5($_POST['contraseña']);


include('sesion.php');

$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","sistemaimc");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";


$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas){ //administrador
    header("location:User/home.php");
        
}
/*else
if($filas['t_usuario']==2){ //cliente
header("location:./student/index.php");
}*/
else{
    ?>
    <?php
    include("index.php");
    ?>
    <!--------<h1 class="bad">ERROR EN LA AUTENTIFICACION</h1> ------->

    <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Error en la Cuenta !'
    })
  </script>
   
    <?php


}
mysqli_free_result($resultado);
mysqli_close($conexion);

