<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Inicia Sesión</title>
</head>
<body>
    <main>
        <div class="contenedor-login">
            <div>
            <form class="login-form" action="PHP/login.php" method="POST">
                <h1>Iniciar Sesion </h1>
                <input type="text" name="usuario" class="login-input" placeholder="Usuario" required> <br>
                <input type="password" name="contraseña" class="login-input" placeholder="Contraseña" required> <br>
                <button type="submit">Entra</button>
            </form>
            <form class="register-form hidden" action="PHP/register.php" method="POST"> <!-- Agregado el atributo "action" -->
                <h1>Registrarse</h1>
                <input type="text" name="nombre" placeholder="Nombres Completos"> <br>
                <input type="text" name="email" placeholder="Email"> <br>
                <input type="text" name="usuario" placeholder="Usuario"> <br>
                <input type="password" name="contraseña" placeholder="Contraseña"> <br>
                <button type="submit">Registrarse</button>
            </form>
            </div>
            <div class="caja-trasera">
                <div class="login-area ">
                    <h2>¿Ya tienes una cuenta creada?</h2>
                    <p>Inicia sesión para que puedas disfrutar de una mejor experiencia</p>
                    <button id="btn-iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="register-area">
                    <h2>¿Aún no tienes una cuenta?</h2>
                    <p>Regístrate para que puedas iniciar sesión y disfrutar de una mejor experiencia</p>
                    <button id="btn-registrarse">Regístrate</button>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="JS/login.js"></script>
</html>
