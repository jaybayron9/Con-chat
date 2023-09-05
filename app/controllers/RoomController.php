<?php 

namespace controler;
use Model\Users;
use Model\Messages; 
use Phpfastcache\CacheManager; 
use Phpfastcache\Config\ConfigurationOption;

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

    public function sendMessage() {
        $data = [
            'from' => $_POST['from_user'], 
            'to' => $_POST['to_user'], 
            'message' => $_POST['message'] 
        ]; 
        $this->messages->insert($data);  
        $convo = $this->messages->lastMessage($data); 
        array_push($data, ['date' => msgTime($convo[0]['created_at'])]);
        json($data);
    }

    public function checkFrom() {
        
    }
}
