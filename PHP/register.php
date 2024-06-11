<?php 

include 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$usuario = $_POST['usuario'];
$pass = $_POST['contraseña'];

$query = "INSERT INTO `usuarios`(`nombre_completo`, `correo_electronico`, `usuario`, `contraseña`, `fecha_registro`) VALUES 
('$nombre','$correo','$usuario','$pass', CURRENT_TIMESTAMP)";

$verificar_correo = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `correo_electronico` = '$correo' ");

if(mysqli_num_rows($verificar_correo) > 0 )
{
    echo "<script>
    alert('ESTE CORREO YA ESTÁ VINCULADO A OTRA CUENTA, INTÉNTALO DE NUEVO');
    window.location = '../login.php';
    </script>";
    exit();
}
else{
    
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo "<script>
        alert('USUARIO ALMACENADO CORRECTAMENTE')
        window.location = '../login.php';
        </script>";
    }else{
        echo "<script>
        alert('USUARIO NO HA SIDO ALMACENADO, INTÉNTALO DE NUEVO')
        window.location = '../login.php';
        </script>";
    }

}
?>