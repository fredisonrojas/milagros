<?php 
session_start();
include 'conexion.php';
$id = $_POST['id'];
$query = "DELETE FROM `Productos` WHERE `id_producto` = '".$id."';";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo '
    <script>
    alert("¡EL PRODUCTO HA SIDO ELMINADO CORRECTAMENTE!");
    window.location = "../st-productos.php";
    </script>
    ';
}else{
    echo '
    <script>
    alert("EL PRODUCTO NO HA SIDO ELMINADO CORRECTAMENTE, INTÉNTALO DE NUEVO");
    window.location = "../st-productos.php";
    </script>
    ';
}

?>