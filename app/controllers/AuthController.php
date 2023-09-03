<?php 

namespace AuthController;  
use Model\Users; 

class AuthController {   
    private $user;

    public function __construct() {
        $this->user = new Users(); 
    }

    public function register() {   
        $username = trim($_POST['username']);
        $password = trim($_POST['password']); 

        $error = [];
        match (true) {
            empty($username) => $error[] = 'Username field is required.',
            empty($password) => $error[] = 'Password field is required.'
        };

        if (is_null($error)) {
            echo 'null';
        }else {
            echo 'not null';
        }

        try { 
            $query = $this->user->query("INSERT INTO users (name, password) VALUES (:name, :values)", [
                ':name' => $username,
                ':values' => $password, 
            ]); 

            if ($query) {
                http_response_code(200); 
            } 
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
