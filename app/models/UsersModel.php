<?php

namespace Model;
use SQL\QueryBuilder;

class Users extends QueryBuilder {
    protected $columns = [
        'id', 'name', 'phone', 'email', 'email_verify_token', 'email_verified_at', 'password', 'password_reset_token', 'profile_photo_path', 'account_role', 'access_enabled', 'created_at', 'updated_at'
    ];

    public function usernameExist ($username) {
        try { 
            return $this->get("SELECT name FROM users WHERE name = :username", [
                ':username' => $username,
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function newUser ($value = []) {
        try { 
            return $this->put("INSERT INTO users (name, password) VALUES (:name, :password)", [
                ':name' => $value[0],
                ':password' => password_hash($value[1], PASSWORD_BCRYPT), 
            ]);  
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function checkUser($value = []) {
        try {
            $users = $this->get('SELECT id, name, password FROM users WHERE name = :name LIMIT 1', [
                ':name' => $value[0]
            ]);
            if (count($users) > 0) {
                foreach ($users as $user) 
                    if (password_verify($value[1], $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        return false;
                    }  
            }
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    } 

    public function contacts() {
        try {
            $column = implode(', ', $this->columns);
            return $this->get("SELECT $column FROM users WHERE id <> :id", [
                ':id' => $_SESSION['user_id']
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}