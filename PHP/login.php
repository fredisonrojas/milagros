<?php 
$inc = include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $query = "SELECT * FROM `usuarios` WHERE `usuario` = '".$user."'";
    $ejecutar = mysqli_query($conexion, $query);
    $nr = mysqli_num_rows($ejecutar);

    if ($nr === 1){

        while($row = $ejecutar->fetch_array()){
            $idusuario = $row['id_usuario'];
            $usuario = $row['usuario'];
            $correo = $row['correo_electronico'];
            $rol = $row['id_rol'];
            
            if ($row["contraseña"] === $pass ) {
                $_SESSION['username'] = $usuario;
                $_SESSION['id'] = $idusuario;
                $_SESSION['rol'] = $rol;
                echo ('
                <script>
                alert("¡INICIO DE SESIÓN EXITOSO!, BIENVENIDO")
                window.location="../index.php"
                </script>');
            } else {
                echo ("
                <script>
                alert('CONTRASEÑA INCORRECTA, INTÉNTALO DE NUEVO')
                window.location='../login.php'
                </script>
                ");
            }
        }
    } else {
        echo ("
        <script>
        alert('Usuario NO encontrado, inténtalo de nuevo')
        window.location='../login.php'
        </script>
        ");
    }
}

$conexion->close();

?>
