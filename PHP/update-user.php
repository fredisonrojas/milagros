<?php 

session_start();
include 'conexion.php';

$id_usuario = $_POST['id'];
$nombre_completo = $_POST['txtnombre'];
$usuario = $_POST['txtusuario'];
$correo = $_POST['txtcorreo'];
$contraseña = $_POST['txtcontraseña'];
$direccion = $_POST['txtdireccion'];
$telefono = $_POST['txtnumero'];

if (empty($telefono)){
    $telefono = "null";
}
if (empty($direccion)){
    $direccion = "NULL";
}

$query ="UPDATE `usuarios` 
SET `id_usuario`='$id_usuario',
`nombre_completo`='$nombre_completo',
`correo_electronico`='$correo',
`usuario`='$usuario',
`contraseña`='$contraseña',
`direccion`='$direccion',
`telefono` = $telefono 
WHERE `id_usuario` = ".$id_usuario."";  
     
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo "<script>
    alert('USUARIO MODIFICADO CORRECTAMENTE')
    window.location = '../index.php';
    </script>";
}else{
    echo "<script>
    alert('USUARIO NO HA SIDO ALMACENADO, INTÉNTALO DE NUEVO')
    window.location = '../perfil-usuario.php';
    </script>";
}


?>