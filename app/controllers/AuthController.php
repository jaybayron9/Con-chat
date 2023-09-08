<?php 

namespace AuthController;  
use Model\Users; 
use utils\Validate;

class AuthController {   
    private $user; 

    public function __construct() {
        $this->user = new Users(); 
    }

    public function index() { 
        if (isset($_SESSION['user_id'])) {
            header('location: /chat');
        }
        view('auth/login');
    }

    public function registerPage() { 
        if (isset($_SESSION['user_id'])) {
            header('location: /chat');
        }
        view('auth/register');
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password']; 

        $error[] = count($this->user->usernameExist($username)) > 0 ? 'This username is already taken.' : null;
        $error[] = Validate::check_empty($_POST) ? 'All field are required.' : null;
        $error[] = Validate::has_min_lenght($password, 7) ? 'The password must be at least 8 characters.' : null;

        if (!empty(array_filter($error))) {
            json([
                'status' => 'error',
                'taken' => $error[0],
                'empty' => $error[1],
                'min_password' => $error[2]
            ]); 
            return;
        }

        $this->user->newUser([$username, $password]);
        json([
            'message' => 'Successfully registered. You can now log-in to you account.'
        ]); 
    }

    public function login() {
        $credentials = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]; 

        $error[] = Validate::check_empty($_POST) ? 'All field are required.' : null; 
        $error[] = $this->user->checkUser($credentials) ? 'Wrong username or password.' : null;

        if (!empty(array_filter($error))) {
            json([
                'status' => 'error',
                'empty' => $error[0],
                'credentials' => $error[1]
            ]);
            return;
        } 

        json([
            'status' => 'success'
        ]);
    }

    public function logout() {
        unset($_SESSION['user_id']);
        header('location: /');
    }
}
