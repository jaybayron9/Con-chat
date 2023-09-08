<?php 

namespace controler;
use Model\Users;
use Model\Messages;
use utils\FileHandler;
use utils\Validate;
// use Phpfastcache\CacheManager; 
// use Phpfastcache\Config\ConfigurationOption; 

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
        view('chat', compact('contacts', 'messages'));     
    }

    public function profileHead() { 
        $user = $this->users->showProfileHead(['id' => $_POST['to_user']]);    
        json($user);
    }

    public function sendMessage() {     
        $error['no_message'] = Validate::input_empty($_POST['message']) ?? null; 

        if (!empty(array_filter($error))) {
            json([
                'noMessage' => $error['no_message']
            ]); 
        } 

        
        FileHandler::handleFileUpload($_FILES['images'], 'storage');



        // $data = [
        //     'from' => htmlentities($_POST['from_user']), 
        //     'to' => htmlentities($_POST['to_user']), 
        //     'message' => htmlentities($_POST['message']) 
        // ]; 

        // $this->messages->insert($data);  
        // $convo = $this->messages->lastMessage($data); 
        // array_push($data, ['date' => msgTime($convo[0]['created_at'])]);
        // json($data);
    }

    public function checkFrom() { 
        if ($_POST['from'] === $_POST['to_id_field'] && $_POST['to'] === $_POST['from_id_field']) {
            json($_POST);
            return;
        }
    }
}
