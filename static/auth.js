$('#register-form').submit(function(e) {
    e.preventDefault(); 

    $.post("/register", $(this).serialize(),
        function (res, textStatus, jqXHR) {
            console.log(res) 
        },'json'
    );
}) 