var conn = new WebSocket('ws://localhost:8080');

conn.onopen = () => {  
    console.log("Connection established!"); 
}; 

conn.onmessage = (e) => { 
    try {
        const data = JSON.parse(e.data);
        $.post("/checkFrom", data,
            function (res) {
                console.log(res)
            }
        );

        console.log(data);
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
            console.log(res)
            conn.send(JSON.stringify(res));
            var convo = `<div class="message_container">`;
                    convo += ` <p class="message_to">${res.message}</p>`;
                    convo += `<span class="msg-time-to">${res[0].date}</span>`;
                    convo += `<div class="img_cont_msg">`;
                        convo += `<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">`;
                    convo += `</div>`;
                convo += `</div>`; 
            $('#convo').append(convo); 
        }
    }); 
})