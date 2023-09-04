<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConChat</title>
    <link rel="stylesheet" href="static/chatroom.css">
</head>

<body>    
    <aside>
        <div class="app-title">
            <h1>Contacts</h1>
            <input type="search" id="search-bar" placeholder="Search" class="search-bar">
        </div> 
        <ul class="user-list"> 
            <?php foreach ($contacts as $contact): ?>
            <li>
                <img src="static/img.jpg" alt="profile image" class="profile-image">
                <div class="user-insight">
                    <p class="user-name"><?= $contact['name'] ?></p>
                    <div class="status-container">
                        <div class="status"></div>
                        <p>Online</p>
                    </div>
                </div> 
            </li>    
            <?php endforeach; ?>
        </ul> 
        <button id="logout-btn" onclick="window.location.href = '/logout'">
            Logout
        </button> 
    </aside> 

    <main>
        <div class="chat-head">
            <img src="static/img.jpg" alt="profile-image" class="profile-image">
            <span id="toUser">User One</span>  
        </div>
        <div class="convo"> 
            <div class="message_container">
                <div class="img_cont_msg">
                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">
                </div>   
                <span class="msg-time-from">05:00PM | Today</span> 
                <p class="message_from">
                    Hello this is my message how are you? 
                </p>  
            </div> 
            <div class="message_container">
                <p class="message_to">
                    Hello this is my message how are you?  
                </p>  
                <span class="msg-time-to">05:00PM | Today</span> 
                <div class="img_cont_msg">
                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">
                </div>  
            </div> 
        </div> 
        <form id="send-form" enctype="multipart/form-data">  
                <button type="button" id="files-btn">📎</button>
                <button type="button" id="emojis-btn">😀</button> 
            <textarea name="message" id="message" placeholder="Enter Message here..." cols="105" rows="1"></textarea> 
            <button type="submit" id="send-btn">Send</button> 
        </form> 
    </main>  
    
    <script src="static/socket.js"></script>
</body>

</html> 