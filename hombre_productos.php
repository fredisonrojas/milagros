<?php 
try {
    
    error_reporting(0);
    session_start();
    include 'PHP/conexion.php';
    $usuario = $_SESSION['username'];
    $id = $_SESSION['id'];
    $rol = $_SESSION['rol'];

    $sql = "SELECT * FROM productos WHERE gender = 'H'";
    $resultado = $conexion->query($sql);

    // Fetch data from the query result
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
} catch (PDOException $e) {
    echo "<script> alert ('Error: " . $e->getMessage() . "')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/hombre_productos.css">
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
    <title>Query Users</title>
</head>
<body>
    <header>
            <div class="logo-account-navbar">
                <div class="logo">
                    <a href="index.php"><img src="IMG/Milagros Para El Cabello.png" id="logo-header"></a>
                </div>
            </div>
            <div class="texto-rosa-header nav-list-rosa">
                <ul class="nav-list">
                    <li class="nav-list-item"><a href="index.php">Inicios</a></li>
                    <li class="nav-list-item"><a href="index.php#usuarios">usuarios</a></li>
                    <li class="nav-list-item"><a href="index.php#about-us">Acerca de nosotros</a></li>
                    <li class="nav-list-item"><a href="index.php#contact-info">Contactos</a></li>
                </ul>
            </div>
    </header>
    <main>
        <section class="section-introduction">
            <div class="text-introduction">
                <h1>Bienvenido a Tu Tienda de Cosméticos</h1>
                <p>Descubre una amplia gama de productos de belleza y cuidado personal</p>
                <a href="index.php#productos"><button class="btn-introduction">Ver Productos</button></a>
            </div>
        <a name="productos"></a>
        </section>
        <div class="contenedor">
        
            <section class="section-productos">
                <div class="texto-rosa-header titulo-productos"><p>Productos para hombres</p></div>
                <div class="container-productos">
                    <?php 
                    $count = 0;
                    foreach ($resultado as $row) { 
                    $count ++;
                    ?>
                    <div class="box-producto <?php if ($count > 5) { echo ' hidden' ;}?>">
                        <div class="img-producto">
                            <?php
                                $id = $row['id_producto'];
                                $imagen = "PRODUCTOS FOTOS/".$id.".jpg";
                                if (!file_exists($imagen)) {
                                    $imagen = "PRODUCTOS FOTOS/nf.jpg";}
                            ?>
                            <img src="<?php echo $imagen;?>" alt="Producto 1">
                        </div>
                        <div class="info-producto">
                            <h3><?php echo($row['nombre_producto']); ?></h3>
                            <p><?php echo($row['descripcion']);?></p>
                        </div>
                        <div class="precio-producto">
                            <p class="precio"><?php echo number_format(($row['precio']));?> COP</p>
                            <button class="agregar-carrito-btn">Agregar al carrito</button>
                        </div>
                    </div>
                    <?php } ?>   

                
                </div>
                <a name="about-us"></a> 
                

                <div class="btns-productos">
                                    
                    <?php 
                    
                if (count($productos) > 5){ 
                    echo '<button id="mostrar-mas-btn"> <strong> Mostrar más </strong><i class="fa-solid fa-arrow-down"></i></button>
                    <button id="mostrar-menos-btn" style="display: none;"><strong>Mostrar menos </strong><i class="fa-solid fa-arrow-up"></i></button>';
                } 
                if ($rol == 1){
                    echo '
                    <a href="st-productos.php"><button id="editar-productos">EDITAR PRODUCTOS</button></a>';
                }
                ?>
                </div>
            </section>
        </div>            
    </main>
    <footer>

    </footer>
</body>
</html>