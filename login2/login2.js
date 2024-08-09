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
        .then(response => response.text())  // Cambiar a text() para ver la respuesta cruda
        .then(data => {
            console.log('Raw response:', data); // Ver la respuesta cruda para depuración
            try {
                const jsonData = JSON.parse(data);  // Intentar convertir a JSON
                if (jsonData.status === 'OK') {
                    // Credenciales correctas, redirigir al usuario a index.html
                    window.location.href = "index.html";
                } else {
                    // Credenciales incorrectas, mostrar un mensaje de error
                    console.error(jsonData.message); // Mostrar el mensaje de error devuelto por el servidor
                }
            } catch (error) {
                console.error('JSON parsing error:', error); // Mostrar error en el parseo de JSON
            }
        })
        .catch(error => {
            console.error('Fetch error:', error); // Mostrar error en la solicitud fetch
        });
    });
});
