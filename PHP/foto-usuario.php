<?php 

include "conexion.php";

$idusuario = $_POST['id'];

$query = "SELECT * FROM `usuarios` WHERE `id_usuario` = ".$idusuario."";
$ejecutar = mysqli_query($conexion, $query);



    $tipo = 'jpg';
    $type = array('image/jpeg' => 'jpg');

    $nombrefoto = $_FILES['imagen']['name'];
    $ruta1 = $_FILES['imagen']['tmp_name'];
    $name = $idusuario.'.'.$tipo;

    if(is_uploaded_file($ruta1)){
        $destino1 = "../USUARIO FOTOS/".$name; 
        copy($ruta1, $destino1);
        $destino2 = "USUARIO FOTOS/".$name; 
    }else if(!is_uploaded_file($ruta1)){
        $destino1 = "../USUARIO FOTOS/nf.jpg"; 
        copy($ruta1, $destino1);
        $destino2 = "USUARIO FOTOS/nf.jpg"; 
    }

    $query = "UPDATE `usuarios` SET `imagen`='$destino2' WHERE `id_usuario` = $idusuario ";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo "<script>
        alert('FOTO DE PERFIL MODIFICADA CORRECTAMENTE')
        window.location = '../perfil-usuario.php?id=".$idusuario."';
        </script>";
    }else{
        echo "<script>
        alert('LA FOTO NO HA SIDO MODIFICADA, INTÉNTALO DE NUEVO')
        window.location = '../perfil-usuario.php?id=".$idusuario."';
        </script>";
    }

?>