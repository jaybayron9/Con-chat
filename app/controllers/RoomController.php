<?php 

namespace controler;
use Model\Users;
use Model\Messages;
use utils\FileHandler;
use utils\Validate;
use utils\FileUpload;
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
        $messages = $this->messages->show([$_SESSION['user_id'], $_GET['to'] ?? $_SESSION['user_id']]);   
        $logUser = $this->users->showProfile(['id' => $_SESSION['user_id']]);
        view('chat', compact('contacts', 'messages', 'logUser'));     
    }

    public function profileHead() { 
        $user = $this->users->showProfile(['id' => $_POST['to_user']]);    
        json($user);
    }

    public function sendMessage() {  
        $data = [
            'from' => htmlentities($_POST['from_user']), 
            'to' => htmlentities($_POST['to_user']), 
            'message' => htmlentities($_POST['message']), 
        ]; 

        if (!empty($_FILES['images']['name'][0])) { 
            $fileHandler = FileHandler::newFileName($_FILES, 'storage');
            $newFilename = explode('~', $fileHandler); 
            $filterName = array_filter($newFilename); 

            array_push($data, ['file' => $fileHandler]);

            foreach ($_FILES as $key => $value) {  
                for ($i = 0; $i < count($value['size']); $i++) { 
                    move_uploaded_file($value['tmp_name'][$i], $filterName[$i]);     
                }  
            } 
        } 

        $this->messages->insert($data);  
        $convo = $this->messages->lastMessage($data);  
        array_push($data, ['date' => msgTime($convo[0]['created_at'])]);   
        json($data);
    } 

    public function lastMessage() {  
        $dataToPass = [];  
        foreach ($_POST['to'] as $id) {
            $data = [
                'from' => $_POST['from'],
                'to' => $id,
            ]; 
            
            $lastMessage = $this->messages->user_last_message($data); 

            foreach ($lastMessage as $message) {
                $dataToPass[] = [
                    'message' => $message['message'],
                    'from' => $message['from_user_id'],
                    'created_at' => msgTime($message['created_at'])
                ];
            }
        }
        json($dataToPass);
    }

    public function checkFrom() { 
        if ($_POST['from'] === $_POST['to_id_field'] && $_POST['to'] === $_POST['from_id_field']) {
            json($_POST);
            return;
        }
    }
}
