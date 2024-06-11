<?php 
try {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include 'PHP/conexion.php';
    
    $usuario = $_SESSION['username'];
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexion->query($sql);

    // Fetch data from the query result
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/sistema-usuarios.css">
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
    <title>Query Users</title>
</head>
<body>
    <header>
            <div class="logo-account-navbar">
                <div class="logo">
                    <a href="index.php"><img src="IMG/Logo_Paradise_cosmetics.png" id="logo-header"></a>
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
        <a href="perfil-usuario.php?id=<?php echo $id;?>"><button id="btn-volver"><i class="fa-solid fa-arrow-left"></i></button></a>
            <h1>TABLA DE USUARIOS</h1>
            <table class="table-contenedor">
                <tr>
                    <th>ID</th>
                    <th>Nombres Completos</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($resultado as $row) { ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['nombre_completo']; ?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['correo_electronico']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php if ($row['id_rol'] == 1 ){echo 'Administrador';} else if ($row['id_rol'] == 2){echo 'Usuario';} ?></td>
                    <td><a href="perfil-usuario.php?id=<?php echo $row['id_usuario']?>"><button>EDITAR</button></a></td>
                    <form action="PHP/del-user.php" method="post"> 
                        <input type="number" name="id" value="<?php echo $row['id_usuario'];?>" style="display:none;visibility:0;"><td id="del-btn"><button>ELIMINAR</button></td></form>
                </tr>
                <?php }?>
            </table>
        </div>            
    </main>
    <footer>

    </footer>
</body>
</html>