$('#register-form').submit(function(e) {
    e.preventDefault(); 
    $.post("/register", $(this).serialize(),
        function (res) {  
            if (res.status === 'error') {
                $error = `<ul>`
                    $error += res.taken !== null ? `<li>${res.taken}</li>` : '';
                    $error += res.empty !== null ? `<li>${res.empty}</li>` : '';
                    $error += res.min_password !== null ? `<li>${res.min_password}</li>` : '';
                $error += `</ul>`
                $('#error-msg').html($error)
                return;
            }
            $('#error-msg').text(res.message)
        }
    );
})

$('#login-form').submit(function(e) {
    e.preventDefault();

    $.post("/login", $(this).serialize(),
        function (res) {
            if (res.status === 'error') {
                $('#error-msg').text(res.credentials)
                return;
            }
            window.location.replace('/room')
        }
    );
    
})