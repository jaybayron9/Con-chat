$('#register-form').submit(function(e) {
    e.preventDefault(); 
    $.post("/register", $(this).serialize(),
        (res) => {   
            if (res.status === 'error') {  
                res.empty !== null ? $('#error-msg').text(res.empty) : '';
                res.taken !== null ? $('#username-error').text(res.taken) : '';
                res.min_password !== null ? $('#password-error').text(res.min_password) : '';
                return;
            }
            alert(res.message)
            window.location.href = '/'
        }
    );
})

$('#login-form').submit(function(e) {
    e.preventDefault();  

    $.post("/login", $(this).serialize(),
        (res) => { 
            if (res.status === 'error') {
                $('#error-msg').text(res.credentials)
                $('#username, #password').val('')
                return;
            }
            window.location.replace('/chat')
        }
    ); 
})