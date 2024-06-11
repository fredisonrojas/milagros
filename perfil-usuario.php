<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'PHP/conexion.php';

$usuario = $_SESSION['username'];
$id = $_SESSION['id'];
$rol = $_SESSION['rol'];


if ((isset($_GET['id']) and $id == $_GET['id']) || (isset($_GET['id']) and $rol == 1)){

    $query = "SELECT * FROM `usuarios` WHERE `id_usuario` = ".$_GET['id']."";
    $ejecutar = mysqli_query($conexion, $query);

    while($row = $ejecutar->fetch_array()){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil-usuario.css">
    <title>Perfil de <?php  echo $_SESSION['username']. $rol; ?></title>
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
                    <li class="nav-list-item"><a href="index.php">Inicio</a></li>
                    <li class="nav-list-item"><a href="index.php#usuarios">usuarios</a></li>
                    <li class="nav-list-item"><a href="index.php#about-us">Acerca de nosotros</a></li>
                    <li class="nav-list-item"><a href="index.php#contact-info">Contacto</a></li>
                </ul>
            </div>
    </header>
    <main>
        <div class="contenedor">
            <div class="section-foto-usuario">
                <h1 class="title-div">FOTO USUARIO</h1>
                <form action="PHP/foto-usuario.php" enctype="multipart/form-data" method="post" style="display:flex; flex-direction:column;">
                    <?php
                        $id = $row['id_usuario'];
                        $imagen = "USUARIO FOTOS/".$id.".jpg";
                        if (!file_exists($imagen)) {
                            $imagen = "USUARIO FOTOS/nf.jpg";
                        }
                    ?>
                    <div class="foto-usuario" alt="Usuario" id="usuario-foto" style="background-image: url('<?php echo $imagen; ?>'); background-size: 100% 100%;"></div>
                    <input type="file" name="imagen" id="fileField" value="cambiar foto">
                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">  
                    <button type="submit" class="btn-foto">Cambiar foto</button>
                </form>
            </div>
            <div class="informacion-usuario">
                <h1 class="title-div">INFORMACIÓN USUARIO</h1>
                <form action="PHP/update-user.php" method="post">
                    <div class="form-item"><p>Nombre:</p>       <input class="input-item" name="txtnombre" type="text" value="<?php echo $row['nombre_completo'] ?>" maxlength="50" required readonly></div>
                    <div class="form-item"><p>Usuario:</p>      <input class="input-item" name="txtusuario" type="text" value="<?php echo $row['usuario'] ?>" maxlength="20" required readonly></div>
                    <div class="form-item"><p>Correo:</p>       <input class="input-item" name="txtcorreo" type="text" value="<?php echo $row['correo_electronico']  ?>" maxlength="70" required readonly></div>
                    <div class="form-item"><p>Contraseña:</p>   <input class="input-item" name="txtcontraseña" type="text" value="<?php echo $row['contraseña'] ?>" maxlength="70" required readonly></div>
                    <div class="form-item"><p>Dirección:</p>    <input class="input-item" name="txtdireccion" type="text" value="<?php echo $row['direccion'] ?>" maxlength="30" readonly></div>
                    <div class="form-item"><p>Teléfono:</p>     <input class="input-item" name="txtnumero" type="number" value="<?php echo $row['telefono']?>" maxlength="10" readonly></div>

                    <input type="number" value="<?php echo $_GET['id'];?>" name="id" style="display:none; visibility: 0;">

                    <div class="botones-edit">
                        <div id="btn-editar">EDITAR</div>  
                        <div id="btn-cancelar" class="hidden"> CANCELAR</div>  
                        <button id="btn-update" type="submit" class="hidden">ACTUALIZAR</button>
                    </div>
                   
                </form>
                <div style="display: flex;">
                    <form action="PHP/logout.php"> 
                        <?php if($_GET['id'] == $_SESSION['id']){echo'<button type="submit" id="btn-logout">SALIR DE LA CUENTA</button> ';} ?>
                        
                    </form>
                    <?php
                    if ($rol == 1){echo '<a href="st-usuarios.php"><button id="editar-usuarios">EDITAR USUARIOS</button></a>';}
                    ?>
                </div>
            </div>
        </div>            
    </main>
    <?php }}else if ($_SESSION['id'] !== $_GET['id'] and $_SESSION['rol']!==1){
    echo '
    <script>
    alert ("No tienes permisos para ver la información de otros usuarios");
    window.location="index.php";
    </script>
    ';
    }
    ?>
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