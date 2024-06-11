<?php

include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_usuario = $_SESSION['id']; 
    $carritoJSON = $_POST["carrito"];
    
    $carrito = json_decode($carritoJSON, true);
        
    $sql = "INSERT INTO `pedidos`(`id_usuario`, `fecha_pedido`) VALUES ($id_usuario , CURRENT_TIMESTAMP)";

    if ($conexion->query($sql) === TRUE) {
        echo "
        <script>
        alert ('Pedido registrado correctamente.');
        </script>
        ";
    } else {
        echo "        
        <script>
        alert ('Error al registrar el producto.');
        window.location = '../index.php'
        </script>
        ";
    }
    
    $id_pedido = $conexion->insert_id;
    $conexion->begin_transaction();
    
    foreach ($carrito as $producto) {
        $nombre = $producto["nombre"];
        $precio = $producto["precio"];
        $cantidad = $producto["cantidad"];

        $sql = "INSERT INTO `detalle_pedidos`(`id_pedido`, `producto`, `cantidad`, `subtotal`) VALUES ($id_pedido, '$nombre', $cantidad, $precio)";
    
        if ($conexion->query($sql) !== TRUE) {
            throw new Exception("Error al registrar el detalle de la factura: " . $conexion->error);
        }
    }
    // Confirmar la transacción
    $conexion->commit();
    echo "
    <script>
    alert ('Pedido y detalle de factura registrados correctamente.');
    window.location = '../index.php';
    </script>
    ";

}

?>
