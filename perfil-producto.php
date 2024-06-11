<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'PHP/conexion.php';

if (isset($_GET['id'])){

    $query = "SELECT * FROM `productos` WHERE `id_producto` = ".$_GET['id']."";
    $ejecutar = mysqli_query($conexion, $query);

    while($row = $ejecutar->fetch_array()){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil-producto.css">
    <title>Perfil de producto</title>
</head>
<body>
    <header>
            <div class="logo-account-navbar">
                <div class="logo">
                    <a href="index.php"><img src="IMG/Milagros Para El Cabello.png"  id="logo-header"></a>
                </div>
            </div>
            <div class="texto-rosa-header nav-list-rosa">
                <ul class="nav-list">
                    <li class="nav-list-item"><a href="index.php">Inicio</a></li>
                    <li class="nav-list-item">
                        <a href="index.php#productos">Productos</a>
                        <ul class="submenu">
                            <li><a href="#">Hombres</a></li>
                            <li><a href="#">Mujeres</a></li>
                        </ul>

                    </li>
                    <li class="nav-list-item"><a href="index.php#about-us">Acerca de nosotros</a></li>
                    <li class="nav-list-item"><a href="index.php#contact-info">Contacto</a></li>
                </ul>
            </div>
    </header>
    <main>
        <div class="contenedor">
            <div class="section-foto-producto">
                <h1 class="title-div">FOTO PRODUCTO</h1>
                <form action="PHP/foto-producto.php" enctype="multipart/form-data" method="post" style="display:flex; flex-direction:column;">
                <?php
                    $id = $row['id_producto'];
                    $imagen = "PRODUCTOS_FOTOS/".$id.".jpg";
                    if (!file_exists($imagen)) {
                        $imagen = "PRODUCTOS_FOTOS/nf.jpg";}
                ?>
                <div class="foto-producto" alt="Usuario" id="usuario-foto" style="background-image: url('<?php echo $imagen; ?>'); background-size: 100% 100%;"></div>
                <input type="file" name="imagen" id="fileField" value="cambiar foto">
                <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">  
                <button type="submit" class="btn-foto">Cambiar foto</button>
                </form>
            </div>
            <div class="informacion-producto">
                <h1 class="title-div">INFORMACIÓN PRODUCTO</h1>
                <form action="PHP/update-producto.php" method="post">
                    <div class="form-item"><p>Nombre:</p>                   <input class="input-item" name="nombre" type="text" value="<?php echo $row['nombre_producto']; ?>" maxlength="100" required readonly></div>
                    <div class="form-item"><p>Descripcion:</p>              <textarea style="resize: none;" class="input-item" name="descripcion" maxlength="255" required readonly><?php echo $row['descripcion']; ?></textarea></div>
                    <div class="form-item"><p>genero:</p>                   <input class="input-item" name="gender" type="text" value="<?php echo $row['gender']; ?>" maxlength="100" required readonly></div>
                    <div class="form-item"><p>Precio:</p>                   <input class="input-item" name="precio" type="number" value="<?php echo $row['precio'];  ?>" maxlength="10" required readonly></div>
                    <div class="form-item"><p>Stock:</p>                   <input class="input-item" name="stock" type="number" value="<?php echo $row['stock'];  ?>" maxlength="10" required readonly></div>

                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">

                    <div class="botones-edit">
                        <div id="btn-editar">EDITAR</div>  
                        <div id="btn-cancelar" class="hidden"> CANCELAR</div>  
                        <button id="btn-update" type="submit" class="hidden">ACTUALIZAR</button>
                    </div>
                </form>
            </div>
        </div>            
    </main>
    <?php }}?>
    <script src="js/editar.js"></script>
    <script>
        document.querySelectorAll('input[type="number"]').forEach(input =>{
            input.oninput = () =>{
                if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
            };
        });
    </script>
    <footer>

    </footer>
</body>
</html>