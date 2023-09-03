$('#register-form').submit(function(e) {
    e.preventDefault();

    $.post("/register", $(this).serialize(),
        function (res) {
            $('#error_message').$('#error_message').append(res);
        }
    );
}) 