<?php 

session_start();
include 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$gender= $_POST['gender'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$id = $_POST['id'];

$query ="UPDATE `productos` 
SET
`nombre_producto`='$nombre',
`descripcion`='$descripcion',
`gender`='$gender',
`precio`= '$precio',
`stock`='$stock'
WHERE `id_producto` = ".$id."";
     
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar){
    echo "<script>
    alert('PRODUCTO MODIFICADO CORRECTAMENTE')
    window.location = '../st-productos.php';
    </script>";
}else{
    echo "<script>
    alert('PRODUCTO NO HA SIDO MODIFICADO, INTÉNTALO DE NUEVO: " . mysqli_error($conexion) . "');
    window.location = '../st-productos.php';
    </script>";
}


?>