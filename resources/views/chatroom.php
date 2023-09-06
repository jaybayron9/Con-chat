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
            <li onclick="window.location.href = '/room?to=<?= $contact['id'] ?>'">
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
        <div id="convo" class="convo"> 
            <?php foreach ($messages as $message): ?>
                <?php if ($message['from_user_id'] !== $_SESSION['user_id']) { ?>
                    <div class="message_container">
                        <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">
                        </div>   
                        <span class="msg-time-from"><?= msgTime($message['created_at']) ?></span> 
                        <p class="message_from">
                            <?= $message['message'] ?>
                        </p>  
                    </div> 
                <?php } else { ?>
                    <div class="message_container">
                        <p class="message_to">
                            <?= $message['message'] ?>
                        </p>  
                        <span class="msg-time-to"><?= msgTime($message['created_at']) ?></span> 
                        <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="profile-image chat-img">
                        </div>  
                    </div> 
                <?php } ?>
            <?php endforeach; ?> 
        </div> 
        <form id="send-form">  
            <input type="hidden" name="from_user" id="from_user" value="<?= $_SESSION['user_id'] ?>">
            <input type="hidden" name="to_user" id="to_user" value="<?= isset($_GET['to']) ? $_GET['to'] : '' ?>">
            <button type="button" id="files-btn">📎</button>
            <button type="button" id="emojis-btn">😀</button> 
            <textarea name="message" id="message" placeholder="Enter Message here..." cols="105" rows="1"></textarea> 
            <button type="submit" id="send-btn">Send</button> 
        </form> 
    </main>  

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="static/socket.js"></script>  
</body>

</html> 