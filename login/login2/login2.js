document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        // Enviar datos del formulario al archivo PHP para la autenticación
        fetch('login2.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                username: username,
                password: password
            }),
        })
        .then(response => response.json()) 
        .then(data => {
            console.log(data);
            if (data.status === 'OK') { // Verificar data.status en lugar de data.trim()
                // Credenciales correctas, redirigir al usuario a index.html
                window.location.href = "index.html";
            } else {
                // Credenciales incorrectas, mostrar un mensaje de error
                console.error(data.message); // Mostrar el mensaje de error devuelto por el servidor
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});