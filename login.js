window.onload = function() {
    console.log('Hello, Pedri!');

    var inputEmail = document.getElementById('txtusuario');
    var inputPassword = document.getElementById('txtpassword');
    var loginForm = document.getElementById('loginForm');

    

    if (!inputEmail || !inputPassword || !loginForm) {
        console.log('Los elementos de entrada no se han cargado todavía.');
        return;
    }

    function validarLogin() {
        var emailValido = validarEmail(inputEmail.value);
        var passwordValido = validarPassword(inputPassword.value);

        if (!emailValido) {
            alert('Ingrese un correo electrónico válido.');
            return;
        }

        if (!passwordValido) {
            alert('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        
    }

    

    function validarEmail(email) {
        const expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return expresionRegular.test(email);
    }

    function validarPassword(password) {
        return password.length >= 8;
    }

    // Agregamos el evento 'submit' al formulario de inicio de sesión para llamar a la función validarLogin
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        if (!validarLogin()) {
            event.preventDefault(); // Evita que se envíe el formulario si la validación falla
        }
    });

    console.log(inputEmail) // Verifica si el elemento existe
    console.log(document.getElementById('txtpassword')); // Verifica si el elemento existe
};