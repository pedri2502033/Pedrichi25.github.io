document.addEventListener('DOMContentLoaded', function () {
    function validarRegistro() {
        var inputEmail = document.getElementById('txtusuario').value;
        var inputPassword = document.getElementById('txtpassword').value;

        var emailValido = validarEmail(inputEmail);
        var passwordValido = validarPassword(inputPassword);

        if (!emailValido) {
            alert('Ingrese un correo electrónico válido.');
            return false;
        }

        if (!passwordValido) {
            alert('La contraseña debe tener al menos 8 caracteres.');
            return false;
        }

        return true;
    }

    function validarEmail(email) {
        const expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return expresionRegular.test(email);
    }

    function validarPassword(password) {
        return password.length >= 8;
    }

    document.getElementById('registerForm').addEventListener('submit', function (event) {
        if (!validarRegistro()) {
            event.preventDefault(); // Evita que se envíe el formulario si la validación falla
        }
    });
});