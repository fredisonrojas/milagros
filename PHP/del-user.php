<?php 
session_start();
include 'conexion.php';
$id = $_POST['id'];
$query = "DELETE FROM `usuarios` WHERE `id_usuario` = $id ;";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo '
    <script>
    alert("¡EL USUARIO HA SIDO ELMINADO CORRECTAMENTE!");
    window.location = "../st-productos.php";
    </script>
    ';
}else{
    echo '
    <script>
    alert("EL USUARIO NO HA SIDO ELMINADO CORRECTAMENTE, INTÉNTALO DE NUEVO");
    window.location = "../st-productos.php";
    </script>
    ';
}

?>