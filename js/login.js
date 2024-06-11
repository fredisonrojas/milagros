document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('btn-iniciar-sesion').addEventListener("click", iniciarSesion);
    document.getElementById('btn-registrarse').addEventListener("click", registrarse);

    var loginForm = document.querySelector('.login-form');
    var registerForm = document.querySelector('.register-form');

    var login_area = document.querySelector('.login-area');
    var register_area = document.querySelector('.register-area');

    
    login_area.style.opacity= "0";

    function registrarse() {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');

        register_area.style.opacity= "0";
        login_area.style.opacity= "1";
    }
    
    function iniciarSesion() {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');

        login_area.style.opacity= "0";
        register_area.style.opacity= "1";
    }

    
});


