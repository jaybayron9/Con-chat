<?php 

namespace controler;
use Model\Users;
use Model\Messages;

class RoomController { 

    private $users;
    private $messages;

    public function __construct() {
        $this->users = new Users();
        $this->messages = new Messages();
    }
    
    public function index() {  
        if (!isset($_SESSION['user_id'])) {  
            header('location: /');
        }    

        $contacts = $this->users->contacts();
        $messages = $this->messages->show([$_SESSION['user_id'], $_GET['to'] ?? '0']);  
        view('chatroom', compact('contacts', 'messages')); 
    } 
}
