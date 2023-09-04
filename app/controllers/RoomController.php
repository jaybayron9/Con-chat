<?php 

namespace controler;
use Model\Users;

class RoomController { 

    private $users;

    public function __construct() {
        $this->users = new Users();
    }
    
    public function index() {  
        if (!isset($_SESSION['user_id'])) {  
            header('location: /');
        }   

        $contacts = $this->users->getUsers();
        view('chatroom', compact('contacts')); 
    }
}
