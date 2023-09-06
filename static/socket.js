var conn = new WebSocket('ws://localhost:8080');

conn.onopen = () => {  
    console.log("Connection established!"); 
}; 

conn.onmessage = (e) => {   
    try { 
        let data = JSON.parse(e.data);  
        data.to_id_field = $('#to_user').val();
        data.from_id_field = $('#from_user').val();

        $.post("/checkFrom", data, (res, status) => { 
            if (status === 'success') {   
                    if (typeof res.status !== 'undefined')
                        return;  
                    var convo = `<div class="message_container">`
                        convo +=   `<div class="img_cont_msg">`
                        convo +=        `<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">`
                        convo +=     `</div>  ` 
                        convo +=     `<span class="msg-time-from">${res[0].date}</span>` 
                        convo +=     `<p class="message_from">${res.message}</p>`
                        convo += `</div>` 
                    $('#convo').append(convo); 
                } 
            }
        );  
    } catch (error) { 
        console.error("Error parsing JSON:", error); 
    }  
};

conn.onclose = (e) => { 
    console.log("WebSocket closed with reason:", e.reason);
} 

$('#send-form').submit(function(e) {  
    e.preventDefault();  

    $.ajax({
        type: "POST",
        url: "/send",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: (res) => {
            conn.send(JSON.stringify(res));
            var convo = `<div class="message_container">`;
                convo   += ` <p class="message_to">${res.message}</p>`;
                convo   += `<span class="msg-time-to">${res[0].date}</span>`;
                convo       += `<div class="img_cont_msg">`;
                convo           += `<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">`;
                convo       += `</div>`;
                convo   += `</div>`; 
            $('#convo').append(convo); 
        }
    }); 
})