var conn = new WebSocket('ws://localhost:8080'); 

conn.onopen = () => {  
    console.log("Connection established!"); 
}; 

conn.onmessage = (e) => {   
    try { 
        let req = JSON.parse(e.data);  
        req.to_id_field = $('#to_user').val();
        req.from_id_field = $('#from_user').val();

        $.post("/checkFrom", req, (res, status) => { 
            if (status === 'success') {   
                if (typeof res.status !== 'undefined')
                    return;   
                $('#convo').append(receiver(
                    res.message, res[0].date
                )); 
            } 
        });  
    } catch (error) { 
        console.error("Error parsing JSON:", error); 
    }  
}; 

$('#send-form').submit(function(e) {  
    e.preventDefault();   

    $.ajax({
        type: "POST",
        url: "/send",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: (res) => { 
            console.log(res)
            conn.send(JSON.stringify(res));
            $('#convo').append(sender(
                res.message, res[0].date
            )); 
            $('#message').val('');
        }
    }); 
})

function sender($message, $created) {
    var html = `<div class="flex gap-2 ml-auto">`
        html +=    `<div class="bg-blue-600 text-white p-2 rounded-xl shadow-md flex flex-col ml-20"> `
        html +=        `<p class="text-[15px] mb-2">${$message}</p>`
        html +=        `<span class="text-[11px]">${$created}</span>`
        html +=    `</div>`
        html +=    `<img src="/static/img.jpg" alt="" class="select-none ml-1 h-8 w-8 min-h-chat-profile min-w-chat-profile rounded-full mt-auto shadow-xl">`
        html +=`</div>`
    return html;
}

function receiver($message, $created) {
    var html = `<div class="flex gap-2">`
        html +=    `<img src="/static/img.jpg" alt="" class="select-none ml-1 h-8 w-8 min-h-chat-profile min-w-chat-profile rounded-full mt-auto shadow-xl">`
        html +=    `<div class="bg-gray-700 text-white p-2 rounded-xl shadow-md flex flex-col mr-20"> `
        html +=        `<p class="text-[15px] mb-2">${$message}</p>`
        html +=        `<span class="text-[11px] ml-auto">${$created}</span>`
        html +=    `</div>`
        html +=`</div>`
    return html;
}


$.post("/profile/head", {
        'to_user': $('#to_user').val()
    }, (res) => { 
        $('#head-name').text(res[0].name)   
    }
);

$('#show-bar').click(() => {
    $('#aside').removeClass('-left-full').addClass('w-full');
})
$('#close-bar').click(() => {
    $('#aside').removeClass('w-full').addClass('-left-full');
})

let noResultsAdded = false; 
$('.search').on('keyup input', function () {
    const searchValue = $(this).val().toLowerCase();
    const listItems = $('.contacts-ul .contacts-li');

    let visibleItems = 0;
    listItems.each(function () {
        const userName = $(this).text().toLowerCase();

        if (userName.indexOf(searchValue) > -1) {
            $(this).removeClass('hidden');
            visibleItems++;
        } else {
            $(this).addClass('hidden');
        }
    });

    if (visibleItems === 0 && !noResultsAdded) {
        $('.contacts-ul').append('<li class="no-results text-gray-200 text-center font-semibold">No results</li>');
        noResultsAdded = true;
    } else if (visibleItems > 0 && noResultsAdded) {
        $('.no-results').remove();
        noResultsAdded = false;
    }
});

$('#files-btn').on('click', function() {
    $('#file-input').click();
});
 
$('#file-input').change(function() {
    var fileNames = []; 
    $('#upload-container').empty();
    
    $.each(this.files, function(i, file) {
        fileNames.push(file.name); 
        var img = document.createElement('img');
        img.src = URL.createObjectURL(file);

        img.style.width = '100px';
        img.style.height = '100px';
        $('#upload-container').addClass('grid grid-cols-6')
        $('#upload-container').append(img);
    }); 
}); 

// Emojis
// $.get("https://emoji-api.com/emojis?access_key=af43e81b4744bf6ceaee44bdfeebb9b7715095c7",
//     function (res, textStatus, jqXHR) {
//         console.table(res)
//     }
// );