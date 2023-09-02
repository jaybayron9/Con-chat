$('#register-form').submit(function(e) {
    e.preventDefault();

    $.post("/register", $(this).serialize(),
        function (res) {
            console.log(res)
        }
    );
}) 