document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    axios.post('/login', {
        email: email,
        password: password
    })
        .then(response => {
            localStorage.setItem('api_token', response.data.token);
            window.location.href = '/home';
        })
        .catch(error => {
            document.getElementById('email-error').textContent = '';
            document.getElementById('password-error').textContent = '';

            if (error.response && error.response.status === 401) {
                alert('Credenciais inválidas. Verifique seu email e senha.');
            } else if (error.response && error.response.status === 422) {
                const errors = error.response.data.errors;
                if (errors.email) {
                    document.getElementById('email-error').textContent = errors.email[0];
                }
                if (errors.password) {
                    document.getElementById('password-error').textContent = errors.password[0];
                }
            } else {
                alert('Ocorreu um erro. Por favor, tente novamente mais tarde.');
            }
        });
});
