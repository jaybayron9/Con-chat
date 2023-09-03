<?php 

namespace AuthController;  
use Model\Users; 
use utils\Validate;

class AuthController {   
    private $user; 

    public function __construct() { 
        $this->user = new Users(); 
    }

    public function register() {     
        $username = $_POST['username'];
        $password = $_POST['password'];
        try { 
            $userExist = $this->user->get("SELECT name FROM users WHERE name = :username", [
                ':username' => $username,
            ]);

            $error[] = Validate::check_empty($_POST) ? 'All field are required.' : null;
            $error[] = count($userExist) > 0 ? 'This username is already taken.' : null;
            $error[] = Validate::has_min_lenght($password, 7) ? 'The password must be at least 8 characters.' : null;

            if (!empty(array_filter($error))) {
                json([
                    'empty' => $error[0],
                    'taken' => $error[1],
                    'min_password' => $error[2]
                ]); 
                return;
            } 

            $query = $this->user->put("INSERT INTO users (name, password) VALUES (:name, :values)", [
                ':name' => $username,
                ':values' => $password, 
            ]); 

            if ($query) {
                echo 'ok';
            } else {
                echo 'not okay';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
