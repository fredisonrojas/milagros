<?php 

include "conexion.php";

$idproducto = $_POST['id'];

$query = "SELECT * FROM `productos` WHERE `id_producto` = ".$idproducto."";
$ejecutar = mysqli_query($conexion, $query);



    $tipo = 'jpg';
    $type = array('image/jpeg' => 'jpg');

    $nombrefoto = $_FILES['imagen']['name'];
    $ruta1 = $_FILES['imagen']['tmp_name'];
    $name = $idproducto.'.'.$tipo;

    if(is_uploaded_file($ruta1)){
        $destino1 = "../PRODUCTOS FOTOS/".$name; 
        copy($ruta1, $destino1);
        $destino2 = "PRODUCTOS FOTOS/".$name; 
    }

    $query = "UPDATE `productos` SET `imagen`='$destino2' WHERE `id_producto` = $idproducto ";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo "<script>
        alert('FOTO DE PRODUCTO MODIFICADA CORRECTAMENTE')
        window.location = '../st-productos.php';
        </script>";
    }else{
        echo "<script>
        alert('LA FOTO NO HA SIDO MODIFICADA, INTÉNTALO DE NUEVO')
        window.location = '../st-productos.php';
        </script>";
    }

?>